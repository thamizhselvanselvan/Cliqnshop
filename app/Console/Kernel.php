<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (app()->environment() === 'staging') {
            /*payment confirmation/status email*/
            $schedule->command('aimeos:jobs order/email/payment')->everyMinute();
            /*capture authorized payments*/
            $schedule->command('aimeos:jobs order/service/payment')->daily();
            /*Removes unfinished orders*/ 
            $schedule->command('aimeos:jobs order/cleanup/unfinished')->hourly();
            /*Removes unpaid orders*/ 
            $schedule->command('aimeos:jobs order/cleanup/unpaid')->dailyAt('13:00');
            /*Optimize the product index for the fastest access*/ 
            $schedule->command('aimeos:jobs index/optimize')->hourly();
            /*Rebuilds the product index*/ 
            $schedule->command('aimeos:jobs index/rebuild')->daily();
            /*Automatically generates product suggestions*/
            $schedule->command('aimeos:jobs product/bought')->monthly();
            /*Customer notification e-mails on product updates*/ 
            $schedule->command('aimeos:jobs customer/email/watch')->dailyAt('13:05');
            /*Order delivery related e-mails*/
            $schedule->command('aimeos:jobs order/email/delivery')->hourly();
            /*Enable Category*/ 
            $schedule->command('Mosh:CatEnable')->hourly();
            /*callback manager*/
            $schedule->command('mosh:ship_notification_callback_save')->everyMinute();
            $schedule->command('mosh:order_confirmation_callback_save')->everyMinute();
        }
        if (app()->environment() === 'production') {
             /*payment confirmation/status email*/
            $schedule->command('aimeos:jobs order/email/payment')->everyMinute();
            /*capture authorized payments*/
            $schedule->command('aimeos:jobs order/service/payment')->daily();
            /*Removes unfinished orders*/ 
            $schedule->command('aimeos:jobs order/cleanup/unfinished')->hourly();
            /*Removes unpaid orders*/ 
            $schedule->command('aimeos:jobs order/cleanup/unpaid')->everyFourHours();
            /*Optimize the product index for the fastest access*/ 
            $schedule->command('aimeos:jobs index/optimize')->everyMinute();
            /*Rebuilds the product index*/ 
            $schedule->command('aimeos:jobs index/rebuild')->everyMinute();
            /*Automatically generates product suggestions*/
            $schedule->command('aimeos:jobs product/bought')->monthly();
            /*Customer notification e-mails on product updates*/ 
            $schedule->command('aimeos:jobs customer/email/watch')->dailyAt('13:05');
            /*Order delivery related e-mails*/
            $schedule->command('aimeos:jobs order/email/delivery')->hourly();
             /*Enable Category*/ 
             $schedule->command('Mosh:CatEnable')->hourly();
            /*callback manager*/
            $schedule->command('mosh:ship_notification_callback_save')->everyMinute();
            $schedule->command('mosh:order_confirmation_callback_save')->everyMinute();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
