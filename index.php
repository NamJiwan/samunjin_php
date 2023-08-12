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
  <title>사문진 홈페이지</title>
  <link rel="stylesheet" href="./css/main.css" />
  <link rel="stylesheet" href="./css/heaader.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/scroll.css" />
  <link rel="stylesheet" href="./css/toggle.css" />
  <!-- 폰트어썸 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <script type="text/javascript" src="./js/vanilla-tilt.js"></script>
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

          <li><a href="./login.php">Login</a></li>
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
    </div>
  </header>

  <!-- 메인  -->
  <section id="main">
    <div class="mainImg">
      <div class='typing'>
        <h1 class="text"></h1>
      </div>
      <div class="scroll-down-wrap no-border" id="scroll_down">
        <a href="#" class="section-down-arrow">
          <svg class="nectar-scroll-icon" viewBox="0 0 30 45" enable-background="new 0 0 30 45">
            <path class="nectar-scroll-icon-path" fill="none" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" d="M15,1.118c12.352,0,13.967,12.88,13.967,12.88v18.76  c0,0-1.514,11.204-13.967,11.204S0.931,32.966,0.931,32.966V14.05C0.931,14.05,2.648,1.118,15,1.118z"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- events -->
  <section id="events" class="contents">
    <div class="titleBox">
      <h1 id="events2">행사</h1>
      <h4>사문진에서 진행되는 다양한 행사를 소개드립니다.</h4>
    </div>
    <!-- Slider main container -->
    <div class="swiper swiper_event">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <img src="./images/festival/100piano.jpg" />
          <h4>
            1년에 한번 100명의 피아노 연주자가 100대의 피아노를 연주하는
            <br />
            역사깊은 큰 이벤트이다.
          </h4>
        </div>
        <div class="swiper-slide">
          <img src="./images/festival/dalsung.jpg" />
          <h4>
            1년에 한번 100명의 피아노 연주자가 100대의 피아노를 연주하는
            <br />
            역사깊은 큰 이벤트이다.
          </h4>
        </div>
        <div class="swiper-slide">
          <img src="./images/festival/park.jpg" />
          <h4>
            1년에 한번 100명의 피아노 연주자가 100대의 피아노를 연주하는
            <br />
            역사깊은 큰 이벤트이다.
          </h4>
        </div>
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>

  <!-- about -->
  <section class="about">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
      <div class="swiper-wrapper">
        <div class="swiper-slide" id="swiper_about_bg1">

          <div class="textBox contents">
            <h1>피아노</h1>
            <h3>
              사문진은 대한민국 최초로 피아노를 <br />
              운반해 온 장소이다.
            </h3>
            <p>
              1900년 03월 26일 리차드 사이드보텀(Richard H. Sidebotham)이
              <br />
              대한민국 최초로 사문진을 통해서 피아노를 운반해왔습니다. <br />
              피아노의 주인은 동산의료원의 창립자 우드브리지 존슨(Woodbridge
              O. Johnson)의 <br />
              아내인 에디드 파커(Edith Parker)입니다.
            </p>

          </div>
        </div>
        <div class="swiper-slide" id="swiper_about_bg2">
          <!-- <img class="slider_bg" src="/images/picnic.jpg" width="100%" /> -->
          <div class="textBox contents">
            <h1>피크닉장</h1>
            <h3>
              사문진 피크닉장은 여러분들에게 <br />
              탁트인 강변뷰를 제공합니다.
            </h3>
            <p>
              푸릇푸릇한 숲 속에 위치한 사문진 피크닉장은 <br />
              시원한 강바람을 맞으며 소중한 사람들과 즐거운 <br />
              추억을 만들어가기 좋은 장소입니다.
            </p>
            <div class="button1">
              <a href="./facility.php"> 자세히보기 </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide" id="swiper_about_bg3">
          <!-- <img class="slider_bg" src="/images/ferry.jpg" width="100%" /> -->
          <div class="textBox contents">
            <h1>유람선</h1>
            <h3>
              사문진에는 중형 유람선 <br />
              '달성호' 운행하고 있습니다.
            </h3>
            <p>
              2014년 10월 3일 개천절, 사문진 나루터에서 72인승 <br />
              유람선 '달성호'의 취항식이 있었습니다. <br />
              운항 구간은 사문진 ▶ 강정보 ▶ 옥포신당 ▶ 사문진이며 <br />
              승선 시간은 약 40분입니다.
            </p>
            <div class="button1">
              <a href="./facility.php"> 자세히보기 </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide" id="swiper_about_bg4">
          <!-- <img class="slider_bg" src="/images/jumak.jpg" width="100%" /> -->
          <div class="textBox contents">
            <h1>주막촌</h1>
            <h3>
              사문진 주막촌은 달성군의 주요 관광지이자<br />
              달성 12경 중 하나입니다.
            </h3>
            <p>
              사문진 주막촌에 방문하시면 조선시대 전국 보부상이 사문진
              나루터로 <br />
              모여들었음을 기억하며 세운 보부상 동상을 확인하실 수 있습니다.
              <br />
              또한, 사문진 주막촌은 여러분들께 다양한 먹을거리를 제공합니다.
            </p>
            <div class="button1">
              <a href="./facility.php"> 자세히보기 </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <h1 class="about_tap">피아노</h1>
        </div>
        <div class="swiper-slide">
          <h1 class="about_tap">피크닉장</h1>
        </div>
        <div class="swiper-slide">
          <h1 class="about_tap">유람선</h1>
        </div>
        <div class="swiper-slide">
          <h1 class="about_tap">주막촌</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- food -->
  <section id="food">
    <div class="foodBox contents">
      <div class="foodText">
        <h1>먹을거리</h1>
        <h2>사문진 주막촌에서 제공하는 먹을거리를 소개합니다.</h2>
      </div>
      <div class="foodInfo">
        <div>
          <div class="your-element" data-tilt data-tilt-max="10" data-tilt-speed="10" data-tilt-perspective="500">
            <img src="./images/food/noodle.jpg" alt="" />
            <img src="./images/food/noodle_m.jpg" alt="" />
          </div>
          <h2>사문진 잔치국수</h2>
          <h5>
            삶은 국수에 계란지단 등 고명을 얹고 멸치장국을 <br />
            부어낸 사문진 주막 대표메뉴로,<br />
            시원한 국물을 맛보실 수 있습니다.
          </h5>
        </div>
        <div>
          <div class="your-element" data-tilt data-tilt-max="10" data-tilt-speed="10" data-tilt-perspective="500">
            <img src="./images/food/gukbob.jpg" alt="" />
            <img src="./images/food/gukbob_m.jpg" alt="" />
          </div>
          <h2>사문진 안주한상</h2>
          <h5>
            낙동강을 감상하며 칼칼한 소고기 국밥과 따뜻한<br />
            부추전을 안주로 사문진 막걸리 한 잔...
          </h5>
        </div>
        <div>
          <div class="your-element" data-tilt data-tilt-max="10" data-tilt-speed="10" data-tilt-perspective="500">
            <img src="./images/food/cafe.jpg" alt="" />
            <img src="./images/food/cafe_m.jpg" alt="" />
          </div>
          <h2>사문진 주막 카페</h2>
          <h5>
            엄선된 로스팅 원두로 만든 스페셜 커피 등 다양한 음료를<br />
            아름다운 정원에서 즐기실 수 있습니다.
          </h5>
        </div>
      </div>
    </div>
    <div class="blackBox">22</div>
  </section>

  <section id="info" class="contents">
    <h1>시설안내</h1>
    <div class="infoimgbox">
      <img src="./images/map/map.png" />
    </div>
  </section>

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
  <script src="./js/pallox.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./js/swiper_samoons.js"></script>
  <script>
    "use strict";
    const content = "사문진에 오신걸 환영합니다."
    const text = document.querySelector(".text")
    let index = 0;

    function sleep(delay) {
      const start = new Date().getTime();
      while (new Date().getTime() < start + delay);
    }

    function typing() {
      text.textContent += content[index++];
      if (index > content.length) {
        text.textContent = ""
        index = 0;
        // sleep(3000);
      }
    }
    setInterval(typing, 200)
  </script>
</body>

</html>