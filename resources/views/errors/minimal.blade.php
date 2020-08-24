<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            /* .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            } */
            .center{
                height: 100vh;
                weight: 100vw;
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }

            .continue{
                color: inherit;
            }

            .continue:hover{
                color: #B5F387 ;
            }

        </style>
    </head>
    <body>
        <section  class="center">
            <div>
                <div>
                    <span class="code">
                        @yield('code')
                    </span>

                    <span class="message" style="padding: 10px;">
                        @yield('message')
                    </span>
                </div>
                <div>
                    <h3 class="align-middle"><a class="continue" href="{{route('soap.index')}}">continue shopping</a></h3>
                </div>
            </div>
        </section>
    </body>
</html>
