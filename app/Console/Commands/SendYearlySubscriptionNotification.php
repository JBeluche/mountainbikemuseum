<?php

namespace App\Console\Commands;

use App\Subscription;
use Illuminate\Console\Command;
use Mail;
use App\Mail\YearlySubNotify;
use App\User;

class SendYearlySubscriptionNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendyearlysubscriptionnotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //Get all the yearly subscription where the date is (only day and month) is one week from now
        $subscriptions = Subscription::all();

        //Get todays date
        $current_date = date("d-m");
        strtotime($current_date);

        //Check all the subscriptions
        foreach ($subscriptions as $subscription) {

            //Get de created date
            $subscription_date1 = $subscription->created_at;
            $subscription_date2 = strtotime($subscription_date1);
            $subscription_date3 = strtotime("-7 day", $subscription_date2);
            $subscription_date4 = date("d-m", $subscription_date3);

            if ($current_date === $subscription_date4) {
              
            //Get the user id
            $user =  User::find($subscription->user_id);
            Mail::to($user->email)
            ->send(new YearlySubNotify());
            }
        }


        //Check which have a week left before
    }
}
