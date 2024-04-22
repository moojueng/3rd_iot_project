<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="ko">
	<?php
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
	<head>
		<title>감지기록 뷰어</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?ver=1" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script>
			function admin_page_join() {
				location.href="admin?key=" + password_key.value + "";
			}
		</script>
	</head>
	<body class="is-preload">
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
        ?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="#"><strong>감지기록 뷰어 - <?php echo $data_rows ?>개의 데이터 검색됨</strong></a></h1>
						<nav>
						<ul>
							<li><a href="#" onclick="location.href='./admin?key=<?php echo $join_key ?>';">Home</a></li>
						</ul>
							<!-- <ul>
								<li><a href="#footer" class="icon solid fa-info-circle">About</a></li>
							</ul> -->
						</nav>
					</header>
                    <div id="main">
						<?php
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
							
							echo "
							<article class='thumb'>
							<a href='data:image/jpeg;base64, $images' class='image'><img src='data:image/jpeg;base64, $images' alt='' /></a>
							<h2>$str_username - $str_in_time</h2>
							<p>$percentage% 일치하는 것으로 확인 되었습니다.</p>
							</article>";
						}

						?>
                    </div>

				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
								<section>
									<h2>Magna feugiat sed adipiscing</h2>
									<p>Nulla consequat, ex ut suscipit rutrum, mi dolor tincidunt erat, et scelerisque turpis ipsum eget quis orci mattis aliquet. Maecenas fringilla et ante at lorem et ipsum. Dolor nulla eu bibendum sapien. Donec non pharetra dui. Nulla consequat, ex ut suscipit rutrum, mi dolor tincidunt erat, et scelerisque turpis ipsum.</p>
								</section>
								<section>
									<h2>Follow me on ...</h2>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
										<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
									</ul>
								</section>
								<p class="copyright">
									&copy; Unttled. Design: <a href="http://html5up.net">HTML5 UP</a>.
								</p>
							</div>
							<div>
								<section>
									<h2>Get in touch</h2>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<input type="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="field half">
												<input type="text" name="email" id="email" placeholder="Email" />
											</div>
											<div class="field">
												<textarea name="message" id="message" rows="4" placeholder="Message"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</section>
							</div>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>