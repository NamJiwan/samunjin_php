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
  <link rel="stylesheet" href="./css/gallery.css" />
  <!-- 캘린더 CSS -->
  <link rel="stylesheet" href="css/pignose.calendar.min.css" />
  <link rel="stylesheet" href="css/style_calender_box.css" />
  <!-- 폰트어썸 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- 캘린더 -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="js/pignose.calendar.full.min.js"></script>
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
              <li><a href="./signup.php">Sign up</a></li>
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
          <li><a href="./signup.php">Sign up</a></li>
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

  <!-- 메인이미지 -->
  <section id="darkImg">
    <div>
      <img src="./images/sub_reservation/reservation_main.jpg" alt="" />
    </div>
    <h1>GALLERY</h1>
  </section>

  <!-- 탭 메뉴 -->
  <section class="contents_bg">
    <div id="class_wrapper" class="contents">
      <div class="wrapper" id="class_tab">
        <input id="class_1" type="radio" name="class_tap" checked="checked" />
        <input id="class_2" type="radio" name="class_tap" />

        <section class="class_buttons contents">
          <label for="class_1">
            <h1>VR</h1>
          </label>
          <label for="class_2">
            <h1>갤러리</h1>
          </label>
        </section>
        <!-- 페이지 -->
        <div class="class_tab_item">
          <!-- VR -->
          <div class="brownline">
            <h2>VR</h2>
          </div>
          <div class="panaloma"></div>
        </div>
        <div class="class_tab_item">
          <!-- 사진 -->
          <div class="brownline">
            <h2>갤러리</h2>
          </div>
          <div id="gallery" style="display: none">
            <!-- 이곳에 사진들이 동적으로 추가될 예정입니다. -->
          </div>
          <div class="buttonbox">
            <button onclick="showItems()">더 보기</button>
          </div>
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
  <script src="./js/gallery.js"></script>

  <script src="./js/three.min.js" defer></script>
  <script src="./js/panolens.min.js" defer></script>
  <script>
    window.addEventListener("DOMContentLoaded", (e) => {
      const panoImage = document.querySelector(".panaloma");
      const mainImage = "images/test1.jpeg";

      const panorama = new PANOLENS.ImagePanorama(mainImage);
      const viewer = new PANOLENS.Viewer({
        container: panoImage,
        autoRotate: true,
      });
      viewer.add(panorama);
    });
  </script>
</body>

</html>