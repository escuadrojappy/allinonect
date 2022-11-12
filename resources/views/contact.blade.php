<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="post">
      <div class="qwe">Thankyou for reaching out to us!
      </div>
    </div>
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Cabanatuan City</div>
          <div class="text-two">Nueva Ecija</div>
        </div>

        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+63 9876543210</div>
          <div class="text-two">+63 1234567890</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">pedro@gmail.com</div>
          <div class="text-two">allinonect@yahoo.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have questions, we will answer it! Feel free to contact us through our phone number and email.</p>
      <form action="#">
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your Message"></textarea>
        </div>
        <div class="btn">
          <button type="submit">Send</button>

        </div>

      </form>
    </div>
    </div>
  </div>
  <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const content = document.querySelector(".content")
    btn.onclick = ()=>{
    content.style.display = "none";
    post.style.display = " block";
    }
  </script>


</body>
</html>
