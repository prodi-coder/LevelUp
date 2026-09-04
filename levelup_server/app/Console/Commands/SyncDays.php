<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DayService;

class SyncDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic creation and update of the day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(DayService::class)->createMissingDays();
    }
}
