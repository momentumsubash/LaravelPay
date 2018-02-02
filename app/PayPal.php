<?php

namespace App;

use Omnipay\Omnipay;

/**
 * Class PayPal
 * @package App
 */
class PayPal
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername('momentum.acharya_api1.gmail.com');
        $gateway->setPassword('32HJASSPTEGSECCX');
        $gateway->setSignature('A3n5IvD0h1t7IoRgJ-za0kHinb8CAjJ3zH-WcdHXkCH9Q2TdeIuRS2SW');
        // $gateway->setTestMode(config('momentum.acharya@gmail.com'));
        //https://www.paypal.com/businessprofile/mytools/apiaccess/firstparty/signature

        return $gateway;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param array $parameters
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param $amount
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }

    /**
     * @param $order
     */
    public function getCancelUrl($order)
    {
        return route('paypal.checkout.cancelled', $order->id);
    }

    /**
     * @param $order
     */
    public function getReturnUrl($order)
    {
        return route('paypal.checkout.completed', $order->id);
    }

    /**
     * @param $order
     */
    public function getNotifyUrl($order)
    {
        $env = config('paypal.credentials.sandbox') ? "sandbox" : "live";

        return route('webhook.paypal.ipn', [$order->id, $env]);
    }
}