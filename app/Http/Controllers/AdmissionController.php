<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class AdmissionController extends Controller
{
    public function index() {

        return view('admission.home');
    }
    public function save(Request $request) {


        $data = $request->all();

        $newLead = new Lead;
        $newLead->name = $data['name'];
        $newLead->email = $data['email'];
        $newLead->message = $data['message'];

        $newLead->save();


        $message = 'Complimenti, hai inserito con successo';
        return view('admission.home', compact('message'));
    }
}
