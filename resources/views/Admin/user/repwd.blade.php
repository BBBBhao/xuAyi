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
               <span>修改密码</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form class="mws-form" action="/admin/dopass" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label">原密码</label>
                              <div class="mws-form-item">
                                   <input type="password" class="small" name="password" placeholder="您的原密码" required value="">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">新密码</label>
                              <div class="mws-form-item">
                                   <input type="password" class="small" name="newpwd" placeholder="你的新密码" required value="">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">确认密码</label>
                              <div class="mws-form-item">
                                   <input type="password" class="small" name="renewpwd"  placeholder="确认密码" required value="">
                              </div>
                         </div>
                    </div>
                    <div class="mws-button-row">
                         <input type="submit" value="确认修改" class="btn btn-success">
                    </div>
               </form>
          </div>         
     </div>     
<!-- Panels End -->
</div>
@endsection