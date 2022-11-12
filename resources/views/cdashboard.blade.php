<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Citizen</title>
        <link rel="stylesheet" href="{{ asset('css/cdashboard.css') }}">
    </head>
    <body style="background: url(cdashboard.jpg);background-repeat:no-repeat;background-size:100% 140%;">
    </body>
    
    <body>
        <header>
            <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
            
            <div class="menu-btn"></div>
            <div class="navigation">
              <div class="navigation-items">
                <a href="cdashboard" class="active">Profile</a>
                <a href="csettings">Settings</a>
                <a href="#">Sign Out</a>
              </div>
            </div>
          </header>
        <div class="main">
        <div class="container">
            <div class="card">
                <div class="title">
                    <h1>Nueva Ecija, Philippines</h1>
                    <p>Cabanatuan City Resident</p>
                </div>
                <div class="image">
                    <div class="outer">
                        <div class="inner">
                            <img src={{asset('images/anya.jpeg')}} alt="">
                        </div>
                    </div>
                </div>
                <div class="name">
                    Anya Forger
                </div>
                <div class="details">
                    <div class="col">
                        <ul type="none">
                            <li>Anya Forger</li>
                            <li>anyaforger@gmail.com</li>
                            <li>3425-2424-5533</li>
                            
                        </ul>
                    </div>
                    <div class="col">
                        <img src={{asset('images/qr.png')}} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
    </html>