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
	<link rel="stylesheet" type="text/css" href="./css/common.css">
	<link rel="stylesheet" type="text/css" href="./css/member.css">
	<link rel="stylesheet" href="./css/heaader.css" />
	<link rel="stylesheet" href="./css/footer.css" />
	<link rel="stylesheet" href="./css/toggle.css" />
	<!-- 폰트어썸 CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script type="text/javascript" src="./js/member_modify.js"></script>
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
	<?php
	//$con = mysqli_connect("localhost", "user1", "12345", "sample");    
	$con = mysqli_connect("svc.sel4.cloudtype.app", "test", "1234", "samunjin", 31023);
	$sql    = "select * from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result);

	$pass = $row["pass"];
	$name = $row["name"];

	$email = explode("@", $row["email"]);
	$email1 = $email[0];
	$email2 = $email[1];

	mysqli_close($con);
	?>
	<section>

		<div id="main_content">
			<div id="join_box">
				<form name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>">
					<h2>회원 정보수정</h2>
					<div class="form id">
						<div class="col1">아이디</div>
						<div class="col2">
							<?= $userid ?>
						</div>
					</div>
					<div class="clear"></div>

					<div class="form">
						<div class="col1">비밀번호</div>
						<div class="col2">
							<input type="password" name="pass" value="<?= $pass ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="form">
						<div class="col1">비밀번호 확인</div>
						<div class="col2">
							<input type="password" name="pass_confirm" value="<?= $pass ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="form">
						<div class="col1">이름</div>
						<div class="col2">
							<input type="text" name="name" value="<?= $name ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="form email">
						<div class="col1">이메일</div>
						<div class="col2">
							<input type="text" name="email1" value="<?= $email1 ?>">@<input type="text" name="email2" value="<?= $email2 ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="bottom_line"> </div>
					<div class="buttons">
						<img style="cursor:pointer" src="./images/cms/button_save.gif" onclick="check_input()">&nbsp;
						<img id="reset_button" style="cursor:pointer" src="./images/cms/button_reset.gif" onclick="reset_form()">
					</div>
				</form>
			</div> <!-- join_box -->
		</div> <!-- main_content -->
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