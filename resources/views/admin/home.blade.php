@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Nuova sezione Dashboard -->


    <div class="dashboard container-fluid">

        <div class="row d-flex justify-content-center mb-5">
            <div class="user col-lg-3 col-md-6 col-sm-12">
                <div class="col mt-3 profile">
                    <div class="user-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Unknown-person.gif" alt="">
                    </div>
                    <ul>
                        <li><h4>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h4></li>
                        <li><p>Data di nascita: </p></li>
                        <li><p>N° Appartamenti: </p></li>
                        <li><p>Iscritto il: </p></li>
                        <li class="my-3">
                            <a class="homebottom text-center" href="{{ route('admin.apartments.create') }}">
                            Crea nuovo appartamento</a>
                        </li>
                    </ul>

                    <div class="col-12 d-flex justify-content-center my-5">

                    </div>
                </div>

            </div>



            <div class="col-9 ">
                <div class="divtitolo">
                    <h1 class="titolo">I tuoi appartamenti</h1>
                </div>
                @foreach ($userApartments as $apartment)

                    <div class="col-lg-6 col app text-center py-2" v-for="(apartment,  index) in apartmentsList" :key="`apartment${index}`">

                        <h4>{{$apartment->title}}</h4>

                        <div class="app-image col {{ count($apartment->sponsorships) == 1 ? 'border-sponsorship' : '' }} ">
                            <a id="bottone" href="/dettaglio-appartamento/{{$apartment->id}}">
                                <img src="{{File::exists('storage/'. $apartment->image) ? asset('storage/' . $apartment->image) : $apartment->image}}" alt="">
                            </a>
                        </div>

                        <div class="buttons-apartment">

                            <ul>
                                <li>
                                    <button class="btn sponsor-button buttonSponsor">Sponsorizza</button>
                                </li>
                            </ul>

                            <div class="edit-view-buttons d-flex justify-content-around">

                                <a class="btn view-button" href="/dettaglio-appartamento/{{$apartment->id}}" >Visualizza</a>

                                <a class="btn edit-button" href="{{route('admin.apartments.edit', $apartment)}}">Modifica</a>

                            </div>



                        </div>

                    </div>
                @endforeach

            </div>


            {{-- Modal --}}
            <div id="modal" class="custom-modal hidden">
                <div id="backdrop" class="backdrop"></div>
              <div class="search-modal">
                <div class="text-center d-flex justify-content-center align-items-center border-bottom py-2 px-2">
                  <h3> Acquista il pacchetto che preferisci</h3>
                </div>

                    <h5 style="margin:20px 5px; text-align:center">Sponsorizza il tuo appartamento e ottieni visibilità per..</h5>

                  <ul style="display:flex; margin-top:20px; margin-left:20px; justify-content:space-between; text-align:center">


                    <div>
                        <p>Lite: 2,99€ (24h)</p>

                        <button
                            style=" background-color:#0A7C00;
                                    color:#FFF;
                                    padding:8px 12px;
                                    border:0;
                                    border-radius:4px;
                                    font-size:1em;
                                    cursor:pointer"
                            id="checkout-button-sku_Fhr95UGQgRdVuN"
                            role="link"
                            type="button"
                            >
                            Acquista
                        </button>
                    </div>


                    <br><br><br>


                    <div style="margin: 0 20px">

                        <p>Premium: 5,99€ (72h)</p>

                        <button
                        style=" background-color:#0A7C00;
                                color:#FFF;
                                padding:8px 12px;
                                border:0;
                                border-radius:4px;
                                font-size:1em;
                                cursor:pointer"
                        id="checkout-button-sku_MNO1fABFzf9734"
                        role="link"
                        type="button"
                        >
                        Acquista
                        </button>
                    </div>

                    <br><br><br>


                    <div>
                        <p>Gold: 9,99€ (144h)</p>

                        <button
                        style=" background-color:#0A7C00;
                                color:#FFF; padding:8px 12px;
                                border:0;
                                border-radius:4px;
                                font-size:1em;
                                cursor:pointer"
                        id="checkout-button-sku_MNO1FfDk1mocB0"
                        role="link"
                        type="button"
                        >
                        Acquista
                        </button>
                    </div>

                  </ul>
                </div>
            </div>

        </div>

    </div>



