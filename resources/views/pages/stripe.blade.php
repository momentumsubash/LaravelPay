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
  <input type="integer" name="amt" id="amt">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ env('STRIPE_KEY') }}"
    data-amount="999"
    data-name="Momentum Subash"
    data-description="Momentum pay service test"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-panel-label="Pay your Bill"
    data-label="Click Here to Pay Bill"
    data-zip-code="true">

  </script>
</form>