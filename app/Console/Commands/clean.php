<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'esse comando vai esvaziar o cache geral de todo o sistema';

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
        echo "\n======================================\n" .  exec('php artisan view:cache');
        echo "\n" . exec('php artisan view:clear');
        echo "\n" . exec('php artisan cache:clear');
        echo "\n" . exec('php artisan config:cache');
        echo "\n" . exec('php artisan route:clear');
        echo "\n======================================\n\n";
    }
}
