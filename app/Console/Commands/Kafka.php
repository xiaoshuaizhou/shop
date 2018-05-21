<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Kafka extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:sendMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kafka send message to consumer';

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
        $kafka = new \App\Models\Kafka();
        $kafka->consumer($this, 'callback');
    }

    public function callback($message)
    {
        \Log::info($message, 'testkafka');
    }
}
