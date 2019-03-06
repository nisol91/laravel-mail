<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendLeadToUser;
use Illuminate\Support\Facades\Mail;
use App\Lead;

class RecapLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'myCommand:firstCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Esempio di comando artisan personalizzato';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('sto per mandare la mail');
        Mail::to('admin@mail.com')->send(new SendLeadToUser());
        $this->line('mail inviata');

    }
}
