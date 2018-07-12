@extends('admin.layout.index')

@section('content')

<div>
	<img src="/image/uploads/timg.jpg" alt="" style="width:300px">
	<div id="box" style="font-size:20px">2018年5月25日 14:33:33</div>
</div>
	<script type="text/javascript">
		var box = document.getElementById('box');
		var bodya = document.getElementById('bodya');
		function fun(){
			
			var date = new Date;
			var n = date.getFullYear();
			var y = date.getMonth()+1;
			var d = date.getDate();
			var s = date.getHours();
			var f = date.getMinutes();
			var m = date.getSeconds();
			var x = date.getDay();
			switch(x){
				case 0:
					x = '天';
					break;
				case 1:
					x = '一';
					break;
				case 2:
					x = '二';
					break;
				case 3:
					x = '三';
					break;
				case 4:
					x = '四';
					break;
				case 5:
					x = '五';
					break;
				case 6:
					x = '六';
					break;
			}
			//年
			if(y < 10) {
				y = '0'+y;
			}
			//天
			if(d < 10) {
				d = '0'+d;
			}
			//时
			if(s < 10) {
				s = '0'+s;
			}
		
			//分
			if(f < 10) {
				f = '0'+f;
			}
			//秒
			if(m < 10) {
				m = '0'+m;
			}
			box.innerHTML = n+'-'+y+'-'+d+'&nbsp;'+s+':'+f+':'+m+' '+'星期'+x;
			console.log(m);
		}
			fun();
			setInterval('fun()',1000);
		
	</script>
</body>
</html>	
@endsection
<!-- bodya.style.background = "url('image/tg.jpg')"; -->