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
<html>

<head>
	<meta charset="utf-8">
	<title>PHP 프로그래밍 입문</title>

	<link rel="stylesheet" href="./css/heaader.css" />
	<link rel="stylesheet" href="./css/footer.css" />
	<link rel="stylesheet" href="./css/toggle.css" />
	<link rel="stylesheet" type="text/css" href="./css/common.css" />
	<link rel="stylesheet" type="text/css" href="./css/admin.css" />
	<!-- 폰트어썸 CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


</head>

<body>
	<header>
		<!-- header -->

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
					<a class="menu-trigger" href="">
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
	<section>
		<div id="admin_box">
			<h3 id="member_title">
				관리자 모드 > 회원 관리
			</h3>
			<ul id="member_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">레벨</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
					<span class="col7">수정</span>
					<span class="col8">삭제</span>
				</li>
				<?php
				$con = mysqli_connect("localhost", "user1", "12345", "sample");
				$sql = "select * from members order by num desc";
				$result = mysqli_query($con, $sql);
				$total_record = mysqli_num_rows($result); // 전체 회원 수

				$number = $total_record;

				while ($row = mysqli_fetch_array($result)) {
					$num         = $row["num"];
					$id          = $row["id"];
					$name        = $row["name"];
					$level       = $row["level"];
					$point       = $row["point"];
					$regist_day  = $row["regist_day"];
				?>

					<li>
						<form method="post" action="admin_member_update.php?num=<?= $num ?>">
							<span class="col1"><?= $number ?></span>
							<span class="col2"><?= $id ?></a></span>
							<span class="col3"><?= $name ?></span>
							<span class="col4"><input type="text" name="level" value="<?= $level ?>"></span>
							<span class="col5"><input type="text" name="point" value="<?= $point ?>"></span>
							<span class="col6"><?= $regist_day ?></span>
							<span class="col7"><button type="submit">수정</button></span>
							<span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?= $num ?>'">삭제</button></span>
						</form>
					</li>

				<?php
					$number--;
				}
				?>
			</ul>
			<h3 id="member_title">
				관리자 모드 > 게시판 관리
			</h3>
			<ul id="board_list">
				<li class="title">
					<span class="col1">선택</span>
					<span class="col2">번호</span>
					<span class="col3">이름</span>
					<span class="col4">제목</span>
					<span class="col5">첨부파일명</span>
					<span class="col6">작성일</span>
				</li>
				<form method="post" action="admin_board_delete.php">
					<?php
					$sql = "select * from board order by num desc";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result); // 전체 글의 수

					$number = $total_record;

					while ($row = mysqli_fetch_array($result)) {
						$num         = $row["num"];
						$name        = $row["name"];
						$subject     = $row["subject"];
						$file_name   = $row["file_name"];
						$regist_day  = $row["regist_day"];
						$regist_day  = substr($regist_day, 0, 10)
					?>
						<li>
							<span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
							<span class="col2"><?= $number ?></span>
							<span class="col3"><?= $name ?></span>
							<span class="col4"><?= $subject ?></span>
							<span class="col5"><?= $file_name ?></span>
							<span class="col6"><?= $regist_day ?></span>
						</li>
					<?php
						$number--;
					}
					mysqli_close($con);
					?>
					<button type="submit">선택된 글 삭제</button>
				</form>
			</ul>
		</div> <!-- admin_box -->
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