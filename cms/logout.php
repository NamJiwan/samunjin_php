<?php

  include_once dirname(__FILE__)."/social_login_config.php";


  $accessToken = $_SESSION['accessToken'];
  $state = $_SESSION['state'];
  logout($accessToken);

  if($state == 'kakao'){
    logout($accessToken);
  }else if($state == 'naver'){
    naverLogout($accessToken);
  }

  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  unset($_SESSION['state']);
  unset($_SESSION['acceccToken']);
  
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
