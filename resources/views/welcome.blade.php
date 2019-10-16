<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                {{--<form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">--}}
{{--                    {{ csrf_field() }}--}}
                    {{--@csrf--}}
                    {{--<h2 class="w3-text-blue">Payment Form</h2>--}}
                    {{--<p>Demo PayPal form - Integrating paypal in laravel</p>--}}
                    {{--<p>--}}
                        {{--<label class="w3-text-blue"><b>Enter Amount</b></label>--}}
                        {{--<input class="w3-input w3-border" name="amount" type="text"></p>--}}
                    {{--<button class="w3-btn w3-blue">Pay with PayPal</button></p>--}}
                {{--</form>--}}
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmTransaction" id="frmTransaction">
                    @csrf
                    <input type="hidden" name="business" value="{{$paypal_id}}">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="item_name" value="{{$product->name}}">
                    <input type="hidden" name="item_number" value="{{$product->id}}">
                    <input type="hidden" name="amount" value="{{$product->price}}">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="cancel_return" value="http://demo.expertphp.in/payment-cancel">
                    <input type="hidden" name="return" value="http://demo.expertphp.in/payment-status">
                </form>
                <script>document.frmTransaction.submit();</script>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
