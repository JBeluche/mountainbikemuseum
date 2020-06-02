<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \DB;
use \Session;

class CheckoutController extends Controller
{
    public function auth(Request $request){


        if($request->has('product_id')){

            //This session is used to redirect the page when the payment is succes or failed
            Session::put('paymentPage', $request->input('page_title'));
            
            //Set product in session
            $product = Product::where('id', $request->input('product_id'))
            ->first();
            
            //If the price is set by user
            if($request->has('price')){
                $validatedData = $request->validate([
                    'price' => 'required|min:1|not_in:0',
                ]);
                Session::put('price', $request->input('price'));
            }
            else{
                Session::put('price', false);
            }
              Session::put('product', $product);
        }

        if(Auth::check()){
            return redirect('/checkout/payment-options');
        }

        return view('checkout.register');

    }

    public function options(){

        Session::put('paymentPlatforms', PaymentPlatform::all());

            //Check if product is subscription
            if(Session::get('product')->is_subscription === "1"){
                
                //Ask for login? Redirect?
                if(Auth::check()){
                    return view('checkout.option');
                }
                return redirect('home')->with('message', 'It looks like you want to get a subsciption, but we could not authenticate you! Please try again or contact us if the error persist.');
            }
            //Elseif product is non subsciption show view options with product info
            elseif(Session::get('product')->is_subscription === "0"){

                return view('checkout.option');
            }

            
        return redirect('home')->with('message', 'Something went wrong, please try again or contact us!');
        
    }

    public function registerCreate(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|confirmed',
            'bedrijfsnaam' => 'max:100',
            'type_klant' => 'max:50',
        ]);

        $user = User::create(request(['name', 'email', 'password', 'bedrijfsnaam', 'type_klant']));

        if(auth()->login($user)){
            return redirect('/checkout/payment-options');
        }
        return redirect()->back()->withErrors(['!', 'Het email adres of wachtwoord klopt niet.']);
    }

    public function registerView(){
        if(Auth::check()){
            return redirect('/checkout/option');
        }
        return view('checkout.register');
    }

    public function loginView(){
        if(Auth::check()){
            return redirect('/checkout/option');
        }
        return view('checkout.login');
    }

    public function loginCreate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { 
            
            return redirect('/checkout/payment-options');
        }

        return redirect()->back()->withErrors('Email of wachtwoord is verkeerd.');

    }

}
