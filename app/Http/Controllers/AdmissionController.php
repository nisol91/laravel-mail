<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Jobs\MailAfterLead;



class AdmissionController extends Controller
{
    public function index() {

        return view('admission.home');
    }
    public function save(Request $request) {

        $validData = $request->validate([
            'name'=> 'required|max:40',
            'email'=> 'required|email',
            'message'=> 'required',
        ]);

        $lead = new Lead;
        $lead->fill($validData);

        $lead->save();

        // \Log::info('inviato nuovo messaggio correttamente' . $lead);

        MailAfterLead::dispatch($lead);




        $message = 'Complimenti, hai inserito i dati con successo';

        return view('admission.home', compact('message'));
    }
}
