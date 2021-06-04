<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('Frontend/css/nav.css')}}" rel="stylesheet">
                <link href="{{asset('Frontend/css/style.css')}}" rel="stylesheet">
                    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                    </link>
                </link>
            </link>
        </link>
    </head>
    <body style="background: #ECEFF1">
        <div class="container">
            <div class="headersection">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo">
                            <img class="img-fluid rounded" src="{{ asset('Frontend/images/wub-logo.png') }}">
                            </img>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="text-center w-responsive mx-auto">
                            Canteen Management System
                        </h1>
                    </div>
                    <div class="col-sm-3">
                        <div class="icon">
                            <a href="">
                                <img src=" {{ asset('Frontend/images/wh.png') }}"/>
                            </a>
                            <a href="">
                                <img src=" {{ asset('Frontend/images/fb.png') }}"/>
                            </a>
                            <a href="">
                                <img src=" {{ asset('Frontend/images/tw.png') }}"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.nav')
            <div class="mainBody mt-2">
                @yield('content')
            </div>
            <!--------------------Start Footer Section--------------------------------->
            <hr>
                <footer>
                    <div class="container-fluid">
                        <div class="container mt-2 pt-2">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="row pl-3">
                                        <h5 >
                                            About Us
                                        </h5>
                                    </div>
                                    
                                    <p style="text-align: justify;">
                                        A unique solution designed for big set-ups which offers dining facility in their canteen to employees. Canteen Management System is designed to create transparency between the employee, company and vendor. It reduces the worry of unauthorized usage where as software helps to automate the complete process
                                    </p>
                                </div>
                                <div class="col-md-4 pl-5">
                                    <div class="row pl-1">
                                        <h5>
                                            Opening Hours
                                        </h5>
                                    </div>
                                  
                                    <div class="row pt-1">
                                        <p>
                                            8 am to 9 pm
                                        </p>
                                    </div>
                                    <div class="row pt-2">
                                        <h5>
                                            Contact Us
                                        </h5>
                                        <p>
                                            Address:34 Street Name, City Name Here, United States
                                        </p>
                                        <br/>
                                        <p>
                                            Phone:+1 242 4942 290
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row pl-5">
                                        <h5>
                                            Quick Links
                                        </h5>
                                    </div>
                                   
                                    <div class="row pl-5">
                                        <ul class="a">
                                            <li>
                                                <a href="{{route('home')}}">
                                                    Home
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('student.register')}}">
                                                    Register
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('login.page')}}">
                                                    login
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('Contactus')}}">
                                                    Contact Us
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('aboutUs')}}">
                                                    About Us
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <hr>
                    <div class="copy_right">
                        <p>
                            Copy right@ World university of Bangladesh
                        </p>
                    </div>
                    <!--------------------End Footer Section--------------------------------->
                </hr>
            </hr>
            <script src="{{asset('Frontend/js/jquery.min.js')}}">
            </script>
            <script src="{{asset('Frontend/js/popper.min.js')}}">
            </script>
            <script src="{{asset('Frontend/js/bootstrap.min.js')}}">
            </script>

            <script>
                $(document).ready(function() {
                    $('.changeQty').on('click keyup', function() {
                        const qty = $(this).val();
                        const row = $(this).data('row');
                        const url = $(this).data('url');

                        const generateurl = url + '/updatecart/' + qty + '/' + row; 
                        
                        window.location.href = generateurl;

                    });
                });
            </script>
        </div>
    </body>
</html>