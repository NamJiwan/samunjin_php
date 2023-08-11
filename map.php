<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/heaader.css" />
    <link rel="stylesheet" href="./css/map.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/toggle.css" />
    <!-- 폰트어썸 CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
            <ul class="gnb" th:if="${isLoggedIn}">
              <li><a href="./logout">Logout</a></li>
              <li><a href="./mypage">My page</a></li>
            </ul>
            <ul class="gnb" th:unless="${isLoggedIn}">
              <li><a href="./login">Login</a></li>
              <li><a href="./signup">Sign up</a></li>
            </ul>
            <ul class="lnb">
              <li><a href="./about.php">소개</a></li>
              <li><a href="./facility.php">시설</a></li>
              <li>오시는 길</li>
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
        <a href="index.php"><i class="fa-solid fa-house"></i></a>
        <ul class="lnb">
          <li><a href="./about.php">소개</a></li>
          <li><a href="./facility.php">시설</a></li>
          <li>오시는 길</li>
          <li><a href="./reserve.php">예약</a></li>
          <li><a href="./gallery.php">갤러리</a></li>
          <li><a href="./community.php">커뮤니티</a></li>
        </ul>
        <ul class="gnb" th:if="${isLoggedIn}">
          <li><a href="./logout">Logout</a></li>
          <li><a href="./mypage">My page</a></li>
        </ul>
        <ul class="gnb" th:unless="${isLoggedIn}">
          <li><a href="./login">Login</a></li>
          <li><a href="./signup">Sign up</a></li>
        </ul>
      </div>
    </header>

    <section id="darkImg">
      <div>
        <img src="./images/sub_access/access_main.jpg" alt="" />
      </div>
      <h1>Access</h1>
    </section>

    <!-- 오시는길 -->
    <section class="contents">
      <div class="brownline"><h1>오시는 길</h1></div>
      <div class="textbox1">
        <p>
          대구의 대표 관광지 사문진을 편히 찾아오실 수 있도록 안내 드립니다.
        </p>
        <p>대구광역시 달성군 화원읍 성산리 318-1</p>
      </div>
      <div class="map" id="map"></div>
      <div class="textbox2">
        <h4><i class="fa-solid fa-bus"></i>PUBLIC</h4>
        <p>
          지하철1호선 화원역 (1번출구) → 버스환승(650번) → 삼주아파트 →
          화원유원지(사문진 주막촌)입구 하차
        </p>
        <p>
          지하철1호선 화원역 (1번출구) → 버스환승(달서3번) → 삼주아파트 →
          화원유원지(사문진 주막촌)하차(버스종점)
        </p>
        <h4><i class="fa-solid fa-car"></i>CAR</h4>
        <p>
          고속도로출구 → 화원IC 대구방향(좌회전) → 화원고등학교 →
          화원삼거리(좌회전) → 삼주아파트 → 화원유원지(사문진 주막촌)
        </p>
        <p>
          대구방향(월배·대곡) → 유천네거리(대곡역) → 화원읍사무소(화원역) →
          화원삼거리(우회전) → 삼주아파트 → 화원유원지(사문진주막촌)
        </p>
        <p>
          달성군청방향 → 달성군청 → 옥포면사무소 → 화원고등학교 →
          화원삼거리(우회전) → 삼주아파트 → 화원유원지(사문진 주막촌)
        </p>
      </div>
    </section>

    <!-- 푸터 -->
    <footer>
      <div id="footerBox" class="contents">
        <div class="footertextBox">
          <div>
            <span>사문진 소개</span><span>|</span> <span>이용안내</span
            ><span>|</span> <span>개인정보처리방침</span><span>|</span>
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
    <!-- 토글 스크립트 -->
    <script src="/js/toggle.js"></script>

    <!-- 지도api -->
    <script type="text/javaScript">
      function initMap() {
           const map = new google.maps.Map(document.getElementById("map"), {
               zoom: 16,
               center: { lat: 35.81097514445517, lng:  128.47713134067183 }, // 지도의 중심 좌표
           });

           // 마커 정보
           var locations = [
                  {testId: 'location01', lat: 35.81097514445517, lng:  128.47713134067183},

           ];

           // 마커 생성
           for (var i = 0; i < locations.length; i++) {
               var mapIcon = new google.maps.MarkerImage('images/map_google_marker.png'); // 이미지 파일 경로를 설정해주면 다른 마커아이콘을 쓸 수 있음!
               var marker = new google.maps.Marker({
                     map: map,
                     position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                     icon: mapIcon
                 });
               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                   return function() {
                       // 마커 클릭시 실행할 이벤트를 설정해줄 수 있다
                      alert(locations[i].testId);
                   }
               })(marker, i));
           }
      }
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeMQw608rSIq4KlUbj9R8E9NHO7reFMTo&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>
