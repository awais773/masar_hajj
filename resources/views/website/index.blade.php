<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Masar</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link href="{{ asset('frontend/image/sliders/favoicon.png') }}" rel="shortcut icon">

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/icofont.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/hover-min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/override.css') }}" rel="stylesheet">
    {{-- new code  --}}
    {{-- <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" /> --}}

    {{-- new code end  --}}

    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="0">
    <header id="home">
        <div class="overlay">
            <nav class="navbar navbar-default" data-offset-top="70" data-spy="affix">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button aria-expanded="false" class="navbar-toggle collapsed"
                            data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span
                                class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>

                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img class="app-logo" src="{{ asset('frontend/image/masarhajj.jpg') }}"
                                alt="MasarHajj Logo" width="150"
                                height="95">
                        </a>

                    </div><!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a data-value="home" href="#home">Home</a>
                            </li>
                            <li>
                                <a data-value="featured" href="#featured">Featured</a>
                            </li>
                            <li>
                                <a data-value="download" href="#download">Download App</a>
                            </li>
                            <li>
                                <a data-value="screenshot" href="#screenshot">Screenshots</a>
                            </li>
                            <li>
                                <a data-value="register" href="#register">Registeration Request</a>
                            </li>
                            <li>
                                <a data-value="contact" href="#contact">Contact</a>
                            </li>
                            {{-- new code  --}}
                             <li>
                                <a data-value="app" href="#app">Pricing Plan</a>
                            </li>
                            <li>
                                <a href="{{ url('https://masarhajj.com/login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ url('arabic') }}">عربى</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


        </div>
    </header>
    <div class="info" style="margin-bottom: 20px;padding-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="txt col-md-6 wow fadeInLeft">
                    <h2>Real-time information on Masar Hajj</h2>
                    <p>What is the path system for Hajj and Umrah? Masar hajj is a mobile application that
                        manage hajj company and connects hajj person if need halp to direct location and
                        transportation system, allowing them to locate them,at any time during their route.
                        Masar system helps Hajj and Umrah companies to track and trace the movement of buses
                        designated for pilgrims and Hajj from the moment the buses leave until they reach their
                        destination safely, as well as access to any pilgrim or Hajj in case he is lost, and it
                        also allows the pilgrim or pilgrim to reach the place of the bus or the camp or hotel
                        also there are many features to help.</p><a class="btn btn-primary" href="#download">Download
                        App</a>
                </div>
                <div class="devicess col-md-6 wow fadeInRight" style="height:290px;"><img class="device1"
                        src="{{ asset('frontend/image/sliders/device5.png') }}"> <img class="device2"
                        src="{{ asset('frontend/image/sliders/device4.png') }}"></div>
            </div>
        </div>
    </div>

    <section id="featured">
        <div class="features">
            <div class="container">
                <div class="row text-center">
                    <h2>Features</h2>
                    <div class="feature col-md-3  col-sm-6 wow fadeInLeft">
                        <i aria-hidden="true" class="fa fa-map-marker hvr-grow"></i>
                        <h4>Geolocation</h4>
                        <p>Real time location Access information through a user-friendly interface on your smartphone or
                            Tablet.Geolocation brings personalized online training content to your audience, no matter
                            where they are in the world.
                        </p>
                    </div>

                    <div class="feature col-md-3 col-sm-6 wow fadeInLeft">
                        <i aria-hidden="true" class="fa fa-mobile hvr-grow"></i>
                        <h4>Alerts</h4>
                        <p>
                            Keep Hajj Members directly informed and notified easily of delays, whilst allowing to
                            control emergency situations efficiently. The Alert component can be used to provide
                            important and potentially time-sensitive information.
                        </p>
                    </div>

                    <div class="feature col-md-3  col-sm-6 wow fadeInLeft">
                        <i aria-hidden="true" class="fa fa-comments hvr-grow"></i>
                        <h4>Messages</h4>
                        <p>With Masar Hajj,Manager can send messages and push notifications directly to the Hajj member
                            app. A message is a discrete unit of communication intended by the source for consumption by
                            some recipient or group of recipients.
                        </p>
                    </div>

                    <div class="feature col-md-3 col-sm-6 wow fadeInLeft">
                        <i aria-hidden="true" class="fa fa-refresh hvr-grow"></i>
                        <h4>Track</h4>
                        <p>With Masar hajj, Mananger can track its members easily in the mobily app. These codes are used to collect data on how users engage with your webpage and are typically appended to a URL.
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="how-work">
            <div class="container">
                <div class="row">
                    {{-- <div class="function col-md-6 wow fadeInDown"><img src="{{asset('frontend/image/sliders/device5.png')}}"></div> --}}

                    <div class="function col-md-6 wow fadeInDown">
                        {{-- <img src="{{ asset('assets/images/arbi.png') }}"> --}}
                        <h2 style="text-align: left; align-item:center;">Current information about<br> Masar Hajj</h2>
                        <p style="text-align: left;align-item:center;">The Hajj Path allows to be managed and
                            communicated with all campaign pilgrims. It provides easy access to the place.</p>
                        <h3 style="text-align: left; align-item:center; font-size:18px; font-weight:bold;">To Make Dua
                        </h3>
                        <p>Making dua is a crucial aspect of Islamic worship, providing a direct means of communication
                            with Allah.</p>
                        <h3 style="text-align: left; align-item:center; font-size:18px; font-weight:bold;">To See
                            Zayarat</h3>
                        <p>Witnessing the sacred rituals and landmarks of Hajj, known as "Ziyarat," is a profound
                            experience for pilgrims.</p>
                        {{-- <h3 style="text-align: left; align-item:center;">To Make </h3> --}}

                    </div>

                    <div class="work col-md-6">
                        <h2>How it works</h2>
                        <p>A complete and real-time connection between the Hajj Manager and the Hajj Members, to have
                            the location of the Manager and members up-to-date.</p>
                        <div class="col-md-6 col-sm-6">
                            <i aria-hidden="true" class="fa fa-globe"></i>
                            <p>Customised & personalised geolocation software with multiple automated
                                features.Geolocation brings personalized online training content to your audience, no
                                matter
                                where they are in the world.
                            </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <i aria-hidden="true" class="fa fa-television"></i>
                            <p>Complete backoffice software provides full management capabilities easily customizable.

                                The primary goal of your back office software is to optimize and automate the processes
                                across each of these functions.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="download">
        <div class="container">
            <div class="row text-center">
                <h2>Download App</h2>
                <p style="text-align: center">Please ask us for a fully functional demo <a href="#">here</a>.
                    Get to know the power of the
                    Masar Hajj tool.
                    Download our app to use exciting feature our MassarHajj be part,of MassarHajj community.
                </p><a class="btn btn-primary wow fadeInLeft" href="#"><i
                        aria-hidden="true" class="fa fa-apple"></i> App Store</a> <a
                    class="btn btn-primary wow fadeInRight" href="#"><i aria-hidden="true"
                        class="fa fa-android"></i> Play Store</a><br>
                <img class=" wow fadeInDown" src="{{ asset('frontend/image/Photo02.png') }}">
            </div>
        </div>
    </section>
    <section id="screenshot">
        <div class="container">
            <div class="row text-center">
                <h2>Screenshots</h2>
                <p>Here you can find some screenshots of the Masar Hajj App.Hajj is the fifth pillar among the five
                    pillars of Islam. This obligation depends on the financial and physical position of the Muslim. If
                    you are financially stable, so you must perform hajj and Umrah as soon as you could.
                    Please ask for a fully functional demo,
                    including our web management system, using our <a href="#contact">contact form</a>.</p>
            </div>
            <div class="gallary">
                <div><img src="{{ asset('frontend/image/sliders/p55.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p11.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p22.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p33.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p44.png') }}"></div>

            </div>
            <!-- <div class="frame"><img src="image/iphone-mockup-one.png"></div> -->
        </div>

    </section>
    {{-- new code for app  --}}

  <section id="app"
        style="max-width: 1100px; margin: 0 auto; display:flex; flex-wrap: wrap; justify-content: center; gap:15px;">
        {{-- <div class="box" style="max-width: 350px; margin: 0 auto;"> --}}
        <div class="box" style="max-width: 250px; margin: 0 auto;  height: auto; ">

            <div
                style="background-color: #03A99D; color: #fff; padding-top:10px; padding-right: 15px; padding-left:15px; max-width: 300px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%); padding-bottom:20px;">
                <h4 style="text-align: center; color:#FFB804;">Economy</h4>
                <h5 style="text-align: center; font-weight:25px;">SAR&nbsp;<span
                        style="font-size: 30px; font-weight:bold; color:#FFB804;">44</span>/per/month</h5>
                <p style="color: #fff; text-align:center; font-size:11px;">
                    The economy encompasses the production and exchange of goods and services within a society
                </p>
            </div>

            <p style="text-align: center; font-size:12px; margin-top:10px; padding:10px;"> Excellent for limited use,
                won't to spend a lot? The "economy" subscription will enable up to 15
                people participate with the server space.
            </p>

            <div class="button" style="text-align: center; padding-top:80px;padding-bottom:15px;">
                <a href="#frmregister">
                    <button
                        style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                        Contact Us
                    </button>
                </a>
            </div>
        </div>

        {{-- <div class="box"> --}}
        {{-- <div class="box" style="max-width: 350px; margin: 0 auto;"> --}}
        <div class="box" style="max-width: 250px; margin: 0 auto; height: auto; ">
            <div
                style="background-color: #03A99D; color: #fff; padding-top:10px; padding-right: 15px; padding-left:15px;clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);  padding-bottom:20px;">

                <h4 style="text-align: center; color:#FFB804;">Standard</h4>
                <h5 style="text-align: center; font-weight:25px;">SAR&nbsp;<span
                        style="font-size: 30px; font-weight:bold; color:#FFB804">77</span>/per/month</h5>
                <p style="color: #fff; text-align:center; font-size:11px;">
                    A criterion or measure against which quality, accuracy, or achievement is assessed or judged.</p>
            </div>

            <p style="text-align: center; font-size:12px; margin-top:10px; padding:10px;">
                Excellent fo medium use,With the <br>"standard" subscription will be<br> able to share up to 50
                <br>people
                server<br>
                capacity.
            </p>

            <div class="button" style="text-align: center; padding-top:80px;padding-bottom:15px;">
                <a href="#frmregister">
                    <button
                        style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                        Contact Us
                    </button>
                </a>
            </div>

        </div>

        <div class="box" style="max-width: 250px; margin: 0 auto; height: auto;">
            <div
                style="background-color: #03A99D; color: #fff; padding-top: 10px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);">
                <h4 style="text-align: center; color:#FFB804;">Plus</h4>
                <h5 style="text-align: center; font-weight: 25px;">SAR&nbsp;<span
                        style="font-size: 30px; font-weight: bold; color: #FFB804;">224</span>/per/month</h5>
                <p style="color: #fff; text-align: center; font-size: 11px;"> In addition to; moreover; used<br> to
                    denote
                    an increase<br> or enhancement.</p>
            </div>
            <p style="text-align: center; font-size: 12px; margin-top: 10px; padding: 10px;">
                If you want to double the
                subscriptions<br> up to 100 people and<br> get high storage <br> capacity.
                {{-- <span style="font-weight: bold;">Dedicated Charted Accountants Support</span><br>Annual Submissions --}}
            </p>

            <div class="button" style="text-align: center; padding-top:100px;padding-bottom:15px;">
                <a href="#frmregister">
                    <button
                        style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                        Contact Us
                    </button>
                </a>
            </div>
        </div>
        {{-- 4th div  --}}
        <div class="box" style="max-width: 250px; margin: 0 auto; height: auto;">
            <div
                style="background-color: #03A99D; color: #fff; padding-top: 10px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);">
                <h4 style="text-align: center; color:#FFB804;">Business Pro Lite</h4>
                <h5 style="text-align: center; font-weight: 25px;">SAR&nbsp;<span
                        style="font-size: 30px; font-weight: bold; color: #FFB804;">300</span>/per/month</h5>
                <p style="color: #fff; text-align: center; font-size: 11px;">A streamlined version of a business
                    professional package offering essential features at a reduced cost</p>
            </div>
            <p style="text-align: center; font-size: 12px; margin-top: 10px; padding: 10px;">
                Business Pro Lite for medium and<br> large companies with basic feature <br>and a low cost that
                enables<br>
                up to
                200 people<br> participate.
                {{-- <span style="font-weight: bold;">Dedicated Charted Accountants Support</span><br>Annual Submissions --}}
            </p>

            <div class="button" style="text-align: center; padding-top:80px;padding-bottom:15px;">
                <a href="#frmregister">
                    <button
                        style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                        Contact Us
                    </button>
                </a>
            </div>
        </div>

    </section>





    <section id="register">
        <div class="container">

            <div class="row">
                <div class="request col-md-6  wow fadeInLeft">
                    <h2>Request for Registration</h2>
                    <p>Have exclusive control on your Hajj/Umrah trip with the help of Masar Hajj App.</p>
                </div>
                <div class=" col-md-6 wow fadeInRight">


                    <form id="frmregister" action="{{ route('admin.registrationRequest.store') }}" method="POST">
                        @csrf
                        <input class="form-control" placeholder="Company Name*" type="text" name="compname"
                            id="compname" required="required">

                        <input class="form-control" placeholder="Email*" type="email" name="compemail"
                            id="compemail" required="required">

                        {{-- <input class="form-control" placeholder="Phone*" type="tel" name="compphone"
                            id="compphone" required="required" style="width: 186%;"> --}}
                            <div>
    <!-- Display selected country code -->
    <span id="selected-country-code"></span>
    <!-- Hidden input field to store selected country code -->
    <input type="hidden" name="country_code" id="country_code">
</div>
<div>
    <!-- Phone number input field -->
<!--    <input class="form-control responsive-phone-input dropdown-container" placeholder="Phone*"-->
<!--        type="tel" name="compphone" id="compphone" required="required">-->
<!--</div>-->
                        <input class="form-control responsive-phone-input dropdown-container" placeholder="Phone*"
                            type="tel" name="compphone" id="compphone" required="required">

                        <select class="dropdown-container" name="pricing_plan" id="pricing_plan" required="required"
                            style="margin-top: 10px;">
                            <!-- Add your pricing plan options here -->
                            <option value="" selected disabled hidden>Pricing plan*</option>
                            <option value="Growth">Growth/44</option>
                            <option value="professional">Professional/77</option>
                            <option value="enterprise">Enterprise/224</option>
                        </select>

                        <textarea class="form-control" placeholder="Please let us Know how we can help:" rows="6" name="compmessage"
                            id="compmessage" style="margin-top: 10px;"></textarea>
                        <input class="form-control" type="submit" value="Register Now">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">

        <div class="container">
            <div class="row text-center wow fadeInUp">
                <h2>Get In Touch</h2>
                <p class="cont">If you need more information, please do not hesitate to contact us!</p>
                <form action="#" id="contact">
                    <input class="form-control" placeholder="Name" type="text" name="name" id="name"
                        required="required"> <input class="form-control" placeholder="Email" type="email"
                        name="email" id="email" required="required">
                    <textarea class="form-control" placeholder="Message" rows="6" name="message" id="message"
                        required="required"></textarea>
                    <input class="form-control btn btn-primary" type="submit" value="Send Message">
                </form>
            </div>
        </div>
    </section>
    <footer>
        <div class="addresss">
            <div class="container-fluid" style="padding: 0;background-color: #74b312">
                <div class="col-md-4" style="display: none">
                    <h2 class="text-center"
                        style="color: white;padding-top: 40px;padding-bottom: 38px;border-bottom: 1px solid white">
                        Contact</h2>
                    <ul class="list-unstyled contact-list">
                        <li><i aria-hidden="true" class="fa fa-map-marker fa-2x"></i>
                            <p>KSA - Riyadh - Al Malaz Area.</p>
                        </li>
                        <li><i aria-hidden="true" class="fa fa-envelope-o fa-2x"></i>
                            <p>info@its-gates.com
                                <br>sattam@its-gates.com
                            </p>
                        </li>
                        <li><i aria-hidden="true" class="fa fa-mobile fa-3x"></i>
                            <p>Tel: +966504644445<br>tel: +966504644445</p>
                        </li>
                    </ul>

                </div>

                <div class="col-md-12" style="padding: 0;background-color: white">
                    <div class="con">
                        <img src="{{ asset('frontend/image/map.png') }}" style="width: 100%" />



                        <span class="marker2 tooltip"><img src="{{ asset('frontend/image/pin.png') }}"
                                class="pin" />
                            <div class="tooltiptext tooltip-right">
                                <ul class="list-unstyled contact-list">
                                    <li><i aria-hidden="true" class="fa fa-map-marker fa-2x"></i>
                                        <p>KSA - Riyadh - Al Malaz Area.Tower</p>
                                    </li>
                                    <li><i aria-hidden="true" class="fa fa-envelope-o fa-2x"></i>
                                        <p>info@its-gates.com
                                    </li>
                                    <li><i aria-hidden="true" class="fa fa-mobile fa-3x"></i>
                                        <p>Tel: +966504644445
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>



            </div>
        </div>
        <div class="copyright">
            <div class="container text-center">
                <div>
                    All Rights Reserved by masar- Hajj Tracker™ © 20122
                </div>
                <div class="icons">
                    <a href="https://twitter.com/Masar_hajj"><i class="fa fa-twitter"></i></a> <a
                        href="https://www.facebook.com/people/Masar-Hajj/pfbid02n9s5qtL53AoEHXSVjMiy96ha3NZ6T3CwqYBau4C75T4xJ9dFBeNb5pVV7GTiZSLml/"><i
                            class="fa fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script>
       $(document).ready(function() {
    var input = document.querySelector("#compphone");
    var iti = window.intlTelInput(input, {
        initialCountry: 'sa', // Set the default country code to Saudi Arabia
        separateDialCode: true,
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js',
    });

    // Listen for "countrychange" event to update selected country code and hidden input value
    iti.promise.then(function() {
        var countryData = iti.getSelectedCountryData();
        var countryCode = countryData.dialCode;
        $('#country_code').val('+' + countryCode);
    });
});

    </script>
    @include('layouts.notification')
</body>

</html>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    #app {
        display: flex;
        flex-wrap: wrap;
        /* justify-content: space-around; */
        justify-content: space-around;
        padding: 20px;
    }

    .box {
        width: 100%;
        /* Set initial width to 100% for small screens */
        box-sizing: border-box;
        /* Include padding and border in the width */
        margin-bottom: 20px;
        flex: 1;
        /* padding: 20px; */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .box:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .box h4 span {
        font-size: 32px;
    }

    .responsive-phone-input {
        padding-right: 195px !important;
        max-width: 170% !important;
    }

    /* for responsive code  */

    @media screen and (max-width: 512px) {
        .box {
            display: flex;
            flex-direction: column;
        }
    }

    @media screen and (max-width: 991px) {
        .responsive-phone-input {
            padding-right: 189px !important;
        }
    }

    /* dropdown code here  */
    .dropdown-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .dropdown {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
    }

    .dropdown::after {
        content: '\2026';
        /* Unicode character for three dots */
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    @media screen and (max-width: 512px) {

        /* Adjust styles for smaller screens */
        .button {
            padding-bottom: 20px !important;
        }
    }
      @media screen and (max-width: 767px) {
        #app {
            flex-direction: column;
            /* Change flex direction to column */
            align-items: center;
            /* Center align items */
        }

        .box {
            width: 100%;
            /* Make each box take up full width */
            max-width: 100%;
            /* Ensure boxes don't exceed the width of the viewport */
        }
    }
</style>
