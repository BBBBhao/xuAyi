<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>纸叠效果会员登录界面模板</title>
<link rel="stylesheet" type="text/css" href="/Admin_/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Admin_/css/body.css"/> 
</head>
<body>
<div class="container">
	@if(count($errors) > 0)
	    <div class="alert alert-danger" id="error">
	        <ul>
	            @foreach($errors -> all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<section id="content">
		<form action="/admin/dologin" method="post">
			{{ csrf_field() }}
			<h1>登录</h1>
			<div>
				<input type="text" placeholder="用户名" name="uname" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="密码" name="password" required="" id="password" />
			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<!-- <input type="submit" value="Log in" /> -->
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
				<a href="#">忘记密码?</a><a href="/admin/register/create">注册</a>
				<!-- <a href="#">Register</a> -->
			</div>
		</form><!-- form -->
		 <div class="button">	
		</div> <!-- button -->
	</section><!-- content -->
</div>
<!-- container -->


<br><br><br><br>
<div style="text-align:center;">
</div>
</body>
</html>