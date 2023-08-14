<?php

class SocialLogin
{
    //프로퍼티

    //개발자용
    //* api 키

    private static $kakaoApi = "3b53e73f526973fc2338b803707932d9";
    private static $googleApi = "349094743844-h1ep0r3bgkjocu41ghqbnmd9ir5nqc34.apps.googleusercontent.com";

    private static $naverApi = "gVWlX3_CO1_zi8qfIyTQ";

    //* 시크릿 키
    private static $googleClientSecret = "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";
    private static $naverClientSecret = "3wuBi0adO2";
    //* 접속 url

    private static $redirectUrl = "https://port-9000-test1-3prof2lll098hrb.sel4.cloudtype.app/social_login.php";


    //각 플랫폼
    static public function socialLoginUrl($loginState)
    {

        switch ($loginState) {
            case "google":
                return 'https://accounts.google.com/o/oauth2/v2/auth?client_id=' . self::$googleApi . '&redirect_uri=' . self::$redirectUrl . '&response_type=code&state=google&scope=https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile&access_type=offline&prompt=consent';
            case "kakao":
                return 'https://kauth.kakao.com/oauth/authorize?client_id=' . self::$kakaoApi . '&redirect_uri=' . self::$redirectUrl . '&response_type=code&state=kakao&prompt=login';
            case "naver":
                return 'https://nid.naver.com/oauth2.0/authorize?client_id=' . self::$naverApi . '&redirect_uri=' . self::$redirectUrl . '&response_type=code&state=naver';

            default:
                return "";
        }
    }

    //외부에서 key를 호출하기 위한 getter 함수
    static public function getKakaoApi()
    {
        return self::$kakaoApi;
    }

    static public function getGoogleApi()
    {
        return self::$googleApi;
    }

    static public function getNaverApi()
    {
        return self::$naverApi;
    }

    static public function getRedirectUrl()
    {
        return self::$redirectUrl;
    }

    static public function getGoogleClientSecret()
    {
        return self::$googleClientSecret;
    }

    static public function getNaverClientSecret()
    {
        return self::$naverClientSecret;
    }
}


// $mysqlConnect = mysqli_connect("localhost", "user1", "12345", "sample");
$mysqlConnect = mysqli_connect("svc.sel4.cloudtype.app", "test", "1234", "samunjin", "31023");
