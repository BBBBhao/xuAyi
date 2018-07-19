@extends('Home.layout.index')
@section('content')
<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="/home/adress">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="/home/user" class="now">用户信息</a></li>
                    <li><a href="Member_Collect.html">我的收藏</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="/home/safe">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
                </ul>
            </div>
            
        </div>
		<div class="m_right">
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img src="/uploads/{{ $user -> face }}" width="90" height="90" onerror="this.src='/uploads/userspic.jpg';" /></td>
                    <td>
                        <div class="m_user">用户名:{{ $user -> username }}</div>
                        <p>
                            @if(session('user')['identity'] == 1)
                            等级：管理员 <br />
                            @else
                            等级：普通用户 <br />
                            @endif
                            <!-- 用户积分 -->
                            <!-- <font color="#ff4e00">您还差 270 积分达到 分红100</font><br />-->
                            上一次登录时间: {{ session('user')['lastlogintime'] }}<br /> 
                            *注：修改密码、手机、邮箱请到 <a href="/home/safe" style="color: #005ea7">账号安全</a><br /> 
                            <!-- 邮箱验证 -->
                            <!--  您还没有通过邮件认证 <a href="#" style="color:#ff4e00;">点此发送认证邮件</a> -->
                        </p>
<!--                         <div class="m_notice">
                            用户中心公告！
                        </div> -->
                    </td>
                  </tr>
                </table>	
            </div>
            
            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                @if(session('user')['identity'] == 1)
                <td width="33%">用户等级：<span style="color:#555555;">管理员</span></td>
                @else
                <td width="33%">用户等级：<span style="color:#555555;">普通用户</span></td>
                @endif
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">返还积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥200元</span></td></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td></td>
                <td>红包价值：<span>￥50元</span></td></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                    <font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </table>
            <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">昵称：<span style="color:#555555;">{{ $user -> nickname }}</span></td>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{ $user -> tel }}</span></td>
              </tr>
              <tr>
                <td>注册时间：<span style="color:#555555;">{{ $user -> created_at }}</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{ $user -> email }}</span></td>
              </tr>
            </table>
        </div>
    </div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
@endsection