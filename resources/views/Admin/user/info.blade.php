@extends('admin.layout.index')

@section('content')
<div class="container">              
     <!-- Panels Start -->
     <div class="mws-panel grid_8">
          @if(count($errors) > 0)
               <div class="alert alert-danger" id="error">
                   <ul>
                       @foreach($errors -> all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
          @endif
          <div class="mws-panel-header">
               <span>修改信息</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form class="mws-form" action="/admin/doinfo" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label">登录名</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" readonly value="{{ session('user')['uname'] }}     (登陆账号 | 不可修改)">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">用户名</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" readonly value="{{ $face -> username }}     (用户名 | 不可修改)">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">昵称</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" name="nickname" placeholder="您的昵称" required value="{{ $face -> nickname }}">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">电话</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" name="tel" placeholder="您的手机号码" required value="{{ $face -> tel }}">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">邮箱</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" name="email" placeholder="您的邮箱" required value="{{ $face -> email }}">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">地址</label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" name="addr"  placeholder="您的地址" required value="{{ $face -> addr }}">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">头像</label>
                              <div class="mws-form-item">
                                    <input type="file" name="face" value="">
                                    <img src="/uploads/{{ $face -> face }}" width="60px" height="60px" onerror="this.src='/uploads/userspic.jpg';"> 
                              </div>
                         </div>
                    </div>
                    <div class="mws-button-row">
                         <input type="submit" value="提交" class="btn btn-success">
                         <input type="reset" value="重置" class="btn btn-danger">
                    </div>
               </form>
          </div>         
     </div>     
<!-- Panels End -->
</div>
@endsection