@extends('layouts.app')

@section('title')
    Checkout | Jkost
@endsection


@section('content')
<style>
    html, body
{
    height: 100%;
    color: black;
    /* font-family: 'Barlow', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
}

.body-text
{
    font-size: 62.5%;
}

body
{
    background:  url(https://images.unsplash.com/photo-1462899006636-339e08d1844e?auto=format&fit=crop&w=1950&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D) no-repeat center center fixed; 
    background-size: cover;
}
.main-wrapper
{
    border-radius: 15px 15px 15px 15px;
    -moz-border-radius: 15px 15px 15px 15px;
    -webkit-border-radius: 15px 15px 15px 15px;
    border: none;
    -webkit-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
}

.basket-header
{
    border-radius: 15px 0 0 0;
    -moz-border-radius: 15px 0 0 0;
    -webkit-border-radius: 15px 0 0 0;
    padding-left: 25px !important;
}

.creditcard-header
{
    border-radius: 0 15px 0 0;
    -moz-border-radius: 0 15px 0 0;
    -webkit-border-radius: 0 15px 0 0;
    padding-left: 35px !important;
}

.panel-wrapper
{
}

.panel-header
{
    background: #166D9A;
    height: 80px;
    padding: 15px 20px 0 20px;
}

.panel-wrapper .basket-header .column-titles
{
    color: #A2C6DD;
    padding: 0;
    margin: 0;
    /* font-family: 'Anton', sans-serif; */
    display: none;
    visibility: hidden;
}

.fix-overflow
{
    padding-right: 5px !important;
}

.panel-wrapper .basket-body
{
    overflow-x: hidden;
    overflow-y: auto;
}

.panel-wrapper .creditcard-body
{
    padding: 20px 40px 0 40px;
}

.panel-wrapper .panel-body
{
    font-weight: 400;
    font-size: 1.2em;
    outline: none !important;
    min-height: 350px;
    max-height: 350px;
}

.basket-body
{
    background: #F9F9F9;
}

.creditcard-body
{
    background: white;
}

.basket-body .row.product
{
    margin: 5px 0 5px 0;
    padding:  5px 0 5px 0;
    border-bottom: solid 1px #eeeeee;
}

.basket-body .row.product div
{
    color: #777879;
    padding: 0 10px 0 10px;
}

.basket-body .row.product .product-image
{
}

.product-image img
{
    -o-object-fit: contain;
    object-fit: contain;
    width: 100%;
    min-width: 100%;
    max-width: 100%;
    max-height: 80px;
}

.card-wrapper
{
    height: 100%;
}

.padding-top-10
{
    padding-top: 10px !important;
}

.padding-top-20
{
    padding-top: 20px !important;
}

.padding-horizontal-40
{
    padding: 0 40px 0 40px;
}

.align-right
{
    text-align: right;
}

.align-center
{
    text-align: center;
}

.emphasized
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    font-size: 1.6em;
    color: white;
}

.description
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 1.2em;
    color: #A2C6DD;
}

.panel-footer
{
   
    height: 50px;
}

.basket-footer
{
    background: #166D9A;
    border-radius: 0 0 0 15px;
    -moz-border-radius: 0 0 0 15px;
    -webkit-border-radius: 0 0 0 15px;
}

.basket-footer .title, .basket-footer .subtitle
{
}

.creditcard-footer
{
    background: white;
    border-radius: 0 0 15px 0;
    -moz-border-radius: 0 0 15px 0;
    -webkit-border-radius: 0 0 15px 0;
    padding: 0 30px 0 30px;
}

.basket-footer .row .subtitle, .basket-footer .row .title
{
}

.panel-footer hr
{
    margin: 3px 0 3px 0;
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #197fb3;
    padding: 0;
}

.panel-footer button
{
    border: solid 1px #166D9A;
    background: #166D9A;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    color: white;
    font-size: 1.3em;
    text-transform: uppercase;
    padding: 10px 15px 11px 15px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}

.panel-footer button:hover
{
    cursor: pointer;
}

button.cancel
{
    background: white;
    color: #166D9A;
}

button.cancel:hover
{
    background: #ff0000;
    border-color: #ff0000;
    color: white;
}

button.confirm:hover
{
    background: #00b300;
    border-color: #00b300;
    color: white;
}

.dive
{
    margin-top: 5px;
}

.sub
{
    font-size: 75%;
    color: #aaaaaa;
}

.very
{
    font-size: 2.2em;
}

.creditcard-body form
{
    font-size: 1.3em;
}
 
