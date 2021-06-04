@extends('layout')
@section('content')
<div class="container">
    <section class="mb-4">
        <h2 class="h1-responsive font-weight-bold text-center my-4">
            Contact us
        </h2>
        <p class="text-center w-responsive mx-auto mb-5">
            Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.
        </p>
        <div class="row pb-5">
            <div class="col-md-9 mb-md-0 mb-5">
                <form action="{{URL('save_message')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="md-form mb-0">
                                <label for="name">
                                    Your name:
                                </label>
                                <input class="col-8" name="name" type="text">
                                </input>
                            </div>
                            <div class="md-form mb-0">
                                <label class="" for="email">
                                    Your email:
                                </label>
                                <input class="col-8" id="email" name="email" type="email">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="" for="subject">
                                       Subject
                                </label>
                                <input class="col-8" id="subject" name="subject" type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="message">
                                Your message:
                            </label>
                            <br>
                                <textarea class="md-textarea" cols="90" id="message" name="message" rows="20" type="text">
                                </textarea>
                            </br>
                        </div>
                    </div>
                    <button class="btn btn-info right" type="submit">
                        Sent Message
                    </button>
                    <?php
                            $message = Session::get('message');
                            if($message){
                                echo $message ;
                                Session::put('message',NULL);
                            }
                        ?>
                </form>
            </div>
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li>
                        <img height="40" src="{{ asset('Frontend/images/map-marker-alt-solid.svg')}}" width="40">
                            <p>
                                Dhanmondi, CA 94126, USA
                            </p>
                        </img>
                    </li>
                    <li>
                        <i class="fa fa-phone mt-4 fa-2x">
                        </i>
                        <p>
                            + 01 234 567 89
                        </p>
                    </li>
                    <li>
                        <i class="fa fa-envelope mt-4 fa-2x">
                        </i>
                        <p>
                            contact@gmail.com
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
@endsection()
