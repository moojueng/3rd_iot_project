<!DOCTYPE html>

<html lang="ko">
    <?php
        $mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
        $ref = "/(imgkr.duckdns.org)/";
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

        if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
        #모바일 페이지
    ?>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>관리페이지</title>
            <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
            <script src="https://code.jquery.com/jquery-latest.min.js"></script>
            <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

            <style type="text/css"> 
                a:link { color: gray; text-decoration: none;}
                a:visited { color: gray; text-decoration: none;}
                a:hover { color: gray; text-decoration: none;}
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
            <div data-role="page">
                <div data-role="header">
                    <h1><img src = "image/setting.png" style="width: 15px; height: 15px;"> 관리페이지</h1>
                </div>
                <div data-role="content">
                <button type="button" onclick="livecam()"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</button>
                    <?php
                        $query = "SELECT * FROM maindb";
                        $result = mysql_query($query);
                        $data_rows = mysql_num_rows($result);
                        $query = "select * from setting";
                        $result = mysql_query($query);
                        $row = mysql_fetch_array($result);
                        if($row[log_read_last_count] < $data_rows) {
                            $new_count = $data_rows - $row[log_read_last_count];
                            #echo $row[log_read_last_count];
                            $new_log = "YES";
                            ?>
                            <button type="button" onclick="location.href='./log?key=<?php echo $join_key ?>'"><img src="image/search.png" style="width: 15px; height: 15px;"> 감지기록(<?php echo $data_rows ?>) <font color="red">*NEW(<?php echo $new_count ?>)</font></button>
                            <?php
                        } else {
                            $new_log = "NO";
                            ?>
                            <button type="button" onclick="location.href='./log?key=<?php echo $join_key ?>'"><img src="image/search.png" style="width: 15px; height: 15px;"> 감지기록(<?php echo $data_rows ?>)</button>
                            <?php
                        }
                    ?>
                </div>
                <div data-role="content" margin-left=98%>
                    <?php 
                        if($new_log == "YES") {
                            ?>
                            <h4>알림</h4>
                            <p>확인하지 않은 새로운 감지기록이 <b><?php echo $new_count ?></b>건 있습니다.</p>
                            <?php
                        }
                    ?>
                    <!-- <p>이메일 알림은 <?php echo $str_time ?> 부터 <b><?php echo $email_noti_set ?></b>있습니다.</p> -->
                    <h4>서버 상태</h4>
                    <?php

                        error_reporting(E_ALL);	// error reporting on

                        $ip = "192.168.1.23";	// my localhost ip
                        $port = 8531;			// 26354 my opened port in modem
                        $timeout = 1;			// connection timeout in seconds 

                        if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                            $RTSP_server = "OK"
                            ?>
                                <p>RTSP <font style="color:lightgreen">●</font> 정상</p>
                            <?php
                        } else {
                            $RTSP_server = "FAIL";
                            ?>
                                <p>RTSP <font style="color:lightcoral">●</font> 연결 끊어짐</p>
                            <?php
                        }

                        error_reporting(E_ALL);	// error reporting on

                        $ip = "121.139.165.163";	// my localhost ip
                        $port = 8585;			// 26354 my opened port in modem
                        $timeout = 1;			// connection timeout in seconds 

                        if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                            $flask_cam = "OK";
                            ?>
                                <p>FLASK <font style="color:lightgreen">●</font> 정상</p>
                            <?php
                        } else {
                            $flask_cam = "FAIL";
                            ?>
                                <p>FLASK <font style="color:lightcoral">●</font> 연결 끊어짐</p>
                            <?php
                        }

                        error_reporting(E_ALL);	// error reporting on

                        $ip = "192.168.1.128";	// my localhost ip
                        $port = 3306;			// 26354 my opened port in modem
                        $timeout = 1;			// connection timeout in seconds 

                        if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                            $mysql_server = "OK";
                            ?>
                                <p>MYSQL <font style="color:lightgreen">●</font> 정상</p>
                            <?php
                        } else {
                            $mysql_server = "FAIL";
                            ?>
                                <p>MYSQL <font style="color:lightcoral">●</font> 연결 끊어짐</p>
                            <?php
                        }

                        error_reporting(E_ALL);	// error reporting on

                        $ip = "121.139.165.163";	// my localhost ip
                        $port = 13388;			// 26354 my opened port in modem
                        $timeout = 1;			// connection timeout in seconds 

                        if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                            $socket_server = "OK";
                            ?>
                                <p>SOCKET <font style="color:lightgreen">●</font> 정상</p>
                            <?php
                        } else {
                            $socket_server = "FAIL";
                            ?>
                                <p>SOCKET <font style="color:lightcoral">●</font> 연결 끊어짐</p>
                            <?php
                        }

                        if($flask_cam == "FAIL" or $mysql_server == "FAIL" or $socket_server == "FAIL" or $RTSP_server =="FAIL") {
                            ?>
                            <p>일부 서버가 응답하지 않으므로 정상적으로 동작하지 않을 수 있습니다.</p>
                            <?
                        }
                    ?>
                </div>
            </div>
        <?php
            } else { #데스크톱 페이지

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
                //if($_GET['key'] != 'd97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab') {
                //    exit;
                //}
                $join_key = $_GET['key'];
                ?>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>관리페이지</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>

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


                    .card {
                        width: 100%;
                        padding-right: 15px;
                        padding-left: 15px;
                        margin-right: auto;
                        margin-left: auto;
                        margin-top: 15px;
                    }

                    .card-img-top {
                        filter: blur(10px);
                        transition: .3s ease-in-out;
                    }
                    .card-img-top:hover {
                        filter: blur(0);
                        
                    }

                    .container {
                        margin-bottom: 15px;
                    }

                    .alert {
                        margin-bottom: 0px;
                    }

                    .pie-legend {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                    }
                    .pie-legend span {
                        display: inline-block;
                        width: 14px;
                        height: 14px;
                        border-radius: 100%;
                        margin-right: 16px;
                        margin-bottom: -2px;
                    }
                    .pie-legend li {
                        margin-bottom: 10px;
                    }

                    .col {
                        height: 500px;
                    }

                    /* @media css 작성시 낮은 width 부터 작성
                    그리고 @media 해당 줄에 { 있어야함.
                    */
                    @media (min-width: 576px) {
                        .mb-3 {
                            max-width: 540px;
                        }

                        .chart{
                            /* margin-top: 50px; */
                            margin-top: 50px;
                            height:300px;
                            width:300px;
                        }
                    }
                    @media (min-width: 768px) {
                        .mb-3 {
                            max-width: 720px;
                        }

                        .chart{
                            /* margin-top: 50px; */
                            margin-top: 130px;
                            
                            height:300px;
                            width:300px;
                        }
                    }
                    @media (min-width: 992px) {
                        .mb-3 {
                            max-width: 960px;
                        }

                        .chart{
                            /* margin-top: 50px; */
                            margin-top: 130px;
                            margin-left: 45px;
                            height:400px;
                            width:400px;
                        }
                    }
                    @media (min-width: 1200px) {
                        .mb-3 {
                            max-width: 1140px;
                        }

                        .chart{
                            margin-top: 100px;
                            margin-left: 50px;
                            height:500px;
                            width:500px;
                        }
                    }
                </style>
            </head>
            <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src = "image/setting.png" style="width: 20px; height: 20px;"> 관리페이지</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="live_cam">
                                <a class="nav-link" href="#" onclick="livecam()"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</a>
                            </li>
                            <li class="log">
                            <?php
                                $query = "SELECT * FROM maindb";
                                $result = mysql_query($query);
                                $data_rows = mysql_num_rows($result);
                                $query = "select * from setting";
                                $result = mysql_query($query);
                                $row = mysql_fetch_array($result);
                                if($row[log_read_last_count] < $data_rows) {
                                    $new_count = $data_rows - $row[log_read_last_count];
                                    #echo $row[log_read_last_count];
                                    $new_log = "YES";
                            ?>
                            <a class="nav-link" href="#" onclick="location.href='./log?key=<?php echo $join_key ?>'"><img src="image/search.png" style="width: 15px; height: 15px;"> 감지기록(<?php echo $data_rows ?>) <span class="badge badge-secondary">NEW <span class="badge badge-light"><?php echo $new_count ?></span></span></a>
                            <?php 
                            } else {
                            ?>
                            <a class="nav-link" href="#" onclick="location.href='./log?key=<?php echo $join_key ?>'"><img src="image/search.png" style="width: 15px; height: 15px;"> 감지기록(<?php echo $data_rows ?>)</a>
                            <?php
                            }
                            ?>
                            </li>
                            <li class="log-viewer">
                                <a class="nav-link" href="#" onclick="location.href='./multiverse?key=<?php echo $join_key ?>'"><img src="image/search.png" style="width: 15px; height: 15px;"> 감지기록 뷰어</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="nav-link" href="#" id="modal_btn" data-bs-toggle="modal" href="#update_log"><span class="badge badge-danger">N</span> 업데이트 로그</a>
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
                <?php
                if($join_key == "d97e1bd72e23f2269d06278d25558fad825fb0039d27cfab71eee2cf220873ab") {
                ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>유승환</strong>님 안녕하세요 오늘도 좋은 하루 보내세요.
                    </div>
                <?php
                } else if($join_key == "b71e3f9398381b230c895510c9269b5392caee1db1f2588c7a930be9e099f5a3") {
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>방현우</strong>님 안녕하세요 오늘도 좋은 하루 보내세요.
                        </div>
                    <?php
                } else if($join_key == "86d1d4f9c4c19f02a0e1caaa29b25fced28c4f71d1b41415b1e15e40153ac0e4 ") {
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>안시로</strong>님 안녕하세요 오늘도 좋은 하루 보내세요.
                        </div>
                    <?php
                } else if($join_key == "9c8dd327d0f259b6facd68100f664c432101f783d31ac9b78b6e9eaf9fa786b8 ") {
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>이형천</strong>님 안녕하세요 오늘도 좋은 하루 보내세요.
                        </div>
                    <?php
                }
                if($new_log == "YES") {
                ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>새로운 알림:</strong> 확인하지 않은 새로운 감지기록이 <b><?php echo $new_count ?></b>건 있습니다. <a href="#" onclick="location.href='./log?key=<?php echo $join_key ?>'" class="alert-link">여기</a>를 눌러 확인하세요.
                </div>
                <?php
                }
                ?>
                <div class="alert alert-warning alert-dismissible fade show" data-role="alert" style='display:none;'>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>경고:</strong> 일부 서버가 응답하지 않으므로 정상적으로 동작하지 않을 수 있습니다.
                </div>
                <?php

                    // error_reporting(E_ALL);	// error reporting on

                    // $ip = "192.168.1.23";	// my localhost ip
                    // $port = 8531;			// 26354 my opened port in modem
                    // $timeout = 1;			// connection timeout in seconds 

                    // if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                    //     $RTSP_server = "OK";
                    // } else {
                    //     $RTSP_server = "FAIL";
                    // }

                    error_reporting(E_ALL);	// error reporting on

                    $ip = "121.139.165.163";	// my localhost ip
                    $port = 8585;			// 26354 my opened port in modem
                    $timeout = 1;			// connection timeout in seconds 

                    if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                        $flask_cam = "OK";
                    } else {
                        $flask_cam = "FAIL";
                    }

                    error_reporting(E_ALL);	// error reporting on

                    $ip = "192.168.1.128";	// my localhost ip
                    $port = 3306;			// 26354 my opened port in modem
                    $timeout = 1;			// connection timeout in seconds 

                    if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                        $mysql_server = "OK";
                    } else {
                        $mysql_server = "FAIL";
                    }

                    error_reporting(E_ALL);	// error reporting on

                    $ip = "121.139.165.163";	// my localhost ip
                    $port = 13388;			// 26354 my opened port in modem
                    $timeout = 1;			// connection timeout in seconds 

                    if (fsockopen($ip, $port, $errno, $errstr, $timeout)) {
                        $socket_server = "OK";
                    } else {
                        $socket_server = "FAIL";
                    }

                
                    $query = "select * from maindb ORDER BY in_time DESC LIMIT 1";
                    $result = mysql_query($query);
                    $row = mysql_fetch_array($result);
                    $str_count = substr_count($row['username'], "|");
                    if($str_count == 0) {
                        $str_username = $row['username'];
                    } elseif ($str_count == 1) {
                        $str_username = str_replace("|", "", $row['username']);
                    } elseif($str_count > 1) {
                        $str_username = substr(str_replace("|", ", ", $row['username']),0,-2);
                    }
                    $str_in_time = substr($row['in_time'], 0,-7);
                    $images = $row['image_data'];
                    $percentage = $row['percentage'];

                ?>
            <div class="modal fade" id="update_log" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">업데이트 로그</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>
                                <p>
                                    21/11/29 : 
                                    관리페이지(index.php) 최초 작성. jqeury사용.
                                    실시간 CAM 이동 버튼 삽입.
                                    <br>
                                    python flask 수정 jqeury사용
                                    관리페이지 이동 버튼 삽입.
                                    이메일 알림 켜기, 끄기 버튼 제거.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/11/30 : 
                                    관리페이지(index.php)
                                    서버 상태 추가.
                                    <br>
                                    FLASK, MYSQL, SOCKET 서버상태 추가.<br>
                                    FLASK 서버가 작동하지 않을때 실시간 CAM 및 이메일 알림 버튼 동작 불가능하도록 수정.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/01 : 
                                    관리페이지(index.php)
                                    감지기록 이동 버튼 삽입.
                                    <br>
                                    감지기록(join_log.php) 최초 작성. jqeury사용<br>
                                    관리페이지 이동 버튼 및 실시간 CAM 이동 버튼 삽입.<br>
                                    FLASK 서버가 작동하지 않을때 실시간 CAM 이동 불가능 하도록 수정.<br>
                                    감지시간, object name 표시<br>
                                    python flask<br>
                                    감지기록 이동 버튼 삽입.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/02 : 
                                    관리페이지(index.php)
                                    python flask와 연동하여 이메일 알림 켜기 끄기 버튼 삽입.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/03 : 
                                    관리페이지(index.php)
                                    이메일 알림 켜기 끄기 버튼 토글 형태로 수정.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/06 : 
                                    관리페이지(index.php)<br>
                                    감지기록 버튼에 감지된 object 갯수 추가. 확인하지 않은 감지기록이 있다면 신규 감지갯수 출력하도록 수정.<br>
                                    알림 추가.<br>
                                    이메일 알림 꺼/켜짐 상태 및 신규 감지갯수 알림.<br>
                                    RTSP서버 상태 추가.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/07 : 
                                    감지기록(join_log.php)<br>
                                    감지된 이미지를 출력하도록 수정.<br>
                                    base64 decode<br>
                                    img 클릭시 확대 되도록 수정.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/28 : 
                                    모바일 페이지, 데스크톱 페이지 구분.
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/29 : 
                                    데스크톱 페이지 부트스트랩 CSS 적용
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/30 : 
                                    모바일 페이지 및 데스크톱 페이지 이메일알림 부분 제거(PYTHON 서버 변경)
                                </p>
                            </li>
                            <li>
                                <p>
                                    21/12/31 : 
                                    모바일 페이지 및 데스크톱 페이지 인증코드 도입<br>
                                    관리페이지 admin.php로 수정 인증 페이지 index.php 신규작성
                                </p>
                            </li>
                            <li>
                                <p>
                                    22/01/01 : 
                                    admin.php 및 join_log.php 링크로 접근 제한<br>
                                    php 확장자 숨김처리.<br>
                                    index.php 로 접근시 index로 리디렉션
                                </p>
                            </li>
                            <li>
                                <p>
                                    22/01/02 : 
                                    페이지 SSL 인증 적용<br>
                                    http페이지로 접근시 https로 리디렉션(nginx conf수정 불가로 인하여, index에서 처리)
                                </p>
                            </li>
                            <li>
                                <p>
                                    22/01/03 : 
                                    join_log페이지 log로 정정<br>
                                    업데이트 로그를 볼수 있는 버튼 상단에 추가<br>
                                    $_GET['key']데이터 암호화 적용
                                </p>
                            </li>
                            <li>
                                <p>
                                    22/01/06 : 
                                    메인페이지 감지 정확도 차트 추가<br>
                                    모바일 페이지 로그인 안됨 증상 수정(POST 암호화 안됨)
                                </p>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="background-color: #625d5da3;">
                <div class="container" style="background-color: #f8f9fa91; border: 1px; border-radius:5px; margin-top: 15px;">
                    <h2 class="text-center">최근 감지 정확도</h2>
                    <div class="row row-cols-2" style="max-heigth:500px !important;">
                        <div class="col">
                            <div class="chart">
                                <canvas id="property_types" class="pie"></canvas>
                            </div>
                        </div>
                        <div class="col" style="max-heigth:500px !important;">
                            <div id="pie_legend" class="py-3 text-left col-md-7 mx-auto"></div>
                        </div>
                    </div>
                </div>
                <div class = "container" style="background-color: #f8f9fa91; border: 1px; border-radius:5px;">
                    <h2 class="text-center">최근 감지 기록</h2>
                    <?php echo "<img style='height:320px;' src='data:image/jpeg;base64, $images' class='card-img-top'>"; ?>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $str_username ?> <?php echo $percentage ?>%
                        </p>
                        <p class="card-text"><small class="text-muted" style="color: #212529!important;"><?php echo $str_in_time ?></small></p>
                    </div>
                </div>


                <div class="container" style="background-color: #f8f9fa91; border: 1px; border-radius:5px;">
                    <h2 class="text-center">서버 상태</h2><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <h3 class="text-center">FLASK</h3>
                            <?php
                            if ($flask_cam === "OK") {
                            ?>
                            <br><p class="text-center"><font style="color:blue">●</font> 정상</p>
                            <?php
                            } else {
                            ?>
                            <br><p class="text-center"><font style="color:red">●</font> 연결 끊어짐</p>
                            <?
                            }
                        ?>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="text-center">MYSQL</h3>
                            <?php
                            if ($mysql_server === "OK") {
                            ?>
                            <br><p class="text-center"><font style="color:blue">●</font> 정상</p>
                            <?php
                            } else {
                            ?>
                            <br><p class="text-center"><font style="color:red">●</font> 연결 끊어짐</p>
                            <?
                            }
                        ?>
                        </div>
                        <div class="col-sm-4">
                        <h3 class="text-center">SOCKET</h3>
                            <?php
                            if ($socket_server === "OK") {
                            ?>
                            <br><p class="text-center"><font style="color:blue">●</font> 정상</p>
                            <?php
                            } else {
                            ?>
                            <br><p class="text-center"><font style="color:red">●</font> 연결 끊어짐</p>
                            <?
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                if($flask_cam == "FAIL" or $mysql_server == "FAIL" or $socket_server == "FAIL") {
                    echo("<script>var text = $(\"div.alert\"); text.css(\"display\",\"block\");</script>");
                }

                $query = "select * from maindb where username = 'SeungHwan' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $SeungHwan_val = $row['percentage'];
                if (empty($SeungHwan_val)) {
                    $SeungHwan_val = "0";
                } else {
                    $SeungHwan_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'HyeonWoo' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $HyeonWoo_val = $row['percentage'];
                if (empty($HyeonWoo_val)) {
                    $HyeonWoo_val = "0";
                } else {
                    $HyeonWoo_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'YongSuk' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $YongSuk_val = $row['percentage'];
                if (empty($YongSuk_val)) {
                    $YongSuk_val = "0";
                } else {
                    $YongSuk_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'JeBeom' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $JeBeom_val = $row['percentage'];
                if (empty($JeBeom_val)) {
                    $JeBeom_val = "0";
                } else {
                    $JeBeom_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'SangHo' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $SangHo_val = $row['percentage'];
                if (empty($SangHo_val)) {
                    $SangHo_val = "0";
                } else {
                    $SangHo_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'TaeUng' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $TaeUng_val = $row['percentage'];
                if (empty($TaeUng_val)) {
                    $TaeUng_val = "0";
                } else {
                    $TaeUng_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'HyoJe' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $HyoJe_val = $row['percentage'];
                if (empty($HyoJe_val)) {
                    $HyoJe_val = "0";
                } else {
                    $HyoJe_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'HyeongCheon' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $HyeongCheon_val = $row['percentage'];
                if (empty($HyeongCheon)) {
                    $HyeongCheon_val = "0";
                } else {
                    $HyeongCheon_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'YeongDae' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $YeongDae_val = $row['percentage'];
                if (empty($YeongDae_val)) {
                    $YeongDae_val = "0";
                } else {
                    $YeongDae_val = str_replace("%", "", $row['percentage']);
                }
                
                $query = "select * from maindb where username = 'Siro' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $Siro_val = $row['percentage'];
                if (empty($Siro_val)) {
                    $Siro_val = "0";
                } else {
                    $Siro_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'SeongTan' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $SeongTan_val = $row['percentage'];
                if (empty($SeongTan_val)) {
                    $SeongTan_val = "0";
                } else {
                    $SeongTan_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'HanSol' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $HanSol_val = $row['percentage'];
                if (empty($HanSol_val)) {
                    $HanSol_val = "0";
                } else {
                    $HanSol_val = str_replace("%", "", $row['percentage']);
                }

                $query = "select * from maindb where username = 'DuHyeok' ORDER BY in_time DESC LIMIT 1";
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);
                $DuHyeok_val = $row['percentage'];
                if (empty($DuHyeok_val)) {
                    $DuHyeok_val = "0";
                } else {
                    $DuHyeok_val = str_replace("%", "", $row['percentage']);
                }
                
                

            } //데스크탑 페이지 끝
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

            function server_error_show(){
                var text = $("div.alert");
                text.css("display","block");
            }


            $('#modal_btn').click(function(e){
                e.preventDefault();
                $('#update_log').modal("show");
		    });
            //차트 스크립트 시작!
            var options = {
                responsive: true,
                easing:'easeInExpo',
                scaleBeginAtZero: true,
                // you don't have to define this here, it exists inside the global defaults
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            }

            
            var ctxPTD = $("#property_types").get(0).getContext("2d");
            // data
            var dataPTD = [
                {
                    label: "SEUNGHWAN - <?php echo $SeungHwan_val ?>%",
                    color: "#5093ce",
                    highlight: "#78acd9",
                    value: <?php echo $SeungHwan_val ?>
                },
                {
                    label: "HYEONWOO - <?php echo $HyeonWoo_val ?>%",
                    color: "#c7ccd1",
                    highlight: "#e3e6e8",
                    value: <?php echo $HyeonWoo_val ?>
                },
                {
                    label: "YONGSUK - <?php echo $YongSuk_val ?>%",
                    color: "#7fc77f",
                    highlight: "#a3d7a3",
                    value: <?php echo $YongSuk_val ?>
                },
                {
                    label: "JEBEOM - <?php echo $JeBeom_val ?>%",
                    color: "#fab657",
                    highlight: "#fbcb88",
                    value: <?php echo $JeBeom_val ?>
                },
                {
                    label: "SANGHO - <?php echo $SangHo_val ?>%",
                    color: "#eaaede",
                    highlight: "#f5d6ef",
                    value: <?php echo $SangHo_val ?>
                },
                {
                    label: "TAEUNG - <?php echo $TaeUng_val ?>%",
                    color: "#dd6864",
                    highlight: "#e6918e",
                    value: <?php echo $TaeUng_val ?>
                },
                {
                    label: "HYOJE - <?php echo $HyoJe_val ?>%",
                    color: "#fd7e14",
                    highlight: "#e6918e",
                    value: <?php echo $HyoJe_val ?>
                },
                {
                    label: "HYEONGCHEON - <?php echo $HyeongCheon_val ?>%",
                    color: "#6c757d",
                    highlight: "#e6918e",
                    value: <?php echo $HyeongCheon_val ?>
                },
                {
                    label: "YEONGDAE - <?php echo $YeongDae_val ?>%",
                    color: "#6f42c1",
                    highlight: "#e6918e",
                    value: <?php echo $YeongDae_val ?>
                },
                {
                    label: "SIRO - <?php echo $Siro_val ?>%",
                    color: "#00ff3a",
                    highlight: "#e6918e",
                    value: <?php echo $Siro_val ?>
                },
                {
                    label: "SEONGTAN - <?php echo $SeongTan_val ?>%",
                    color: "#7d6c7b",
                    highlight: "#e6918e",
                    value: <?php echo $SeongTan_val ?>
                },
                {
                    label: "HANSOL - <?php echo $HanSol_val ?>%",
                    color: "#ff009e",
                    highlight: "#e6918e",
                    value: <?php echo $HanSol_val ?>
                },
                {
                    label: "DUHYEOK - <?php echo $DuHyeok_val ?>%",
                    color: "#4600ff",
                    highlight: "#e6918e",
                    value: <?php echo $DuHyeok_val ?>
                },
                
            ]
            // Property Type Distribution
            var propertyTypes = new Chart(ctxPTD).Pie(dataPTD, options);
                // pie chart legend
                $("#pie_legend").html(propertyTypes.generateLegend());
        </script>
        <!-- <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer> -->
    </body> 
</html>