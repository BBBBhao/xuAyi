<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

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
                <!-- <div id="mws-user-photo">
                </div> -->
                
                <!-- 用户信息 退出登陆-->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        {{ session('user')['uname'] }}
                    </div>
                    <ul>      
                        <li><a href="/admin/info">修改个人信息</a></li>
                        <li><a href="/admin/pass">修改密码</a></li>
                        <li><a href="/admin/quit">退出登录</a></li>
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
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
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
