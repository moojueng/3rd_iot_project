<!DOCTYPE html>

<html lang="ko">
    <?php
        # 모바일 페이지 처리
        $mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
        $ref = "/(imgkr.duckdns.org)/";
        # 접근 경로 확인(주소 붙여넣기 및 올바르지 않은 경로로 접근시 예외처리)
        if(!preg_match($ref, $_SERVER["HTTP_REFERER"])) {
            if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
                echo '<head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>관리페이지</title>
                <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
                <script src="https://code.jquery.com/jquery-latest.min.js"></script>
                <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
                </head>
                <body>
                <div data-role="page" id="error" style="text-align: center">
                <div data-role="header">
                <h1>403 Forbidden</h1>
                </div>
                <div data-role="content">
                <p>올바른 접근이 아닙니다.</p>
                <button type="button" id="button" class="home" onClick="location.href=\'index\'">돌아가기</button>
                </div>
                </div>
                </body>
                </html>';
            } else {
                echo '<head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>관리페이지</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <style type="text/css"> 
                    a:link { color: gray; text-decoration: none;}
                    a:visited { color: gray; text-decoration: none;}
                    a:hover { color: gray; text-decoration: none;}

                    body {
                        margin:0;
                        color:#edf3ff;
                        background:#c8c8c8;
                        background:url(image/wallpaper.jpg) fixed;
                        background-size: cover;
                        font:600 16px/18px "Open Sans",sans-serif;
                    }
                    :after,:before{box-sizing:border-box}
                    .clearfix:after,.clearfix:before{content:"";display:table}
                    .clearfix:after{clear:both;display:block}
                    a{color:inherit;text-decoration:none}

                    .login-wrap{
                        width: 100%;
                        margin:auto;
                        max-width:510px;
                        min-height:510px;
                        position:relative;
                        background:url(image/login-frm.jpg) no-repeat center;
                        background-size: cover;
                        box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
                    }
                    .login-html{
                        width:100%;
                        height:100%;
                        position:absolute;
                        padding:90px 70px 50px 70px;
                        background:rgba(0,0,0,0.5);
                    }
                    .login-html2{
                        width:100%;
                        height:100%;
                        position:absolute;
                        padding:90px 70px 50px 70px;
                        background:rgba(0,0,0,0.5);
                    }
                    .login-html .sign-in-htm,
                    .login-html .for-pwd-htm{
                        top:0;
                        left:0;
                        right:0;
                        bottom:0;
                        position:absolute;
                        -webkit-transform:rotateY(180deg);
                                transform:rotateY(180deg);
                        -webkit-backface-visibility:hidden;
                                backface-visibility:hidden;
                        -webkit-transition:all .4s linear;
                        transition:all .4s linear;
                    }
                    .login-html .sign-in,
                    .login-html .for-pwd,
                    .login-form .group .check{
                        display:none;
                    }
                    .login-html .tab,
                    .login-form .group .label,
                    .login-form .group .button{
                        text-transform:uppercase;
                    }
                    .login-html .tab{
                        font-size:12px;
                        margin-right:15px;
                        padding-bottom:5px;
                        margin:0 15px 10px 0;
                        display:inline-block;
                        border-bottom:2px solid transparent;
                    }
                    .login-html .sign-in:checked + .tab,
                    .login-html .for-pwd:checked + .tab{
                        color:#fff;
                        border-color:#1161ee;
                    }
                    .login-form{
                        min-height:345px;
                        position:relative;
                        -webkit-perspective:1000px;
                                perspective:1000px;
                        -webkit-transform-style:preserve-3d;
                                transform-style:preserve-3d;
                    }
                    .login-form .group{
                        margin-bottom:15px;
                    }
                    .login-form .group .label,
                    .login-form .group .input,
                    .login-form .group .button{
                        width:100%;
                        color:#fff;
                        display:block;
                    }
                    .login-form .group .input::placeholder{
                        color:#fff;
                    }
                    .login-form .group .input,
                    .login-form .group .button{
                        border:none;
                        padding:15px 20px;
                        border-radius:5px;
                        background:rgba(255,255,255,.1);
                    }
                    .login-form .group .label{
                        color:#aaa;
                        font-size:12px;
                    }
                    .login-form .group .button{
                        background:#1161ee;
                    }
                    .login-form .group label .icon{
                        width:15px;
                        height:15px;
                        border-radius:2px;
                        position:relative;
                        display:inline-block;
                        background:rgba(255,255,255,.1);
                    }
                    .login-form .group label .icon:before,
                    .login-form .group label .icon:after{
                        content:"";
                        width:10px;
                        height:2px;
                        background:#fff;
                        position:absolute;
                        -webkit-transition:all .2s ease-in-out 0s;
                        transition:all .2s ease-in-out 0s;
                    }
                    .login-form .group label .icon:before{
                        left:3px;
                        width:5px;
                        bottom:6px;
                        -webkit-transform:scale(0) rotate(0);
                                transform:scale(0) rotate(0);
                    }
                    .login-form .group label .icon:after{
                        top:6px;
                        right:0;
                        -webkit-transform:scale(0) rotate(0);
                                transform:scale(0) rotate(0);
                    }
                    .login-form .group .check:checked + label{
                        color:#fff;
                    }
                    .login-form .group .check:checked + label .icon{
                        background:#1161ee;
                    }
                    .login-form .group .check:checked + label .icon:before{
                        -webkit-transform:scale(1) rotate(45deg);
                                transform:scale(1) rotate(45deg);
                    }
                    .login-form .group .check:checked + label .icon:after{
                        -webkit-transform:scale(1) rotate(-45deg);
                                transform:scale(1) rotate(-45deg);
                    }
                    .login-html .sign-in:checked + .tab + .for-pwd + .tab + .login-form .sign-in-htm{
                        -webkit-transform:rotate(0);
                                transform:rotate(0);
                    }
                    .login-html .for-pwd:checked + .tab + .login-form .for-pwd-htm{
                        -webkit-transform:rotate(0);
                                transform:rotate(0);
                    }
        
                    .hr{
                        height:2px;
                        margin:60px 0 50px 0;
                        background:rgba(255,255,255,.2);
                    }
                    .foot-lnk{
                        text-align:center;
                    } 
                </style>
                </head>
                <body>
                    <div class="login-wrap" data-role="login-wrap">
                        <div class="login-html">
                            <h4 class="text-center">올바른 접근이 아닙니다.</h4><br>
                            
                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">돌아가기</label>
                            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">이 메세지가 왜 뜨나요?</label>
                            <div class="login-form">
                                <div class="sign-in-htm">
                                    <div class="group">
                                        <button type="button" id="button" class="button" onClick="location.href=\'index\'">돌아가기</button>
                                    </div>
                                </div>
                                <div class="for-pwd-htm">
                                    <p class="text-center">올바르지 않은 경로로 접근시에</p>
                                    <p class="text-center">발생되는 메세지 입니다.</p>
                                    <p class="text-center">정상적인 경로로 인증후 이용해주세요.</p>
                                    <div class="hr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                ';
            } 
            exit;
        }
        
        if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
        #모바일 페이지
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>감지기록</title>
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <style type="text/css"> 
            a:link { color: gray; text-decoration: none;}
            a:visited { color: gray; text-decoration: none;}
            a:hover { color: gray; text-decoration: none;}


            .bigPictureWrapper {
                position: fixed;
                display: none;
                justify-content: center;
                align-items: center;
                top:0%;
                width:100%;
                height:100%;
                background-color: gray; 
                z-index: 100;
                background:rgba(255,255,255,0.5);
            }
            .bigPicture {
                position: relative;
                display: contents;
                justify-content: center;
                align-items: center;
            }
            
            .bigPicture img {
                width: 640px;
                height: 480px;
            }
        </style>
    </head>

    <?php
        # d97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab =admin 
            # b71e3f9398381b230c895510c9269b5392caee1db1f2588c7a930be9e099f5a3 =현우씨 8459
            # 86d1d4f9c4c19f02a0e1caaa29b25fced28c4f71d1b41415b1e15e40153ac0e4 =시로씨 4558
            # 9c8dd327d0f259b6facd68100f664c432101f783d31ac9b78b6e9eaf9fa786b8 =형천씨 1585
            if(strpos('d97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab |
            cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481 | 
            86d1d4f9c4c19f02a0e1caaa29b25fced28c4f71d1b41415b1e15e40153ac0e4 |
            9c8dd327d0f259b6facd68100f664c432101f783d31ac9b78b6e9eaf9fa786b8', $_GET['key']) === false) {

            echo '<body>
            <div data-role="page" id="error" style="text-align: center">
            <div data-role="header">
            <h1>403 Forbidden</h1>
            </div>
            <div data-role="content">
            <p>인증에 실패하였습니다. 다시 시도하여 주세요.</p>
            <button type="button" id="button" class="home" onClick="location.href=\'index\'">돌아가기</button>
            </div>
            </div>
            </body>
            </html>';
            echo exit;
        }
            $join_key = $_GET['key'];
        ?>
    <body>
        <div class='bigPictureWrapper'>
            <div class='bigPicture'>
            </div>
        </div>
        <div data-role="page">
            <div data-role="header">
                <h1><img src = "image/search.png" style="width: 15px; height: 15px;"> 감지기록</h1>
            </div>
            <div data-role="content">
	            <button type="button" onclick="location.href='./admin?key=<?php echo $join_key ?>'"><img src="image/setting.png" style="width: 15px; height: 15px;"> 관리 페이지</button>
	            <!--<a href="http://imgkr.duckdns.org:8585"><button type="button"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</button></a>-->
                <button type="button" onclick="livecam()"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</button>
                <?php
                    //mysql 접속 계정 정보 설정
                    $mysql_host = 'localhost';
                    $mysql_user = 'root';
                    $mysql_password = 'PASSWORD';
                    $mysql_db = 'detect_server';
                    //connetc 설정(host,user,password)
                    $conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
                    //db 연결
                    $dbconn = mysql_select_db($mysql_db,$conn);
                    //charset UTF8
                    mysql_query("set names utf8");

                    $query = "SELECT * FROM maindb";
                    $result = mysql_query($query);
                    $data_rows = mysql_num_rows($result);

                    $query = "UPDATE setting SET log_read_last_count='$data_rows'";
                    $result = mysql_query($query);
                    //echo $rows
                ?>
                <ul data-role="listview" data-filter="true" data-filter-placeholder="데이터베이스에서 <?php echo $data_rows ?>개의 데이터가 검색 되었습니다." data-icon="arrow-d">
                    <li data-role="list-divider">시간 ▶ 감지된 Object<span class="ui-li-count">최근 기록 순으로 정렬됨</span></</li>
                    <?php 
                    //쿼리문 작성
                    $query = "select * from maindb ORDER BY in_time DESC LIMIT 500";
                    //쿼리보내고 결과를 변수에 저장
                    $result = mysql_query($query);
                    while($row = mysql_fetch_array($result)){
                        # echo "번호: ".$row[id]."/ 이름: ".$row[username]."/ 입실기록: ".$row[in_time]."<br/>";
                        $str_count = substr_count($row[username], "|");
                        if($str_count == 0) {
                            $str_username = $row[username];
                        } elseif ($str_count == 1) {
                            $str_username = str_replace("|", "", $row[username]);
                        } elseif($str_count > 1) {
                            $str_username = substr(str_replace("|", ", ", $row[username]),0,-2);
                        }
                        $str_in_time = substr($row[in_time], 0,-7);
                        $images = $row[image_data];
                        #echo "<img src='data:image/jpeg;base64, $temp'>";

                        if (empty($images)) {
                            ?>
                            <li style='padding-left:110px; min-height:0px';><?php echo $str_in_time ?> ▶ <?php echo $str_username ?> <?php echo "<img style='width:100px; height:50px; max-width:none; max-height:none' src='image/noimg.png'>"; ?></li>
                            <?php
                        } else {
                            ?>
                            <li style='padding-left:110px; min-height:0px';><?php echo $str_in_time ?> ▶ <?php echo $str_username ?> <?php echo "<img style='width:100px; height:50px; max-width:none; max-height:none' src='data:image/jpeg;base64, $images'>"; ?></li>
                            <?php
                            #echo $row[username]." / 입실기록 : ".$row[in_time]."<br/>";
                        }
                    }

                    error_reporting(E_ALL);	// error reporting on

                    $ip = "121.139.165.163";	// my localhost ip
                    $port = 8585;			// 26354 my opened port in modem
                    $timeout = 1;			// connection timeout in seconds 

                    if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                        $flask_cam = "OK";

                    } else {
                        $flask_cam = "FAIL";

                    }
                    ?>
                    <script>
                        function livecam(){
                            var temp = "<?php echo $flask_cam ?>"
                            if(temp === "OK") {
                                window.location.href = "http://121.139.165.163:8585";
                            } else {
                                alert('FLASK서버로 부터 응답이 없습니다.\n서버상태를 확인후 페이지를 새로고침 하세요.');
                            }
                        }
                    </script>
                </ul>
            </div>
        </div>
    </body>
    <?php
        } else {
            #데스크톱 페이지
            ?>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>감지기록</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    
                    <style type="text/css"> 
                        a:link { color: gray; text-decoration: none;}
                        a:visited { color: gray; text-decoration: none;}
                        a:hover { color: gray; text-decoration: none;}

                        body {
                            margin:0;
                            background:#c8c8c8;
                            background:url(image/wallpaper.jpg) fixed;
                            background-size: cover;
                        }

                        .bigPictureWrapper {
                            position: fixed;
                            display: none;
                            justify-content: center;
                            align-items: center;
                            top:0%;
                            width:100%;
                            height:100%;
                            background-color: gray; 
                            z-index: 100;
                            background:rgba(255,255,255,0.5);
                        }
                        .bigPicture {
                            position: relative;
                            display: contents;
                            justify-content: center;
                            align-items: center;
                        }
                        
                        .bigPicture img {
                            width: 640px;
                            height: 480px;
                        }

                        #myInput {
                            background-position: 10px 10px;
                            background-repeat: no-repeat;
                            width: 100%;
                            font-size: 16px;
                            padding: 12px 20px 12px 40px;
                            border: 1px solid #ddd;
                            border-radius:5px;
                            margin-bottom: 15px;
                            margin-top: 15px;
                        }

                        #myTable {
                            border-collapse: collapse;
                            width: 100%;
                            border: 1px solid #ddd;
                            font-size: 18px;
                            margin-bottom: 15px;
                        }

                        #myTable tr {
                            background-color: white;
                        }

                        #myTable th, #myTable td {
                            text-align: left;
                            padding: 12px;
                        }

                        #myTable tr {
                            border-bottom: 1px solid #ddd;
                        }

                        #myTable tr.header, #myTable tr:hover {
                            background-color: #f1f1f1;
                        }

                        .preview img {
                            filter: blur(3px);
                            transition: .3s ease-in-out;
                        }

                        .preview img:hover {
                            filter: blur(0);
                        }

                        #circle {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%,-50%);
                            width: 150px;
                            height: 150px;	
                        }

                        .loader {
                            width: calc(100% - 0px);
                            height: calc(100% - 0px);
                            border: 8px solid #162534;
                            border-top: 8px solid #09f;
                            border-radius: 50%;
                            animation: rotate 5s linear infinite;
                        }

                        @keyframes rotate {
                        100% {transform: rotate(360deg);}
                        } 
                    </style>
                    <script>
                        function admin_page_join() {
                            location.href="admin?key=" + password_key.value + "";
                            loader();

                        }
                        function loader() {
                            var circle = $("div.circle");
                            var loader = $("div.loader");
                            var loginhtml = $("div.login-html");
                            var loginhtml2 = $("div.login-html2");
                            loginhtml2.css("display","block");
                            loginhtml.css("display","none");
                            circle.css("display","block");
                            loader.css("display","block");
                        }
                    </script>
                </head>

                <?php
                    # d97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab =admin 
                    # b71e3f9398381b230c895510c9269b5392caee1db1f2588c7a930be9e099f5a3 =현우씨 8459
                    # 86d1d4f9c4c19f02a0e1caaa29b25fced28c4f71d1b41415b1e15e40153ac0e4 =시로씨 4558
                    # 9c8dd327d0f259b6facd68100f664c432101f783d31ac9b78b6e9eaf9fa786b8 =형천씨 1585
                    if(strpos('d97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab |
                    cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481 | 
                    86d1d4f9c4c19f02a0e1caaa29b25fced28c4f71d1b41415b1e15e40153ac0e4 |
                    9c8dd327d0f259b6facd68100f664c432101f783d31ac9b78b6e9eaf9fa786b8', $_GET['key']) === false) {
                        echo '<head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>관리페이지</title>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                        <style type="text/css"> 
                            a:link { color: gray; text-decoration: none;}
                            a:visited { color: gray; text-decoration: none;}
                            a:hover { color: gray; text-decoration: none;}
        
                            body {
                                margin:0;
                                color:#edf3ff;
                                background:#c8c8c8;
                                background:url(image/wallpaper.jpg) fixed;
                                background-size: cover;
                                font:600 16px/18px "Open Sans",sans-serif;
                            }
                            :after,:before{box-sizing:border-box}
                            .clearfix:after,.clearfix:before{content:"";display:table}
                            .clearfix:after{clear:both;display:block}
                            a{color:inherit;text-decoration:none}
        
                            .login-wrap{
                                width: 100%;
                                margin:auto;
                                max-width:510px;
                                min-height:510px;
                                position:relative;
                                background:url(image/login-frm.jpg) no-repeat center;
                                background-size: cover;
                                box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
                            }
                            .login-html{
                                width:100%;
                                height:100%;
                                position:absolute;
                                padding:90px 70px 50px 70px;
                                background:rgba(0,0,0,0.5);
                            }
                            .login-html2{
                                width:100%;
                                height:100%;
                                position:absolute;
                                padding:90px 70px 50px 70px;
                                background:rgba(0,0,0,0.5);
                            }
                            .login-html .sign-in-htm,
                            .login-html .for-pwd-htm{
                                top:0;
                                left:0;
                                right:0;
                                bottom:0;
                                position:absolute;
                                -webkit-transform:rotateY(180deg);
                                        transform:rotateY(180deg);
                                -webkit-backface-visibility:hidden;
                                        backface-visibility:hidden;
                                -webkit-transition:all .4s linear;
                                transition:all .4s linear;
                            }
                            .login-html .sign-in,
                            .login-html .for-pwd,
                            .login-form .group .check{
                                display:none;
                            }
                            .login-html .tab,
                            .login-form .group .label,
                            .login-form .group .button{
                                text-transform:uppercase;
                            }
                            .login-html .tab{
                                font-size:12px;
                                margin-right:15px;
                                padding-bottom:5px;
                                margin:0 15px 10px 0;
                                display:inline-block;
                                border-bottom:2px solid transparent;
                            }
                            .login-html .sign-in:checked + .tab,
                            .login-html .for-pwd:checked + .tab{
                                color:#fff;
                                border-color:#1161ee;
                            }
                            .login-form{
                                min-height:345px;
                                position:relative;
                                -webkit-perspective:1000px;
                                        perspective:1000px;
                                -webkit-transform-style:preserve-3d;
                                        transform-style:preserve-3d;
                            }
                            .login-form .group{
                                margin-bottom:15px;
                            }
                            .login-form .group .label,
                            .login-form .group .input,
                            .login-form .group .button{
                                width:100%;
                                color:#fff;
                                display:block;
                            }
                            .login-form .group .input::placeholder{
                                color:#fff;
                            }
                            .login-form .group .input,
                            .login-form .group .button{
                                border:none;
                                padding:15px 20px;
                                border-radius:5px;
                                background:rgba(255,255,255,.1);
                            }
                            .login-form .group .label{
                                color:#aaa;
                                font-size:12px;
                            }
                            .login-form .group .button{
                                background:#1161ee;
                            }
                            .login-form .group label .icon{
                                width:15px;
                                height:15px;
                                border-radius:2px;
                                position:relative;
                                display:inline-block;
                                background:rgba(255,255,255,.1);
                            }
                            .login-form .group label .icon:before,
                            .login-form .group label .icon:after{
                                content:"";
                                width:10px;
                                height:2px;
                                background:#fff;
                                position:absolute;
                                -webkit-transition:all .2s ease-in-out 0s;
                                transition:all .2s ease-in-out 0s;
                            }
                            .login-form .group label .icon:before{
                                left:3px;
                                width:5px;
                                bottom:6px;
                                -webkit-transform:scale(0) rotate(0);
                                        transform:scale(0) rotate(0);
                            }
                            .login-form .group label .icon:after{
                                top:6px;
                                right:0;
                                -webkit-transform:scale(0) rotate(0);
                                        transform:scale(0) rotate(0);
                            }
                            .login-form .group .check:checked + label{
                                color:#fff;
                            }
                            .login-form .group .check:checked + label .icon{
                                background:#1161ee;
                            }
                            .login-form .group .check:checked + label .icon:before{
                                -webkit-transform:scale(1) rotate(45deg);
                                        transform:scale(1) rotate(45deg);
                            }
                            .login-form .group .check:checked + label .icon:after{
                                -webkit-transform:scale(1) rotate(-45deg);
                                        transform:scale(1) rotate(-45deg);
                            }
                            .login-html .sign-in:checked + .tab + .for-pwd + .tab + .login-form .sign-in-htm{
                                -webkit-transform:rotate(0);
                                        transform:rotate(0);
                            }
                            .login-html .for-pwd:checked + .tab + .login-form .for-pwd-htm{
                                -webkit-transform:rotate(0);
                                        transform:rotate(0);
                            }
                
                            .hr{
                                height:2px;
                                margin:60px 0 50px 0;
                                background:rgba(255,255,255,.2);
                            }
                            .foot-lnk{
                                text-align:center;
                            } 
                        </style>
                        </head>
                        <body>
                            <div class="login-wrap" data-role="login-wrap">
                                <div class="login-html">
                                    <h4 class="text-center">인증에 실패하였습니다.</h4>
                                    <h4 class="text-center">다시 시도하여 주세요.</h4><br>
                                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">돌아가기</label>
                                    <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">이 메세지가 왜 뜨나요?</label>
                                    <div class="login-form">
                                        <div class="sign-in-htm">
                                            <div class="group">
                                                <button type="button" id="button" class="button" onClick="location.href=\'index\'">돌아가기</button>
                                            </div>
                                        </div>
                                        <div class="for-pwd-htm">
                                            <p class="text-center">인증코드가 맞지 않아 발생된 문제입니다.</p>
                                            <p class="text-center">인증코드를 다시한번 확인후 시도하세요.</p>
                                            <div class="hr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </html>';
                        echo exit;
                    }
                        $join_key = $_GET['key'];
                    ?>
                <body>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#"><img src = "image/search.png" style="width: 20px; height: 20px;"> 감지기록</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" onclick="location.href='./admin?key=<?php echo $join_key ?>'; loader();">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="live_cam">
                                    <a class="nav-link" href="#" onclick="livecam()"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                <a class="nav-link" href="#" onclick="location.href='./index'"><img src="image/logout.png" style="width: 15px; height: 15px;"> 로그아웃</a>
                                </li>
                            </ul>
                            <!-- 네비 메뉴 드롭 다운및 검색 사용안함
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                            </ul>
                            
                            <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        -->
                        </div>
                    </nav>

                    <div class="alert alert-warning alert-dismissible fade show" data-role="alert" style='display:none;'>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>경고:</strong> 일부 서버가 응답하지 않으므로 정상적으로 동작하지 않을 수 있습니다.
                        </div>
                    </div>



                    <div class='bigPictureWrapper'>
                        <div class='bigPicture'>
                        </div>
                    </div>
                    <div data-role="page">
                        <div class="container">
                            <?php
                                //mysql 접속 계정 정보 설정
                                $mysql_host = 'localhost';
                                $mysql_user = 'root';
                                $mysql_password = 'PASSWORD';
                                $mysql_db = 'detect_server';
                                //connetc 설정(host,user,password)
                                $conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
                                //db 연결
                                $dbconn = mysql_select_db($mysql_db,$conn);
                                //charset UTF8
                                mysql_query("set names utf8");

                                $query = "SELECT * FROM maindb";
                                $result = mysql_query($query);
                                $data_rows = mysql_num_rows($result);

                                $query = "UPDATE setting SET log_read_last_count='$data_rows'";
                                $result = mysql_query($query);
                                    //echo $rows
                            ?>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="데이터베이스에서 <?php echo $data_rows ?>개의 데이터가 검색 되었습니다. (최근 500개의 결과만 표시됩니다)" title="Type in a name">
                            <table id="myTable">
                                <tr class="header">
                                    <th style="width:10%;">이미지</th>
                                    <th style="width:40%;">감지시간</th>
                                    <th style="width:35%;">감지된 사람</th>
                                    <th style="width:15%;">일치 확률</th>
                                </tr>

                                <?php 
                                //쿼리문 작성
                                $query = "select * from maindb ORDER BY in_time DESC LIMIT 500";
                                //쿼리보내고 결과를 변수에 저장
                                $result = mysql_query($query);
                                while($row = mysql_fetch_array($result)){
                                    # echo "번호: ".$row[id]."/ 이름: ".$row[username]."/ 입실기록: ".$row[in_time]."<br/>";
                                    $str_count = substr_count($row[username], "|");
                                    if($str_count == 0) {
                                        $str_username = $row[username];
                                    } elseif ($str_count == 1) {
                                        $str_username = str_replace("|", "", $row[username]);
                                    } elseif($str_count > 1) {
                                        $str_username = substr(str_replace("|", ", ", $row[username]),0,-2);
                                    }
                                    $str_in_time = substr($row[in_time], 0,-7);
                                    $images = $row[image_data];
                                    $percentage = $row[percentage];

                                    #echo "<img src='data:image/jpeg;base64, $temp'>";

                                    if (empty($images)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo "<img style='width:100px; height:50px; max-width:none; max-height:none' src='image/noimg.png'>"; ?>
                                            </td>
                                            <td>
                                                <?php echo $str_in_time ?>
                                            </td>
                                            <td>
                                                <?php echo $str_username ?>
                                            </td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                        <?php
                                    } else {
                                        if (empty($percentage)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo "<img style='width:100px; height:50px; max-width:none; max-height:none' class='preview' src='data:image/jpeg;base64, $images'>"; ?>
                                                </td>
                                                <td>
                                                    <?php echo $str_in_time ?>
                                                </td>
                                                <td>
                                                    <?php echo $str_username ?>
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo "<img style='width:100px; height:50px; max-width:none; max-height:none' class='preview' src='data:image/jpeg;base64, $images'>"; ?>
                                                </td>
                                                <td>
                                                    <?php echo $str_in_time ?>
                                                </td>
                                                <td>
                                                    <?php echo $str_username ?>
                                                </td>
                                                <td>
                                                <?php echo $percentage ?>%
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }

                                error_reporting(E_ALL);	// error reporting on

                                $ip = "121.139.165.163";	// my localhost ip
                                $port = 8585;			// 26354 my opened port in modem
                                $timeout = 1;			// connection timeout in seconds 

                                if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                                    $flask_cam = "OK";

                                } else {
                                    $flask_cam = "FAIL";
                                    echo("<script>var text = $(\"div.alert\"); text.css(\"display\",\"block\");</script>");
                                }
                                ?>
                                <script>
                                    function livecam(){
                                        var temp = "<?php echo $flask_cam ?>"
                                        if(temp === "OK") {
                                            window.location.href = "http://121.139.165.163:8585";
                                        } else {
                                            alert('FLASK서버로 부터 응답이 없습니다.\n서버상태를 확인후 페이지를 새로고침 하세요.');
                                        }
                                    }
                                </script>
                            </ul>
                        </div>
                    </div>
                    <div id="circle" class="circle" data-role="circle" style='display:none;'>
                        <div class="loader" data-role="loader" style='display:none;'> 
                            <div class="loader" data-role="loader" style='display:none;'>
                                <div class="loader" data-role="loader" style='display:none;'>
                                    <div class="loader" data-role="loader" style='display:none;'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
            <?php
        }
    ?>
    <script type="text/javascript">

        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }

	    $(document).ready(function (e){
		
            $(document).on("click","img",function(){
                var path = $(this).attr('src')
                showImage(path);

                //console.log(path);
            });//end click event
            
            function showImage(fileCallPath){
                
                $(".bigPictureWrapper").css("display","flex").show();
                
                $(".bigPicture")
                .html("<img src='"+fileCallPath+"' >")
                .animate({width:'100%', height: '100%'}, 100);
                
            }//end fileCallPath
            
            $(".bigPictureWrapper").on("click", function(e){
                $(".bigPicture").animate({width:'0%', height: '0%'}, 100);
                    setTimeout(function(){
                    $('.bigPictureWrapper').hide();
                    }, 100);
                });//end bigWrapperClick event
	    });
    </script>
</html>