<!DOCTYPE html>

<html lang="ko">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>감지기록</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

	<style type="text/css"> 
		a:link { color: gray; text-decoration: none;}
		a:visited { color: gray; text-decoration: none;}
		a:hover { color: gray; text-decoration: none;}

	</style>

    </head>
    <body>
        <div data-role="page">
            <div data-role="header">
                <h1>감지기록</h1>
            </div>
            <div data-role="content">
	            <button type="button" onclick="location.href='./index.php'"><img src="image/setting.png" style="width: 15px; height: 15px;"> 관리 페이지</button>
	            <!--<a href="http://imgkr.duckdns.org:8585"><button type="button"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</button></a>-->
                <button type="button" onclick="livecam()"><img src="image/cam.png" style="width: 15px; height: 15px;"> 실시간 CAM</button>
                <?php
                    //mysql 접속 계정 정보 설정
                    $mysql_host = 'localhost';
                    $mysql_user = 'root';
                    $mysql_password = 'Maria0009!';
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
                    $query = "select * from maindb ORDER BY in_time DESC";
                    //쿼리보내고 결과를 변수에 저장
                    $result = mysql_query($query);
                    while($row = mysql_fetch_array($result)){
                        # echo "번호: ".$row[id]."/ 이름: ".$row[username]."/ 입실기록: ".$row[in_time]."<br/>";
                        $str_count = substr_count($row[username], "|");
                        if($str_count == 1) {
                            $str_username = str_replace("|", "", $row[username]);
                        } else {
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

                    $ip = "192.168.1.23";	// my localhost ip
                    $port = 8000;			// 26354 my opened port in modem
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
                                window.location.href = "http://imgkr.duckdns.org:8585";
                            } else {
                                alert('FLASK서버로 부터 응답이 없습니다.\n서버상태를 확인후 페이지를 새로고침 하세요.');
                            }
                        }
                    </script>
                </ul>
            </div>
        </div>
    </body>
</html>
