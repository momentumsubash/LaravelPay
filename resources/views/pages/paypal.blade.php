@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="gateway--info">
            <div class="gateway--desc">
                @if(session()->has('message'))
                    <p class="message">
                        {{ session('message') }}
                    </p>
                @endif
                <p><strong>Order Overview !</strong></p>
                <hr>
                <p>Item : Yearly Subscription cost !</p>
                <p>Amount : ${{ $order->amount }}</p>
                <hr>
            </div>
            <div class="gateway--paypal">
                <form method="POST" action="checkout">
                    {{ csrf_field() }}
                    <button class="btn btn-pay">
                        <i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
<!-- <form action="requestPayment" method="POST">
                    {{ csrf_field() }}
                    <div class="col-sm-5 col-md-5">
                        <div class="thumbnail">
                            <div class="caption">
                                <input type="integer" name="amt" id="amt">
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ env('STRIPE_KEY') }}"
                                        data-amount=100,
                                        data-name="Pay your value"
                                        data-description="Widget"
                                        data-locale="auto"
                                        data-currency="usd">
                                    </script>

                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </form> -->
<<form action="requestPayment" method="POST">
  {{ csrf_field() }}
  
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ env('STRIPE_KEY') }}"
    data-amount="{{ $order->amount*100 }}"
    data-name="Momentum Subash"
    data-description="Momentum pay service test"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-panel-label="Pay your Bill"
    data-label="Click Here to Pay Bill"
    data-zip-code="true">

  </script>
</form>
@endsection