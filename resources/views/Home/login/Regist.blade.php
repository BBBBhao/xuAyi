<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/Home_/css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/Home_/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/Home_/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/Home_/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Home_/js/menu.js"></script>    
        
	<script type="text/javascript" src="/Home_/js/select.js"></script>
    
	<script type="text/javascript" src="/Home_/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/Home_/js/iban.js"></script>
    <script type="text/javascript" src="/Home_/js/fban.js"></script>
    <script type="text/javascript" src="/Home_/js/f_ban.js"></script>
    <script type="text/javascript" src="/Home_/js/mban.js"></script>
    <script type="text/javascript" src="/Home_/js/bban.js"></script>
    <script type="text/javascript" src="/Home_/js/hban.js"></script>
    <script type="text/javascript" src="/Home_/js/tban.js"></script>
    
	<script type="text/javascript" src="/Home_/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好，请<a href="/home/login">登录</a>&nbsp; <a href="/home/register" style="color:#ff4e00;">免费注册</a></span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/Home_/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="/"><img src="/Home_/images/logo.png" /></a></div>

    </div>
	<div class="regist">
      @if(count($errors) > 0)
        <div class="alert alert-danger" id="error">
             <ul>
                 @foreach($errors -> all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
        </div>
      @endif
    	<div class="log_img"><img src="/Home_/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c" style="height: 550px;width:500px;">

        	<form action="/home/doregister" method="post" autocomplete="off">
            {{ csrf_field() }}
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/home/login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" value="" class="l_user" name="uname" placeholder="您的用户名只允许字母/5~10位" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" name="password" placeholder="6~12位密码" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" name="repwd" placeholder="确认您的密码" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td><input type="text" value="" class="l_email" name="email" placeholder="必填" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" class="l_tel" name="phone" placeholder="必填" /></td>
              </tr>
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_ipt" name="captcha" /> 
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <a onclick="re_captcha();">
                    <img src="{{captcha_src()}}" id="127ddf0de5a04167a9e427d883690ff6" title="换一张">
                  </a>
                </td>
              </tr>
              <tr height="50">
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<!-- <label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label> -->
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="立即注册" class="log_btn" /></td>
              </tr>
            </table>
            </form>
            <script type="text/javascript">
              function re_captcha() {  
              $url = "{{captcha_src()}}";
              $url = $url + "/" + Math.random();
                  document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
              }
            </script>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/Home_/images/b_1.gif" width="98" height="33" /><img src="/Home_/images/b_2.gif" width="98" height="33" /><img src="/Home_/images/b_3.gif" width="98" height="33" /><img src="/Home_/images/b_4.gif" width="98" height="33" /><img src="/Home_/images/b_5.gif" width="98" height="33" /><img src="/Home_/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End -->    

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
