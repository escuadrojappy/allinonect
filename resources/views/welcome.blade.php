@extends('masterwelcome.masterwelcometemplate')
@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="welcome" class="under">Home </a>
          <a href="about" >About</a>
          <a href="account">Account</a>
          <a href="contact">Contact</a>
          <a href="feedback">Feedback</a>
        </div>
      </div>
    </header>

    <section class="home">
  
      <img src="{{asset('images/1.png')}}" class="video-slide1 active">
      <img src="{{asset('images/2.png')}}" class="video-slide2">
      <img src="{{asset('images/3.png')}}" class="video-slide3">
      <img src="{{asset('images/4.png')}}" class="video-slide1">

      <div class="content active">
        <h1>be a part of our<br><span>team</span></h1>
        <p>Participate in our new contact tracing approach by signing up your company and transferring your contact tracing data. This will help our city decrease the number of individuals infected with Covid-19 disease. What precisely are you waiting for? Join us right now!</p>
        <a href="account">Explore</a>
      </div>
      <div class="content">
        <h1>Contacts of<br><span>exposure</span></h1>
        <p>Contact tracing is the process of assisting patients and notifying contacts of exposure in order to break the chain of transmission. In this innovative methodology, we utilise web technology to perform contact tracing more efficiently and accurately.</p>
        <a href="account">Explore</a>
      </div>
      <div class="content">
        <h1>COVID-19.<br><span>Pandemic</span></h1>
        <p>COVID-19 is a respiratory disease caused by the coronavirus SARS-CoV-2, which was discovered in 2019. The virus spreads primarily through respiratory droplets from person to person. Unfortunately, the virus has not yet been eradicated. As of October 2022, there were 10,120 confirmed cases in the Philippines.</p>
        <a href="account" id="a3">Explore</a>
      </div>
      <div class="content">
        <h1>We're all in this<br><span>Together</span></h1>
        <p>The primary purpose of the website is to continuously monitor and contact people who have been exposed. This could be the most effective method of preventing rapid Covid-19 disease transmission. Your participation will improve the efficiency of contact tracing.</p>
        <a href="account">Explore</a>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>
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
    const slides = document.querySelectorAll(".video-slide, .video-slide2, .video-slide1, .video-slide3");
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