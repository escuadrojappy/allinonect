@extends('masterwelcome.masterwelcometemplate')
@section('content')
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
    <script src="{{ asset('/js/common.js') }}"></script>
   
    
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    >
    </script>
    <script src="{{ asset('/js/jquery-confirm.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

    <header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="welcome" >Home </a>
          <a href="about" >About</a>
          <a href="account">Account</a>
          <a href="contact" class="under">Contact Us</a>
        </div>
      </div>
    </header>
    <section class="home">
   
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Send us a Message!</h3>
                    </div>
                    <div class="card-body">
                     
                        <form id="contactUSForm">
                              
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" id="email"  name="email" class="form-control" placeholder="Email" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text" id="phone_number"  name="phone_number" class="form-control" placeholder="Phone" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Subject:</strong>
                                        <input type="text" id="subject"  name="subject" class="form-control" placeholder="Subject" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea id="message"  name="message" rows="3" class="form-control" required></textarea>
                                    </div>  
                                </div>
                            </div>
                     
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script>
      $(document).ready(function () {
        $(document).on('submit', '#contactUSForm', function (e) {
          e.preventDefault()
          var params = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone_number: $('#phone_number').val(),
            subject: $('#subject').val(),
            message: $('#message').val()
          }
          $.post(`${apiUrl}contact`, params).done((result) => {
            console.log(result)
            $.confirm({
              title: 'Sucess!',
              content: 'Sucessfully Inserted Data!',
              type: 'green',
              typeAnimated: true,
              buttons: {
                sucess: {
                text: 'Success!',
                btnClass: 'btn-green',
                action: function(){
                  $( '#contactUSForm' )[0].reset()
                }
              },
            }
          });
          }).fail((error) => {
            console.log(error)
          })
          console.log(params)
        })
      })
    </script>
