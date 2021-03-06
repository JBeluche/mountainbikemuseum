<?php

namespace App\Http\Controllers;
use App\Currency;
use App\PaymentPlatform;
use App\Services\PaypalService;
use Illuminate\Http\Request;
use Auth;
use App\Payment;
use App\Subscription;
use App\Page;

class DashboardController extends Controller
{
      
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(Auth::user()->id == 8)
        {

            $pages = Page::all();
            return view('dashboard.admin')->with(compact('pages'));
        }

        $payments_query = Payment::orderBy('created_at')->where('user_id', Auth::user()->id)->get();

        $payments = $payments_query->reverse();

        //Get records from mollie or paypal
        return view('dashboard.payments')->with(compact('payments'));

    }

    public function subscriptiesGet(){

        //Get all subsciption from database
       $subscriptions = Subscription::where('user_id', Auth::user()->id)->get();

        return view('dashboard.subscriptions')->with(compact('subscriptions'));
    }
    public function instellingen(){
        
    }
    public function help(){
        return view('dashboard.uitleg');
    }
}
