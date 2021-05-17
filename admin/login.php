<?php
    // gọi file adminlogin
    include '../classes/adminlogin.php';
?>
<?php
    // gọi class adminlogin
    $class = new adminlogin(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $adminUser = $_POST['adminUser'];
        $adminPass = $_POST['adminPass'];
        $login_check = $class -> longin_admin($adminUser,$adminPass); // hàm check User and Pass khi submit lên
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
<style>
img{max-width:100%;}
body{font-family:'Montserrat',sans-serif;margin:0;background:url(images/bg.jpg) no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-attachment:fixed;background-position:center;}
ul{padding:0;margin:0;}
h1,
h2,
h3,
h4,
h5,
h6{margin:0;padding:0;}
p{padding:0;margin:0;color:#999;}

/*-- main --*/
.main{position:relative;text-align:center;}
.main-w3l{position:absolute;top:5%;width:60%;margin:0 auto;left:19%;margin-top:50px;margin-bottom:50px;}
h1.logo-w3{font-size:3em;text-transform:uppercase;letter-spacing:4px;color:#ffffff;text-align:center;margin:5% 0;width:100%;}
.w3layouts-main h2{color:#fff;font-size:29px;letter-spacing:2px;text-transform:uppercase;margin-bottom:60px;text-align:center;}
.w3layouts-main h2 span{padding:0 1em;}
.w3layouts-main{width:40%;margin:0 auto;background:rgba(0,0,0,0.53);text-align:center;}
.w3layouts-main{padding:42px 35px 25px;}
input[type="username"],
input[type="password"]{width:75%;padding:16px 50px 16px 50px;outline:none;font-size:15px;font-weight:300;color:#fff;margin:14px 0px;font-family:'Montserrat',sans-serif;border:1px solid #fff;background:transparent;letter-spacing:1px;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;}
input[type="username"]{background:rgba(0,0,0,0.55) url(images/user.png) no-repeat 10px 10px;}
input[type="password"]{background:rgba(0,0,0,0.55) url(images/lock.png) no-repeat 10px 10px;}
.w3layouts-main h6{font-size:16px;color:#fff;letter-spacing:1px;margin-top:8px;text-align:center;text-decoration:none;}
.w3layouts-main h3{font-size:0.9em;color:#fff;margin-top:3em;text-align:center;}
input[type="submit"]{padding:14px 30px;font-size:1em;border-radius:30px;-webkit-border-radius:30px;-moz-border-radius:30px;-ms-border-radius:30px;-o-border-radius:30px;text-transform:uppercase;letter-spacing:1px;background:#2dde98;color:#ffffff;border:none;outline:none;cursor:pointer;font-family:'Montserrat',sans-serif;margin:24px auto;}
input[type="submit"]:hover{background:#ff4f81;color:#fff;transition:0.5s all;-webkit-transition:0.5s all;-o-transition:0.5s all;-moz-transition:0.5s all;-ms-transition:0.5s all;}
.w3layouts-main2 input[type="submit"]{margin:27px auto 31px;}
.social a{background:#3b5998;padding:1em 4.68em;font-size:16px;letter-spacing:2px;color:#fff;text-transform:uppercase;border-radius:30px;border-radius:30px;-webkit-border-radius:30px;-moz-border-radius:30px;-ms-border-radius:30px;-o-border-radius:30px;}
.social a:hover{background:#2dde98;color:#fff;}

/*--footer--*/
.footer-w3l p{margin:3.5em 0em 0em;color:#fff;font-size:15px;font-weight:300;letter-spacing:2px;}
.footer-w3l a{color:#2dde98;font-family:'Montserrat',sans-serif;}
.footer-w3l a:hover{color:#fff;text-decoration:underline;}

/*--//footer--*/

/*--responsive--*/
@media(max-width:1920px){
	h1.logo-w3{margin:10% 0 5%;}
	.social a{padding:1em 6.68em;}
}
@media(max-width:1680px){
	h1.logo-w3{margin:7% 0 5%;}
	.social a{padding:1em 5.38em;}
}
@media(max-width:1600px){
	h1.logo-w3{margin:5% 0;}
	.social a{padding:1em 4.68em;}
}
@media(max-width:1440px){
	.w3layouts-main{padding:40px 40px;}
	.w3layouts-main{width:45%;}
	h1.logo-w3{font-size:2.8em;}
}
@media(max-width:1366px){
	.main-w3l{width:68%;left:17%;}
	h1.logo-w3{font-size:2.7em;}
	.footer-w3l p{margin:3em 0em 2em;}
}
@media(max-width:1280px){
	h1.logo-w3{font-size:2.8em;}
	.main-w3l{width:71%;left:15%;}
	.footer-w3l p{margin:4.5em 0em 0em;}
}
@media(max-width:1080px){
	h1.logo-w3{font-size:2.7em;letter-spacing:3px;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:27px;}
	.w3layouts-main{width:50%;}
}
@media(max-width:1050px){
	.w3layouts-main{width:48%;}
	.social a{padding:1em 3.8em;}
}
@media(max-width:1024px){
	h1.logo-w3{font-size:2.6em;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:26px;}
	.social a{padding:1em 3.5em;}
	.w3layouts-main{width:53%;}
	.footer-w3l p{margin:2em 0em;}
}
@media(max-width:991px){
	h1.logo-w3{font-size:2.5em;margin:4% 0;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:25px;}
	.social a{padding:1em 4.5em;font-size:15px;}
	input[type="submit"]{padding:14px 30px;font-size:.875em;}
}
@media(max-width:900px){
	.w3layouts-main{width:57%;}
	input[type="username"],
	input[type="password"]{width:73%;}
}
@media(max-width:800px){
	.main-w3l{width:91%;left:4.5%;}
	h1.logo-w3{font-size:2.4em;letter-spacing:2px;}
	.w3layouts-main{width:53%;}
}
@media(max-width:768px){
}
@media(max-width:736px){
	h1.logo-w3{font-size:2.3em;}
	.w3layouts-main2 input[type="submit"]{margin:28px auto 31px;}
	.social a{padding:1em 4em;}
	.footer-w3l p{font-size:14px;letter-spacing:1px;}
	.w3layouts-main h2{margin-bottom:45px;}
}
@media(max-width:667px){
	.w3layouts-main{width:58%;}
	h1.logo-w3{font-size:2em;letter-spacing:1px;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:23px;}
	input[type="username"],
	input[type="password"]{width:74%;}
}
@media(max-width:640px){
	.social a{padding:1em 3.5em;}
	input[type="submit"]{padding:12px 30px;}
}
@media(max-width:600px){
	.w3layouts-main{width:62%;}
	input[type="username"],
	input[type="password"]{width:72%;}
}
@media(max-width:568px){
	.w3layouts-main{width:65%;}
	.footer-w3l p{line-height:26px;}
}
@media(max-width:480px){
	h1.logo-w3{font-size:1.8em;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:20px;letter-spacing:1px;}
	input[type="submit"]{font-size:0.95em;}
	.w3layouts-main{width:80%;}
}
@media(max-width:414px){
	h1.logo-w3{font-size:1.75em;line-height:1.4;}
	.w3layouts-main{width:80%;}
	.w3layouts-main{padding:40px 30px;}
	input[type="username"],
	input[type="password"]{width:66%;}
	.w3layouts-main h6{font-size:15px;}
	ul.top-links li a i.fa{height:32px;line-height:34px;width:32px;font-size:14px;}
	input[type="submit"]{font-size:0.85em;letter-spacing:0px;}
	.footer-w3l p{font-size:14px;}
	input[type="username"],
	input[type="password"]{letter-spacing:0px;}
	.social a{padding:1em 2em;}
}
@media(max-width:384px){
	.w3layouts-main{padding:30px 20px;width:88%;}
}
@media(max-width:375px){
	h1.logo-w3{font-size:1.7em;}
	.social a{font-size:14px;}
}
@media(max-width:320px){
	h1.logo-w3{font-size:1.55em;}
	.w3layouts-main h2,
	.w3layouts-main2 h3{font-size:19px;letter-spacing:0px;}
	.w3layouts-main{width:90%;padding:25px 15px;}
	.w3layouts-main h6{font-size:14px;margin-top:0px;}
	input[type="username"],
	input[type="password"]{width:60%;}
	.footer-w3l p{font-size:13px;margin:2em 0em 1.5em;}
	.social a{padding:1em 2em;font-size:13px;letter-spacing:1px;}
	input[type="username"],
	input[type="password"]{background-size:28px;padding:14px 50px 14px 50px;font-size:14px;}
}
/*--//responsive--*/
</style>

</head>
<body>
<div class="main">
		<div class="main-w3l mt-5">
			<div class="w3layouts-main">
				<h2><span>LOGIN ADMIN</span></h2>
				<form action="login.php" method="post">
					<span style="color:red;font-weight:bold;"><?php 
						if(isset($login_check)){
							echo $login_check;
						}
					?></span>
					<input type="username" placeholder="Username" required="" name="adminUser">
					<input type="password" placeholder="Password" required=""  name="adminPass"/>
					<input type="submit" value="LOGIN"/>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
