<?php
include "const.php";

?>
<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>사문진 로그인</title>
  <link rel="stylesheet" href="./css/heaader.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/toggle.css" />
  <link rel="stylesheet" href="./css/login_1.css" />

  <!-- 폰트어썸 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- 카카오로그인 -->
  <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
  <!-- 네이버로그인 -->
  <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
  <!-- 구글로그인 -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <meta name="google-signin-client_id" content="143477412918-9eh29ql0r1ejlgp7gueks5i3tfl7lv27.apps.googleusercontent.com">
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script type="text/javascript" src="./js/login.js"></script>
</head>

<body>
  <!-- header -->
  <header>
    <section class="contents">
      <nav>
        <div class="logo">
          <a href="./index.php">
            <img src="./images/main/logo.png" alt="logo" />
          </a>
        </div>
        <div class="nb">
          <ul class="gnb">
            <?php
            if (!$userid) {
            ?>

              <li><a href="./login_form.php">Login</a></li>
              <li><a href="./member_form.php">Sign up</a></li>
            <?php
            } else {
              $logged = $username . "(" . $userid . ")님[Level:" . $userlevel . ", Point:" . $userpoint . "]";
            ?>
              <li><?= $logged ?> </li>
              <li> | </li>
              <li><a href="logout.php">로그아웃</a> </li>
              <li> | </li>
              <li><a href="member_modify_form.php">정보 수정</a></li>
            <?php
            }
            ?>
            <?php
            if ($userlevel == 1) {
            ?>
              <li> | </li>
              <li><a href="admin.php">관리자 모드</a></li>
            <?php
            }
            ?>
          </ul>
          <ul class="lnb">
            <li><a href="./about.php">소개</a></li>
            <li><a href="./facility.php">시설</a></li>
            <li><a href="./map.php">오시는 길</a></li>
            <li><a href="./reserve.php">예약</a></li>
            <li><a href="./gallery.php">갤러리</a></li>
            <li><a href="./community.php">커뮤니티</a></li>
          </ul>
        </div>
        <div class="toggle_btn">
          <a class="menu-trigger" href="#">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
      </nav>
    </section>
    <div class="side">
      <a href="./index.php"><i class="fa-solid fa-house"></i></a>
      <ul class="lnb">
        <li><a href="./about.php">소개</a></li>
        <li><a href="./facility.php">시설</a></li>
        <li><a href="./map.php">오시는 길</a></li>
        <li><a href="./reserve.php">예약</a></li>
        <li><a href="./gallery.php">갤러리</a></li>
        <li><a href="./community.php">커뮤니티</a></li>
      </ul>
      <ul class="gnb">
        <?php
        if (!$userid) {
        ?>

          <li><a href="./login_form.php">Login</a></li>
          <li><a href="./member_form.php">Sign up</a></li>
        <?php
        } else {
          $logged = $username . "(" . $userid . ")님[Level:" . $userlevel . ", Point:" . $userpoint . "]";
        ?>
          <li><?= $logged ?> </li>

          <li><a href="logout.php">로그아웃</a> </li>

          <li><a href="member_modify_form.php">정보 수정</a></li>
        <?php
        }
        ?>
        <?php
        if ($userlevel == 1) {
        ?>

          <li><a href="admin.php">관리자 모드</a></li>
        <?php
        }
        ?>


      </ul>
    </div>
  </header>

  <div id="background">
    <section id="login" class="contents">
      <div>
        <h1>로그인</h1>
      </div>
      <form name="login_form" method="post" action="login.php">

        <div class="bigBox">
          <div class="inputBox">
            <input class="textBox" type="text" name="id" placeholder="아이디">
            <input class="textBox" type="password" id="pass" name="pass" placeholder="비밀번호">
          </div>
          <button onclick="check_input()">로그인</button>
        </div>
        <!-- 카카오로그인 -->
        <!-- <div class="kakao">
            <a id="kakao-login-btn" href="javascript:kakaoLogin();">
              <img src="//k.kakaocdn.net/14/dn/btqbjxsO6vP/KPiGpdnsubSq3a0PHEGUK1/o.jpg" width="83%" height="50px" />
            </a>
          </div> -->
        <!-- 네이버로그인 -->
        <!-- <div id="naver_id_login"></div> -->
        <!-- 구글로그인 -->
        <!-- <div id="g_id_onload"
            data-client_id="143477412918-9eh29ql0r1ejlgp7gueks5i3tfl7lv27.apps.googleusercontent.com"
            data-callback="handleCredentialResponse">
          </div>
          <div class="g_id_signin" data-type="standard" data-size="large" data-width=255></div> -->


      </form>
      <div id="social_login_btn">
        <!--prompt=login => 자동로그인 해제 -->

        <!-- php 코드 정렬 -->
        <a href=<?php echo SocialLogin::socialLoginUrl("google") ?>><img src="./images/login/google_btn.png" width="200"></a>
        <a href=<?php echo SocialLogin::socialLoginUrl("kakao") ?>><img src="./images/login/kakao_login_medium_narrow.png" width="200"></a>
        <a href=<?php echo SocialLogin::socialLoginUrl("naver") ?>><img src="./images/login/naver_btn.png" width="180"></a>

      </div>
    </section>
  </div>

  <!-- 푸터 -->
  <footer>
    <div id="footerBox" class="contents">
      <div class="footertextBox">
        <div>
          <span>사문진 소개</span><span>|</span> <span>이용안내</span><span>|</span> <span>개인정보처리방침</span><span>|</span>
          <span>영상정보처리기기운영방침</span><span>|</span>
          <span>채용안내</span>
        </div>
        <div>
          <h4>(711839)대구광역시 달성군 화원읍 성산리 318-1</h4>
        </div>
        <div>
          <h4>COPYRIGHT © Collabo 4. ALL RIGHT RESERVED.</h4>
        </div>
      </div>
      <div class="footerlogo">
        <img src="./images/main/logo_black.png" alt="logo" />
      </div>
    </div>
  </footer>

  <script src="./js/toggle.js"></script>

  <!-- 카카오로그인 -->

  <!-- <script>
    //JavaScript 키 : 56d51771a4a9d45bce2747686afe4f96
    
    window.Kakao.init("3da40457bfdcc4665f55f88b67175d26"); // API Key 입력

    function kakaoLogin() {
      // 함수 선언
      window.Kakao.Auth.login({
        // 카카오 연동 로그인을 위한 인증, 로그인 될 때 실행됨
        scope: "profile_nickname, account_email", // 가져올 카카오 로그인 정보 중 동의항목 ID 설정
        success: function (authobj) {
          console.log(authobj); // 받아온 오브젝트 데이터를 콘솔로 출력해보기
          window.Kakao.API.request({
            // 로그인 된 상태에서 유저의 로그인 정보(이메일, 닉네임 등) 값을 요청해서 받아오기
            url: "/v2/user/me", //로그인 한 사용자의 정보가 있는 url 지정
            success: (res) => {
              const kakao_account = res.kakao_account; // account 정보 가져오기
              console.log(kakao_account);
              
            },
          });
        },
      });
    }
    //카카오로그아웃  
    function kakaoLogout() {
      if (Kakao.Auth.getAccessToken()) {
        Kakao.API.request({
          url: '/v1/user/unlink',
          success: function (response) {
            console.log(response)
          },
          fail: function (error) {
            console.log(error)
          },
        })
        Kakao.Auth.setAccessToken(undefined)
      }
    }

  </script> -->
  <!-- //네이버 로그인 버튼 노출 영역 -->

  <!-- <script type="text/javascript">

    var naver_id_login = new naver_id_login("_eKCYA0sQZDO7VLHX24d", "https://elaborate-nasturtium-7ef512.netlify.app/naver_callback.php");
    var state = naver_id_login.getUniqState();
    naver_id_login.setButton("green", 8, 55);
    naver_id_login.setDomain("https://elaborate-nasturtium-7ef512.netlify.app");
    naver_id_login.setState(state);
    // naver_id_login.setPopup();
    naver_id_login.init_naver_id_login();
    console.log(naver_id_login.getProfileData("name"));
    console.log(naver_id_login.getProfileData("email"));
    console.log(naver_id_login.getProfileData("nickname"));
    console.log(naver_id_login.getProfileData("age"));

  </script> -->

  <!-- 구글 소셜 로그인 -->

  <!-- <script>
    function handleCredentialResponse(response) {
      // decodeJwtResponse() is a custom function defined by you
      // to decode the credential response.
      const responsePayload = parseJwt(response.credential);

      console.log("ID: " + responsePayload.sub);
      console.log('Full Name: ' + responsePayload.name);
      console.log('Given Name: ' + responsePayload.given_name);
      console.log('Family Name: ' + responsePayload.family_name);
      console.log("Image URL: " + responsePayload.picture);
      console.log("Email: " + responsePayload.email);
      console.log(responsePayload)
      
    };
    function parseJwt(token) {
      var base64Url = token.split('.')[1];
      var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
      var jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
      }).join(''));

      return JSON.parse(jsonPayload);
    };
  </script> -->
</body>

</html>