</div>

<script src="https://js.stripe.com/v3"></script>

<script>

    (function() {

        let buttonId = document.getElementsByClassName('buttonId')

        let buttonSponsor = document.getElementsByClassName('buttonSponsor')
        let modal = document.getElementById('modal');
        let backdrop = document.getElementById('backdrop');

        // console.log(buttonSponsor.offsetParent.children.1.attributes.1.nodeValue);

        let appartmentId;

        Array.from(buttonSponsor).forEach(function(element) {
            element.addEventListener('click', function () {
                modal.classList.remove("hidden")

                appartmentId = element.offsetParent.children[1].children[0].getAttribute('href').slice(24);

                console.log('id appartamento: ', appartmentId);
            });
        });


        backdrop.addEventListener('click', function () {
            modal.classList.add("hidden")
        });


      // Lite:
      var stripe = Stripe('pk_test_wd83JRKqKHc07SIf8ikr2t0B00ueG1VRTn');

      var checkoutButton = document.getElementById('checkout-button-sku_Fhr95UGQgRdVuN');
      checkoutButton.addEventListener('click', function () {
        /*
         * When the customer clicks on the button, redirect
         * them to Checkout.
         */
        stripe.redirectToCheckout({
          lineItems: [{price: 'sku_Fhr95UGQgRdVuN', quantity: 1}],
          mode: 'payment',
          /*
           * Do not rely on the redirect to the successUrl for fulfilling
           * purchases, customers may not always reach the success_url after
           * a successful payment.
           * Instead use one of the strategies described in
           * https://stripe.com/docs/payments/checkout/fulfill-orders
           */
          successUrl: 'http://127.0.0.1:8000/admin/apartments/sponsorpush/1/' + appartmentId,
          cancelUrl: 'http://127.0.0.1:8000/admin',
        })
        .then(function (result) {
          if (result.error) {
            /*
             * If `redirectToCheckout` fails due to a browser or network
             * error, display the localized error message to your customer.
             */
            var displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
          }
        });
      });

    // Premium:
    var checkoutButton = document.getElementById('checkout-button-sku_MNO1fABFzf9734');
    checkoutButton.addEventListener('click', function () {
        /*
        * When the customer clicks on the button, redirect
        * them to Checkout.
        */
        stripe.redirectToCheckout({
        lineItems: [{price: 'sku_MNO1fABFzf9734', quantity: 1}],
        mode: 'payment',
        /*
        * Do not rely on the redirect to the successUrl for fulfilling
        * purchases, customers may not always reach the success_url after
        * a successful payment.
        * Instead use one of the strategies described in
        * https://stripe.com/docs/payments/checkout/fulfill-orders
        */
        successUrl: 'http://127.0.0.1:8000/admin/apartments/sponsorpush/2/' + appartmentId,
        cancelUrl: 'http://127.0.0.1:8000/admin',
        })
        .then(function (result) {
        if (result.error) {
            /*
            * If `redirectToCheckout` fails due to a browser or network
            * error, display the localized error message to your customer.
            */
            var displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
        }
        });
    });


    // Gold
    var checkoutButton = document.getElementById('checkout-button-sku_MNO1FfDk1mocB0');
    checkoutButton.addEventListener('click', function () {
        /*
        * When the customer clicks on the button, redirect
        * them to Checkout.
        */
        stripe.redirectToCheckout({
        lineItems: [{price: 'sku_MNO1FfDk1mocB0', quantity: 1}],
        mode: 'payment',
        /*
        * Do not rely on the redirect to the successUrl for fulfilling
        * purchases, customers may not always reach the success_url after
        * a successful payment.
        * Instead use one of the strategies described in
        * https://stripe.com/docs/payments/checkout/fulfill-orders
        */
        successUrl: 'http://127.0.0.1:8000/admin/apartments/sponsorpush/3/' + appartmentId,
        cancelUrl: 'http://127.0.0.1:8000/admin',
        })
        .then(function (result) {
        if (result.error) {
            /*
            * If `redirectToCheckout` fails due to a browser or network
            * error, display the localized error message to your customer.
            */
            var displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
        }
        });
    });



    })();
</script>
@endsection


