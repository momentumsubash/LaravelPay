<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Omnipay\Omnipay;
use Omnipay\Common\CreditCard;
use View;

class PaymentController extends Controller
{
    //
    
    public function loadForm()
    {
         return View::make('pages.stripe', [
                'users' => ''
            ]);
    }

     public function loadPayForm()
    {
         return View::make('pages.paypal', [
                'users' => ''
            ]);
    }

    function setcard(){
 
        try{
            // $card = [
            //     'number' => $value['card'],
            //     'expiryMonth' => $value['expiremonth'],
            //     'expiryYear' => $value['expireyear'],
            //     'cvv' => $value['cvv']
            // ];
            $card = [
                'number' => '4242424242424242',
                'expiryMonth' => '6',
                'expiryYear' => '2030',
                'cvv' => '123'
            ];
            $ccard = new CreditCard($card);
            $ccard->validate();
            $this->card = $card;
            return $this->card;
        }
        catch(\Exception $ex){
            return $ex->getMessage();
        }
 
    }

    function makepay(Request $request){
        try{
 
            // Setup payment Gateway

            $token = $request->input('stripeToken');

               
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey('sk_test_EcQ6ywrcEurrMAQXpFbVi0WD');
            // Send purchase request

            return $gateway;
            $response = $gateway->purchase(
                [
                    'amount' => '10.00',
                    'currency' => 'USD',
                    'token' => $token,
                ]
            )->send();
 
            // Process response
            if ($response->isSuccessful()) {
 
                return "Thankyou for your payment";
 
            } elseif ($response->isRedirect()) {
 
                // Redirect to offsite payment gateway
                return $response->getMessage();
 
            } else {
               // Payment failed
               return $response->getMessage();
            }
        }
        catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
 
    public function setUpPayment(Request $request)
    {
           
        
        $token = $request->input('stripeToken');
    
        
        $gateway = Omnipay::create('Stripe');

        // $card_data = [
        //     'firstname' => 'subash',
        //     'surname' => 'acharya',
        //     'expiryMonth' => '6',
        //     'expiryYear' => '2030',
        //     'number' => '4242424242424242',
        //     'email' => 'jpt@jpt.com',
        //     'cvv' => '123'
        // ];

        $gateway->setApiKey('sk_test_EcQ6ywrcEurrMAQXpFbVi0WD');
        // $response = $gateway->createCard($card_data)->send();
      

        // $formData = array('number' => '4242424242424242', 'expiryMonth' => '6', 'expiryYear' => '2030', 'cvv' => '123');
        $card= $this->setcard();
         $response = $gateway->purchase([
            'amount' => (float)$request['amt'],
            'currency' => 'USD',
            'token' => $token
            
        ])->send();

        if ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } elseif ($response->isSuccessful()) {
            // payment was successful: update database
            print_r($response);
        } else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }

    }

    public function checkoutPayment(Request $request)
    {
           
        
        $token = $request->input('stripeToken');
    
        
        $gateway = Omnipay::create('Stripe');

        // $card_data = [
        //     'firstname' => 'subash',
        //     'surname' => 'acharya',
        //     'expiryMonth' => '6',
        //     'expiryYear' => '2030',
        //     'number' => '4242424242424242',
        //     'email' => 'jpt@jpt.com',
        //     'cvv' => '123'
        // ];

        $gateway->setApiKey('sk_test_EcQ6ywrcEurrMAQXpFbVi0WD');
        // $response = $gateway->createCard($card_data)->send();
      

        // $formData = array('number' => '4242424242424242', 'expiryMonth' => '6', 'expiryYear' => '2030', 'cvv' => '123');
        $card= $this->setcard();
         $response = $gateway->purchase([
            'amount' => (float)$request['amt'],
            'currency' => 'USD',
            'token' => $token
            
        ])->send();

        if ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } elseif ($response->isSuccessful()) {
            // payment was successful: update database
            print_r($response);
        } else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }

    }

    
}
