<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Citizen</title>
        <link rel="stylesheet" href="{{ asset('css/csettings.css') }}">
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
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <input  class="form-control" type="file" name="uploadfile" value="" style="margin-left:30px; color:white" /><button class="btn btn-primary" type="submit" name="upload" style="margin-left: -25px">Submit</button>
                    </div>
                </form>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <input  class="form-control" type="file" name="uploadfile" value="" style="margin-left:30px; color:white" /><button class="btn btn-primary" type="submit" name="upload" style="margin-left: -25px">Submit</button>
                    </div>
                </form>
                {{-- <div class="name">
                    Anya Forger
                </div> --}}
                <div class="details">
                    <div class="col">
                        <ul type="none">
                            <form >
                                <input type="text" class="form-control" placeholder="Name" style="margin-bottom:2px;margin-left:5px">
                                <input type="email" class="form-control" placeholder="Email" style="margin-bottom:2px;margin-left:5px">
                                <input type="text" class="form-control" placeholder="PCN" style="margin-bottom:2px;margin-left:5px">
                                <input type="submit" value="Submit" style="margin-bottom:2px;margin-left:5px">
                              </form>
                            
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

  

    {{-- <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        </script> --}} //save images /not working
    </body>
    </html>