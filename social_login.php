<?php

//현재 폴더 위치를 찾아줌 dirname(__FILE__).
include_once dirname(__FILE__) . "/social_login_config.php";


//a태그에서 response code 받아오기
$code = $_GET['code'];
//소셜로그인 구분자 받아오기 ('kakao','naver','google'....)
$state = $_GET['state'];
//인가받은 code를 통해 accessToken과 refreshToken 모델(인스턴스) 받기
$model = getTokenModel($code, $state);
//echo $model->toString();
//변수에 토큰값을 넣어줌
$accessToken = $model->getAccessToken();
$profileModel = getProfile($accessToken, $state);

//$mysqlConnect = mysqli_connect("localhost", "user1", "12345", "sample"); con에 저장
$con = $mysqlConnect;

//DB에 회원정보가 있을때
//DB에 이메일이 있는지 검색
$sql = "select * from members where email = '$profileModel->email'";
$result = mysqli_query($con, $sql);
//결과값에 대한 카운트 수
$num_record = mysqli_num_rows($result);
// print $num_record;
//DB에 데이터가 존재할때
if ($num_record != 0) {

    $row = mysqli_fetch_array($result);

    //가입된 계정과 플랫폼이 일치한다면
    if ($row['login_div'] == $state) {

        session_start();
        $_SESSION["userid"] = $row['id'];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row['level'];
        $_SESSION["userpoint"] = $row['point'];
        $_SESSION["state"] = $state;
        $_SESSION["accessToken"] = $accessToken;

        echo ("
            <script>
            location.href = 'index.php';
            </script>
        ");
    } else {
        //플랫폼이 일치하지 않는다면
        $divValue = array("kakao" => "카카오", "naver" => "네이버", "google" => "구글");
        echo ("
            <script>
            alert('가입된 이메일이 존재합니다.(" . $divValue[$row['login_div']] . ")');
            location.href = 'index.php';
            </script>
        ");
    }
} else {

    //날짜를 받아서 저장 DB 저장
    // DB에 회원정보가 없을때
    $regist_day = date("Y-m-d (H:i)");
    $sql = "insert into members(id, pass, name, email, regist_day, level, point, login_div)";
    $sql .= "values('$profileModel->email','$profileModel->uid','$profileModel->nickname','$profileModel->email','$regist_day',9,0,'$state')";
    mysqli_query($con, $sql);
    mysqli_close($con);

    //세션 저장
    session_start();
    $_SESSION["userid"] = $row["$profileModel->email"];
    $_SESSION["username"] = $row["$profileModel->nickname"];
    $_SESSION["userlevel"] = "9";
    $_SESSION["userpoint"] = "0";
    $_SESSION["state"] = $state;
    $_SESSION["accessToken"] = $accessToken;


    //홈화면 이동
    echo ("
            <script>
            location.href = 'index.php';
            </script>
        ");
}
