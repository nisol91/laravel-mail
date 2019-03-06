<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\SendNewLead;
use App\Mail\SendLeadToUser;
use Illuminate\Support\Facades\Mail;
use App\Lead;

class MailAfterLead implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $lead;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //mail all admin
        Mail::to('admin@mail.com')->send(new SendNewLead($this->lead));

        //mail all utente finale
        Mail::to($this->lead->email)->send(new SendLeadToUser());
    }
}
