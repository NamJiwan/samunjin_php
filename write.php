<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/heaader.css" />
    <link rel="stylesheet" href="/css/write.css" />
    <link rel="stylesheet" href="/css/footer.css" />
    <link rel="stylesheet" href="/css/toggle.css" />
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
    <header>
      <section class="contents">
        <nav>
          <div class="logo">
            <a href="index.php">
              <img src="/images/main/logo.png" alt="logo" />
            </a>
          </div>
          <div class="nb">
            <ul class="gnb" th:if="${isLoggedIn}">
              <li><a href="/logout">Logout</a></li>
              <li><a href="/mypage">My page</a></li>
            </ul>
            <ul class="gnb" th:unless="${isLoggedIn}">
              <li><a href="/login">Login</a></li>
              <li><a href="/signup">Sign up</a></li>
            </ul>
            <ul class="lnb">
              <li><a href="/about.php">소개</a></li>
              <li><a href="/facility.php">시설</a></li>
              <li><a href="/map.php">오시는 길</a></li>
              <li><a href="/reserve.php">예약</a></li>
              <li><a href="/gallery.php">갤러리</a></li>
              <li><a href="/community.php">커뮤니티</a></li>
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
          <li><a href="/about.php">소개</a></li>
          <li><a href="/facility.php">시설</a></li>
          <li><a href="/map.php">오시는 길</a></li>
          <li><a href="/reserve.php">예약</a></li>
          <li><a href="/gallery.php">갤러리</a></li>
          <li><a href="/community.php">커뮤니티</a></li>
        </ul>
        <ul class="gnb" th:if="${isLoggedIn}">
          <li><a href="/logout">Logout</a></li>
          <li><a href="/mypage">My page</a></li>
        </ul>
        <ul class="gnb" th:unless="${isLoggedIn}">
          <li><a href="/login">Login</a></li>
          <li><a href="/signup">Sign up</a></li>
        </ul>
      </div>
    </header>
    <section id="darkImg">
      <div>
        <img src="/images/sub_community/community_main.jpg" alt="" />
      </div>
      <h1>Community</h1>
    </section>
    <section class="contents">
      <div class="title brownline">
        <h2>title</h2>
        <h4>writer</h4>
        <p class="date">2077-08-08</p>
      </div>
      <div class="sodyd">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores quo
        alias error corporis rem placeat nam pariatur aliquid ex, deserunt quam
        et mollitia doloremque sed facilis fuga id possimus. Doloribus. Lorem
        ipsum dolor sit amet consectetur adipisicing elit. Dicta dignissimos
        rerum cupiditate distinctio. Explicabo ea praesentium consequuntur
        voluptatem neque rerum nam dolor. Adipisci blanditiis nemo vel ipsa vero
        porro a! Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Repudiandae quo consequuntur modi magni, natus voluptates laborum fugit
        explicabo aliquid incidunt ad id recusandae animi repellendus et cum
        maxime consectetur eaque. Lorem ipsum dolor, sit amet consectetur
        adipisicing elit. Odit molestiae doloremque obcaecati sint quidem libero
        reprehenderit, est minus laudantium dolores commodi non perferendis
        labore at excepturi earum quas? Reprehenderit, ducimus!
      </div>
      <div class="coments brownline">
        <img src="/images/.png" alt="" />
        <p>댓글+댓글 수</p>
      </div>
      <h2>댓글</h2>
      <div class="eotrmf brownline">
        <h4>writer</h4>
        <h5>댓글 내용</h5>
        <p class="date">2077.08.08</p>
      </div>
      <div class="eotrmf brownline">
        <h4>write</h4>
        <h5>댓글 내용</h5>
        <p class="date">2077.08.08</p>
      </div>
      <div class="eotrmf brownline">
        <h4>writer</h4>
        <h5>댓글 내용</h5>
        <p class="date">2077.08.08</p>
      </div>
      <div class="writehere">
        <input
          type="text"
          class="textbox"
          placeholder="댓글을 남겨보세요"
          onfocus="this.placeholder = ''"
        />
        <button class="eotrmfqjxms">등록하기</button>
      </div>
    </section>

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
          <img src="/images/logo_white.png" alt="logo" />
        </div>
      </div>
    </footer>

    <script src="/js/toggle.js"></script>
  </body>
</html>