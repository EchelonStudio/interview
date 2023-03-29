<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Dragonmantank\CronExpression\ExpressionFactory;

use AstronomicalFunctions\Calculations\SunriseSunsetCalculator;

class SunriseSunsetAlarm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'alarm:sunrise-sunset';

    /**
     * The console command description.
     *
     * @var string
     */
    
     protected $description = 'Trigger an alarm at sunrise and sunset';


    /**
     * Execute the console command.
     */
    public function handle(): void
    {
         // Get the current time
        $now = Carbon::now();

        // Calculate the sunrise and sunset times
        $calculator = new SunriseSunsetCalculator(
            $now->latitude,
            $now->longitude,
            $now->timezone
        );
        $sunrise = $calculator->calculateSunriseTime();
        $sunset = $calculator->calculateSunsetTime();

        // Schedule the alarm for sunrise and sunset
        $expressionFactory = new ExpressionFactory();
        $cron = $expressionFactory->fromCronString('* * * * *');
        $cron->setPart(1, $sunrise->format('H'));
        $cron->setPart(2, $sunrise->format('i'));
        $this->callSilent('alarm:trigger', ['message' => 'Sunrise alarm triggered!']);

        $cron = $expressionFactory->fromCronString('* * * * *');
        $cron->setPart(1, $sunset->format('H'));
        $cron->setPart(2, $sunset->format('i'));
        $this->callSilent('alarm:trigger', ['message' => 'Sunset alarm triggered!']);

    }
}
