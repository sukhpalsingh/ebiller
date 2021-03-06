<?php

namespace App\Jobs;

use App\Bill;
use App\User;
use App\Notifications\BillPending;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\ChannelManager;

class SendBillNotification
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        date_default_timezone_set('Australia/Brisbane');

        $pendingBills = Bill::where('due_on', '<=', Carbon::tomorrow()->format('Y-m-d'))
            ->where('status', 'Pending')
            ->get();

        // skip sending notification if there is no pending bills due today or tomorrow
        if ($pendingBills->count() === 0) {
            return;
        }

        $user = User::first();
        $user->notify(new BillPending($pendingBills));
    }
}
