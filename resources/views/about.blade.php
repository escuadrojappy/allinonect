
@extends('masterwelcome.masterwelcometemplate')
@section('content')

<link rel="stylesheet" href="{{ asset('css/about.css') }}">

<header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="welcome" >Home </a>
          <a href="about" class="under">About</a>
          <a href="account">Account</a>
          <a href="contact">Contact Us</a>
        </div>
      </div>
    </header>
    <section class="home">
    <img class="video-slide" src="{{ asset('images/about.png')}}" >
      <div class="content">
        <h1>ALL-IN-ONE.<br><span>WHO WE ARE </span></h1>
        <p><h3>We are the founders of the system designed to mitigate the effects of the rapidly spreading Covid-19 disease.</h3><br><p>Our intention is to enhance the current contact tracing system in Cabanatuan City by utilizing web technology and to expand the use of Philippine national identification. We guarantee that this platform will simplify the process for you.</p><br><h3>Come and join us right now.</h3></p>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      {{-- <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div> --}}
    </section>

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    //Javacript for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual){
      btns.forEach((btn) => {
        btn.classList.remove("active");
      });

      slides.forEach((slide) => {
        slide.classList.remove("active");
      });

      contents.forEach((content) => {
        content.classList.remove("active");
      });

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });
    </script>
@endsection