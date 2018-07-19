@extends('Home.layout.index')
@section('content')
<style type="text/css">
*{ padding:0; margin:0}
.city{ margin:5px 10px; }
.selectbox{ height:50px; width:500px;}
.selectbox select{ height:30px; width:120px; margin-right:10px; border:1px solid #999; line-height:30px;}
</style>
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="/home/adress" class="now">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="/home/user">用户信息</a></li>
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
            <p></p>
            <div class="mem_tit" style="color:#ff4e00;" >收货地址</div>
            
            @foreach($addr as $k => $v)
            @if(session('user')['uid'] == $v -> user_id )
			<div class="address">
            	<div class="a_close"><a href="/home/addrdel/{{$v->id}}"><img src="/Home_/images/a_close.png" title="删除" /></a></div>
            	<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td>{{ $v -> consignee }}</td>
                  </tr>
                  <tr>
                    <td align="right">联系电话：</td>
                    <td>{{ $v -> tel }}</td>
                  </tr>
                  <tr>
                    <td align="right">配送地区：</td>
                    <td>{{ $v -> province }} - {{ $v -> city }} - {{ $v -> county }}</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td>{{ $v -> detailed_address }}</td>
                  </tr>
                </table>
                <p align="right">
                    @if($v -> status == 1)
                	<!-- <a href="/home/addrdefault/{{$v->id}}" style="color:#ff4e00;" onclick="addrdefault()">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp;  -->
                    <a href="#" style="color:#ff4e00;" onclick="addrdefault()">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                    @else
                    <b style="color:#ff4e00;">默认地址</b>&nbsp; &nbsp; &nbsp; &nbsp; 
                    @endif
                    <a href="/home/doadress/{{$v->id}}" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>
            </div>
            @endif
            @endforeach
            
            <div class="mem_tit">
            	<a href="/home/addadress"><img src="/Home_/images/add_ad.gif" /></a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function addrdefault(){
        alert('该功能尚未实现');
    }
    </script>
	<!--End 用户中心 End--> 
@endsection
