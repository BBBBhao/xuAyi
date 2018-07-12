<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="./bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Admin_/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin_/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin_/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin_/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin_/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin_/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin_/css/themer.css" media="screen">

<title>MWS Admin - Form Layouts</title>


<style type="text/css">
    ul li{
        list-style-type: none;
    }
    div.center {
        text-align: center;
    }
    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }
   
    ul.pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        border-radius: 5px;
        border:1px solid #ccc;
        font-size: 15px;
    }
   
    ul.pagination li a{    
        font-size: 15px;
    }
   
    ul.pagination li a {
        transition: background-color .3s;
    }
   
    ul.pagination li:hover:not(.active) {background-color: darkgray;}
</style> 
</head>

<body>
    <!-- 头部开始 -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo -->
        <div id="mws-logo-container">
            <div id="mws-logo-wrap">
                <img src="/Admin_/images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        <!-- Logo结束 -->

        <!-- 后台用户 -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- 用户头像 -->
                <div id="mws-user-photo">
                    <img src="/Admin_/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- 用户信息 退出登陆-->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        后台用户名
                    </div>
                    <ul>      
                        <li><a href="#">个人中心</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="#">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 头部结束 -->

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- 侧边栏开始 -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            <!-- 用户管理开始 -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/user">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                            <li><a href="form_elements.html">回收站</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- 用户管理结束 -->

            <!-- 分类管理开始 -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">分类列表</a></li>
                            <li><a href="/admin/cates/create">分类添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- 用户管理结束 -->

            <!-- 商品管理开始 -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>分类管理</a>
                        <ul>
                            <li><a href="/admin/goods">商品列表</a></li>
                            <li><a href="/admin/goods/create">商品添加</a></li>
                            <li><a href="/admin/goods/del/show">商品回收站</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- 用户管理结束 -->
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
<div id="mws-themer">
        <div id="mws-themer-content" style="right: 256px;">
            <div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle" class="opened">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
            <div id="mws-theme-presets-container" class="mws-themer-section">
                <label for="mws-theme-presets">Color Presets</label>
            <select id="mws-theme-presets"><option value="0">Default</option><option value="1">Army</option><option value="2">Rocky Mountains</option><option value="3">Chinese Temple</option><option value="4">Boutique</option><option value="5">Toxic</option><option value="6">Aquamarine</option></select></div>
            <div class="mws-themer-separator"></div>
            <div id="mws-theme-pattern-container" class="mws-themer-section">
                <label for="mws-theme-patterns">Background</label>
            <select id="mws-theme-patterns"><option value="0">Paper</option><option value="1">Blueprint</option><option value="2">Bricks</option><option value="3">Carbon</option><option value="4">Circuit</option><option value="5">Holes</option><option value="6">Mozaic</option><option value="7">Roof</option><option value="8">Stripes</option><option value="9">Arches</option><option value="10">Bright Squares</option><option value="11">Brushed Alu</option><option value="12">Circles</option><option value="13">Climpek</option><option value="14">Connect</option><option value="15">Corrugation</option><option value="16">Cubes</option><option value="17">Diagonal Noise</option><option value="18">Diagonal Striped Brick</option><option value="19">Diamonds</option><option value="20">Diamond Upholstery</option><option value="21">Escheresque</option><option value="22">Fabric Plaid</option><option value="23">Furley</option><option value="24">Gplaypattern</option><option value="25">Gradient Squares</option><option value="26">Grey</option><option value="27">Grilled</option><option value="28">Hexellence</option><option value="29">Lghtmesh</option><option value="30">Light Alu</option><option value="31">Light Checkered Tiles</option><option value="32">Light Honeycomb</option><option value="33">Littleknobs</option><option value="34">Nistri</option><option value="35">Noise Lines</option><option value="36">Noise Pattern</option><option value="37">Noisy Grid</option><option value="38">Norwegian Rose</option><option value="39">Pineapplecut</option><option value="40">Pinstripe</option><option value="41">Project Papper</option><option value="42">Ravenna</option><option value="43">Reticular Tissue</option><option value="44">Rockywall</option><option value="45">Roughcloth</option><option value="46">Shattered</option><option value="47">Silver Scales</option><option value="48">Skelatal Weave</option><option value="49">Small Crackle Bright</option><option value="50">Small Tiles</option><option value="51">Square</option><option value="52">Struckaxiom</option><option value="53">Subtle Stripes</option><option value="54">Vichy</option><option value="55">Washi</option><option value="56">Wavecut</option><option value="57">Weave</option><option value="58">Whitey</option><option value="59">White Brick Wall</option><option value="60">White Tiles</option><option value="61">Worn Dots</option></select></div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 50%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 50%;"></a><span class="ui-slider-handle-tooltip ui-state-default" style="display: none; margin-left: -13px; left: 50%;">50</span></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        
    </div>





























        
        
            @if (session('success'))
                <div class="mws-form-message success">
                {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mws-form-message error">
                {{ session('error') }}
                </div>
            @endif
            <!-- 内容开始 -->
            <div class="container">
                @section('content')
                @show
            </div>
            <!-- 内容结束 -->
                       
            <!-- 页脚开始 -->
            <div id="mws-footer">
               lamp_204
            </div>
            <!-- 页脚结束 -->
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin_/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin_/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Admin_/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin_/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin_/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Admin_/jui/jquery-ui.custom.min.js"></script>
    <script src="/Admin_/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Admin_/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/Admin_/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/Admin_/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin_/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/Admin_/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
</html>
