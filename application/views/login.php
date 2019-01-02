<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>LogIn SIPAS</title>

  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?= base_url('assets/vendor/loginform/')?>css/style.css">
  
</head>

<body>

  <div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form action="<?= base_url('login/aksi_login') ?>" method="POST" id="form-login">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="pass" placeholder="Password" required>
    <a href="#" id="submit">Log in</a>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten">Forgotten password</span>
    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="<?= base_url('assets/vendor/loginform/')?>js/index.js"></script>
  <script>
    $(document).ready(function () {
      $('#submit').click(function (e) { 
        e.preventDefault();
        if (cekinput() == true) {
          $('#form-login').submit();
        } else {
          alert('Username dan Password harus diisi');
        }
      });
    });

    function cekinput() {  
      var uname = $('input[name=username]').val();
      var pass = $('input[name=pass]').val();
      if (uname.length == 0 || pass.length == 0) {
        return false;
      } else {
        return true;
      }
    }
    
  </script>
</body>

</html>
