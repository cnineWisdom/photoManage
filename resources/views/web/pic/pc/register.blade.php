<!DOCTYPE html>
<html style="height:100%;
width:100%;
min-width: 1000px;">
<meta charset='utf-8'>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />

<meta http-equiv="X-UA-Compatible" content="IE=Edge" /> -->

<head>
	<!--[if lte IE 8]>
<![endif]-->
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_f2mqq4nosic.css
	">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/index.css')}}">
	<title>注册</title>
</head>
<body style="background:url('{{URL::asset('/assest/bg.jpg')}}');background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color: #464646;height:100%;width:100%;min-width: 1000px;">
	<!-- 模板页开始 -->	
	<!-- key : username(用户名) phone(手机号) code(验证码) mail(邮箱) hospital(医院) position(职称) key1(密码)-->
	<form action="{{route('register')}}" id='register_form' method="post">
		{{ csrf_field() }}
		<div style="width:730px;text-align:center"><img src="{{URL::asset('/assest/logo.png')}}" width="350px"></div> 
		<div style="width:350px;float:left;">
			<div  class="form_item" style="margin-top:30px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='username' autocomplete="off" class='input' placeholder="用户名">
			</div>
			<div class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-shoujihao"></i>			
				<input type="text" name='phone' class='input' autocomplete="off" id='register_password_input' placeholder="手机号">
	            <span style='color: rgba(229,229,229,0.8)'>|</span>
	            <span id='getCodeButton' style='color: rgba(229,229,229,0.8);text-align: center;font-size:14px;margin-left:13px;cursor: pointer;'>获取验证码</span>
	        </div>
	        <div  class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-yuechi"></i>
				<input type="text" name='code' autocomplete="off" class='input' placeholder="请输入验证码">
	        </div>
	        <div id='username' class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-youxiang"></i>
				<input type="text" name='mail' autocomplete="off" class='input' placeholder="请输入邮箱">
			</div>
		</div>
		<div style="width:350px;float:left;margin-left: 30px;">
			<div  class="form_item" style="margin-top:30px">
				<i class="icon iconfont icon-yiyuan"></i>
				<input type="text" name='hosipital' autocomplete="off" class='input' placeholder="医院">
			</div>
			<div class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-zhicheng"></i>			
				<input type="text" name='position' class='input' autocomplete="off" placeholder="职称">
	            <!-- <span style='color: rgba(229,229,229,0.8)'>|</span> -->
	            <!-- <span id='getCodeButton' style='color: rgba(229,229,229,0.8);text-align: center;font-size:14px;margin-left:13px;cursor: pointer;'>获取验证码</span> -->
	        </div>
	        <div  class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-password"></i>
				<input type="password" name='password' id='key1' autocomplete="off" class='input' placeholder="请输入密码">
	        </div>
	        <div id='username' class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-password"></i>
				<input type="password" name='key2' id='key2' autocomplete="off" class='input' placeholder="请再次输入密码">
			</div>
		</div>
		<input type="hidden" name='registerflag' id='registerflag' value="true">
		<div id='tip'></div>
		<button id='registerbutton' class='button' type='submit' style="width:100%;margin-top:35px;">注册</button>
		<!-- <button id='registerbutton1' class='button1' type='submit' style="width:100%;margin-top:35px;">注册</button> -->
		<div id='link' style="width:730px;">
			<div style='float:left;font-size:14px'>
				<i class="iconfont icon-check-box-outline-bl" id='registerCheck' style="cursor:pointer"></i>
				&nbsp;直接登陆
			</div>
			<a href="login">已有账号</a>
		</div>
	</form>
		<!-- 模板页结束 -->
		<div id='copyright'>
			<p>@2019 All Rights Reserved. Ophthalmic Center</p>
		</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<!-- <script type="text/javascript" src="js/common.js"></script> -->
<script type="text/javascript" src="{{URL::asset('js/index.js')}}"></script>
<!-- [if (lt IE 9) & (!IEMobile)]>
    <script type="text/javascript" src="js/respond.js"></script>
<![end if]-->

</html>