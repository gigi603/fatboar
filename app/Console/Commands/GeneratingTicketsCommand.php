<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GeneratingTicketsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'genere des tickets';

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
        $this->generateTickets();
    }

    private function generateTickets()
    {
        $nombreTicket60PourCent = 100 * 60 / 100;
        $nombreTicket20PourCent = 100 * 20 / 100;
        $nombreTicket10PourCent = 100 * 10 / 100;
        $nombreTicket6PourCent = 100 * 6 / 100;
        $nombreTicket4PourCent = 100 * 4 / 100;

        for($nombreTicket = 1; $nombreTicket <= $nombreTicket60PourCent; $nombreTicket++){
            $ticket = new Ticket;
            $ticket->numero_ticket = Str::random(10);
            $ticket->status = 0;
            $ticket->user_id = 0;
            $ticket->recompense_id = 1;
            $ticket->created_at = Carbon::now();
            $ticket->updated_at = Carbon::now();
            
            $ticket->save();
        }

        for($nombreTicket = 1; $nombreTicket <= $nombreTicket20PourCent; $nombreTicket++){
            $ticket = new Ticket;
            $ticket->numero_ticket = Str::random(10);
            $ticket->status = 0;
            $ticket->user_id = 0;
            $ticket->recompense_id = 2;
            $ticket->created_at = Carbon::now();
            $ticket->updated_at = Carbon::now();
            
            $ticket->save();
        }
        
        for($nombreTicket = 1; $nombreTicket <= $nombreTicket10PourCent; $nombreTicket++){
            $ticket = new Ticket;
            $ticket->numero_ticket = Str::random(10);
            $ticket->status = 0;
            $ticket->user_id = 0;
            $ticket->recompense_id = 3;
            $ticket->created_at = Carbon::now();
            $ticket->updated_at = Carbon::now();
            
            $ticket->save();
        }

        for($nombreTicket = 1; $nombreTicket <= $nombreTicket6PourCent; $nombreTicket++){
            $ticket = new Ticket;
            $ticket->numero_ticket = Str::random(10);
            $ticket->status = 0;
            $ticket->user_id = 0;
            $ticket->recompense_id = 4;
            $ticket->created_at = Carbon::now();
            $ticket->updated_at = Carbon::now();
            
            $ticket->save();
        }

        for($nombreTicket = 1; $nombreTicket <= $nombreTicket4PourCent; $nombreTicket++){
            $ticket = new Ticket;
            $ticket->numero_ticket = Str::random(10);
            $ticket->status = 0;
            $ticket->user_id = 0;
            $ticket->recompense_id = 5;
            $ticket->created_at = Carbon::now();
            $ticket->updated_at = Carbon::now();
            
            $ticket->save();
        }
    }
}
