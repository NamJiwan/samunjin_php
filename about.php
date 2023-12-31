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
  <title>사문진 소개</title>
  <link rel="stylesheet" href="./css/heaader.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/toggle.css" />
  <link rel="stylesheet" href="./css/about.css" />
  <!-- 폰트어썸 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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

  <section id="darkImg">
    <div>
      <img src="./images/sub_about/about_main.jpg" alt="" />
    </div>
    <h1>About</h1>
  </section>
  <section class="contents">
    <div class="brownline">
      <h1>사문진 소개</h1>
    </div>
    <div class="bigbigbox ">
      <div class="bigbox">
        <div class="imgbox mimg">
          <img src="./images/sub_about/about_tradition.jpg" alt="" />
        </div>
        <div class="textbox">
          <h4 class="one">01</h4>
          <h2>전통</h2>
          <p>
            사문진은 조선시대 전기 낙동강과 금호강을 연결하는 교통의
            요지이자<br />
            대구로 통하는 관문 역할을 수행하는 나루였습니다.<br />
            낙동강은 일본 무역상들은 물론 강원도, 충청도, 경상도 상인들의
            대표적<br />
            물품 수송로이기도 하였는데 낙동강과 금호강이 합류하는 현재
            대구광역시<br />
            달성군 화원읍 성산1리와 경상북도 고령군 다산면 호촌2리를 잇는
            사문진이<br />
            가장 번창해 1486년(성종 17년)까지 대일 무역의 중심지가 되었습니다.
          </p>
        </div>
        <div class="imgbox pcimg">
          <img src="./images//sub_about/about_tradition.jpg" alt="" />
        </div>
      </div>

      <div class="bigbox">
        <div class="imgbox">
          <img src="./images/sub_about/about_piano.jpg" alt="" />
        </div>
        <div class="textbox ptextbox">
          <h4 class="two">02</h4>
          <h2>피아노</h2>
          <p>
            사문진은 대한민국 최초로 피아노를 운반해 온 것으로 유명합니다.<br />
            1900년 3월 26일 미국의 선교사였던 리차드 사이드보텀<br />
            (Richard H. Sidebotham, 1874~1908)이 이른 아침 투박하게 포장한<br />
            피아노 1대를 인부 30여 명이 소달구지에 옮겨지고 있었는데
            사람들은<br />
            나무토막 안에 죽은 귀신이 들어 있어 괴상한 소리를 낸다며
            '귀신통'이라고<br />
            부르며 신기해 했다고 합니다.
          </p>
        </div>
      </div>
      <div class="bigbox">
        <div class="imgbox mimg">
          <img src="./images/sub_about/about_ferry.jpg" alt="" />
        </div>
        <div class="textbox">
          <h4 class="three">03</h4>
          <h2>유람선</h2>
          <p>
            2010년 이 후 입구에 무분별하게 있던 식당가가 철거되고 그 자리에<br />
            화원나루공원을 비롯하여 옛 사문진 주막을 복원한 사문진 주막촌과<br />
            '달성호'라는 중형 유람선을 운항하는 사문진 선착장이 들어서면서<br />
            다시 활기를 띠고 있습니다.<br />
            근처 화원체육공원을 비롯해 여름이면 행락객들이 많고, 일대에<br />
            피아노박물관을 세우는 것을 추진 중입니다.
          </p>
        </div>
        <div class="imgbox pcimg">
          <img src="./images/sub_about/about_ferry.jpg" alt="" />
        </div>
      </div>
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
</body>

</html>