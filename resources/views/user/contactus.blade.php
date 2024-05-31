@extends('user.header')
@section('content')
<!-- ***** Header Area End ***** -->

<div id="contact" class="contact-us section">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h6>Contact Us</h6>
                    <div class="line-dec"></div>
                </div>
            </div>
            <div  class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="{{ route('message.store') }}" method="post">
                    {{ csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-dec">
                                <img src="assets/images/contact-dec.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5" style="background-color: #9747FF; border-radius: 80px; padding-left: 129px; ">
                            <div>
                                    <h4 style="color: white; text-align: left; margin: 40px;  font-family: 'Poppins', sans-serif;"> Contact information</h4>


                            </div>
                            <div style="color: white; text-align: left;" >
                                <div style="color: white; text-align: left;" >

                                    @foreach(app("App\Http\Controllers\SocialNetworkController")->getAllSocial() as $socialwork)
                                        <p style="color: white;  margin-bottom: 40px;  margin-top: 100px;"> {!! $socialwork->icon !!} {{ $socialwork->link }}</p>

                                    @endforeach

                                </div>

                             </div>

                        </div>
                        <div class="col-lg-7">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="firstname" id="name" placeholder="First Name" autocomplete="on" required>
                                        </fieldset>
                                        <fieldset>
                                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="lastname" id="name" placeholder="Last Name" autocomplete="on" required>
                                        </fieldset>

                                        <fieldset>
                                            <input type="text" name="phone" id="subject" placeholder="Phone Number" autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <fieldset>
                                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Write Your Message..." required=""></textarea>
                                    </fieldset>
                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit"  style="background-color: #9747FF; border-color:#9747FF;color:white;">Send Message </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>







@endsection

