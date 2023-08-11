<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/heaader.css" />
    <link rel="stylesheet" href="./css/community.css" />
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
              <li><a href="./map.php">오시는 길</a></li>
              <li><a href="./reserve.php">예약</a></li>
              <li><a href="./gallery.php">갤러리</a></li>
              <li>커뮤니티</li>
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
        <a href="/index.php"><i class="fa-solid fa-house"></i></a>
        <ul class="lnb">
          <li><a href="./about.php">소개</a></li>
          <li><a href="./facility.php">시설</a></li>
          <li><a href="./map.php">오시는 길</a></li>
          <li><a href="./reserve.php">예약</a></li>
          <li><a href="./gallery.php">갤러리</a></li>
          <li>커뮤니티</li>
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
        <img src="./images/sub_community/community_main.jpg" alt="" />
      </div>
      <h1>community</h1>
    </section>
    <section class="contents">
      <h1>사문진 게시판</h1>
      <div>
        <form>
          <fieldset>
            <table>
              <thead class="brownline">
                <tr>
                  <th class="what">No.</th>
                  <th class="what">제목</th>
                  <th class="what">작성자</th>
                  <th class="what">등록일</th>
                </tr>
              </thead>
              <tbody>
                <tr class="master">
                  <td>공지사항</td>
                  <td><a href="./write.php">2023 여름 원신 페스티벌</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                <tr class="master">
                  <td>2</td>
                  <td><a href="./write.php">온 세상이 원신이다.</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                <tr class="master">
                  <td>3</td>
                  <td><a href="./write.php">온 세상이 원신이다.</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                <tr class="master">
                  <td>4</td>
                  <td><a href="./write.php">온 세상이 원신이다.</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                <tr class="space">
                  <td>4</td>
                  <td><a href="./write.php">온 세상이 원신이다.</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                <tr class="space">
                  <td>4</td>
                  <td><a href="./write.php">온 세상이 원신이다.</a></td>
                  <td>호요버스</td>
                  <td>2023.07.25</td>
                </tr>
                </var
                >
              </tbody>
            </table>
          </fieldset>
        </form>
        <div class="buttonbox">
          <button>
            <a href="./community-write.php">
              <img
                src="./images/sub_community/write_btn.png"
                alt=""
                width="120px"
              />
            </a>
          </button>
        </div>
        <ul class="pagenation">
          <img src="" alt="" />
          <i class="fa-solid fa-chevron-left"></i>
          <li>1</li>
          <li>2</li>
          <li>3</li>
          <li>4</li>
          <li>5</li>
          <i class="fa-solid fa-chevron-right"></i>
          <img src="" alt="" />
        </ul>
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

    <script src="./js/toggle.js"></script>
  </body>
</html>
