<?php

namespace App\Services;

use App\Models\day;
use Carbon\Carbon;

class DayService
{
    public function createToday()
    {
        $today = today();

        day::firstOrCreate([
            'date' => $today,
        ],[
            'date' => $today,
        ]);
    }

    public function createMissingDays(): void
    {
        $lastDay = day::orderByDesc('date')->first();

        if (!$lastDay) {
            $this->createToday();
            return;
        }

        $date = Carbon::parse($lastDay->date);
        $today = Carbon::today();

        while ($date <= $today) {
            Day::firstOrCreate([
                'date' => $date,
            ]);

            $date->addDay();
        }
    }



}   