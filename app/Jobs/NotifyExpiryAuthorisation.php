<?php

namespace App\Jobs;

use App\Authorisation;
use App\Notifications\AuthorisationExpiring;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class NotifyExpiryAuthorisation
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

      $expiringAuthorisations = Authorisation::whereRaw('DATEDIFF(valid_until, CURRENT_DATE) = notify_days')
        ->orWhereRaw('DATEDIFF(valid_until, CURRENT_DATE) <= 7')
        ->distinct()
        ->get();

      // skip sending notification if there is no authorisation expiring today
      if ($expiringAuthorisations->count() === 0) {
          return;
      }

      $user = User::first();
      $user->notify(new AuthorisationExpiring($expiringAuthorisations));
    }
}