.creditcard-body form i.fa
{
    margin-right: 10px;
    color: #166D9A;
}

.creditcard-body form fieldset
{
    border-bottom: dotted 2px #D0D0D0;
    margin-bottom: 25px;
}

.creditcard-body form input
{
    border: none;
    font-weight: 600;
    color: #555555;
    width: 85%;
    outline: none;
}

.creditcard-body form input::placeholder
{
    color: #D0D0D0;
}

.creditcard-body form label
{
    color:  #aaaaaa;
}

.additional
{
    font-weight: 300;
    font-size: 80%;
}

.fa-info-circle
{
    color: #aaaaaa !important;
}

span.month.focused.active
{
    background: #166D9A !important;
    background-image: none !important;
}


@media (max-width: 10000px)
{
}

@media (max-width: 1000px)
{
    
    .basket-header
    {
        border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        -webkit-border-radius: 15px 15px 0 0;
    }
    
    .basket-footer
    {
        background: #166D9A;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }    
    
    .creditcard-header
    {
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }
    
    .creditcard-footer
    {
        border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        -webkit-border-radius: 0 0 15px 15px;
    }
    
}

</style>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Tentang Kami</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="about.php">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid background body-text">
        <div class="row padding-top-20">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 offset-md-1 offset-lg-1 offset-xl-2 padding-horizontal-40">
                <div class="row">
                    <div class="col-12 main-wrapper">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div id="template" class="row panel-wrapper">
                                    <div class="col-12 panel-header basket-header">
                                        <div class="row">
                                            <div class="col-6 basket-title">
                                                <span class="description">review your</span><br><span class="emphasized">Cart Summary</span>
                                            </div>
                                            <div class="col-6 order-number align-right">
                                                <span class="description">order #</span><br><span class="emphasized">no 232323</span>
                                            </div>
                                        </div>
                                        <div class="row column-titles padding-top-10">
                                            <div class="col-2 align-center"><span>Photo</span></div>
                                            <div class="col-5 align-center"><span>Name</span></div>
                                            <div class="col-2 align-center"><span>Quantity</span></div>
                                            <div class="col-3 align-right"><span>Price</span></div>
                                        </div>                                    
                                    </div>
                                    <div class="col-12 panel-body basket-body">
                                        <div class="row product">
                                            <div class="col-2 product-image"><img src=""></div>
                                            <div class="col-5"><br><span class="additional"></span></div>
                                            <div class="col-2 align-right"><span class="sub"></span>qus</div>
                                            <div class="col-3 align-right"><span class="sub"></span>213232</div>
                                        </div>
                                       {{-- end forena --}}
                                    </div>
                                    <div class="col-12 panel-footer basket-footer">
                                        <hr>
                                        <div class="row">
                                            <div class="col-7 align-right description"><div class="dive  emphasized">Total = </div></div>
                                            <div class="col-2 align-right"><span class="very emphasized">21213232</span></div>
                                        </div>
                                        <hr>
                                        {{-- <div class="row">
                                            <div class="col-8 align-right description"><div class="dive">Total</div></div>
                                            <div class="col-4 align-right"><span class="very emphasized">21213232</span></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row panel-wrapper">
                                    <div class="col-12 panel-header creditcard-header">
                                        <div class="row">
                                            <div class="col-12 creditcard-title">
                                                <span class="description">please enter your</span><br><span class="emphasized">Credit Card Information</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 panel-body creditcard-body">
                                        <form action="#" method="post" target="_self">
                                            <fieldset>
                                                <label for="card-name">Name on the Card</label><br>
                                                <i class="fa fa-user-o" aria-hidden="true"></i><input type='text' id='card-name' name='card-name' placeholder='John Doe' title='Name on the Card'>
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-expiration">Expiration Date</label><br>
                                                <i class="fa fa-calendar" aria-hidden="true"></i><input type='text' id='card-expiration' name='card-expiration' placeholder='YY/MM' title='Expiration' class="card-expiration">
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-ccv">CVC/CCV</label>&nbsp;<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards. On your American Express branded credit or debit card it is a 4 digit numeric code."></i><br>
                                                <i class="fa fa-lock" aria-hidden="true"></i><input type='text' id='card-ccv' name='card-ccv' placeholder='123' title='CVC/CCV'>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="col-12 panel-footer creditcard-footer">
                                        <div class="">
                                            <div class="col-12 align-center"><button class="cancel">Cancel</button>&nbsp;<button class="confirm">Confirm & Pay</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



