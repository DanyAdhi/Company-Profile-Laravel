@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/contact.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
    </style>    
@endsection

@section('hero')
    <h1>Contact Jogja-Travel</h1>
    <h2>Bergabung dan liburan bersama Kami</h2>
@endsection

@section('content')

  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="section-header">
        <h3 class="section-title">Contact</h3>
        <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      </div>
    </div>

    {{-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> --}}

    <div class="container wow fadeInUp">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Gedong Tengen,
                <br>Daerah Istimewa Yogyakarta</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>danyadhi4149@gmail.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>0831-6179-3990</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #contact -->
@endsection