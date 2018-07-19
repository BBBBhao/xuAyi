@extends('admin.layout.index')

@section('content')

<!-- @if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<div class="container">              
     <!-- Panels Start -->
  <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>审核用户身份</span>
    </div>
          <div class="mws-panel-body no-padding">
              <form class="mws-form" action="{{ url('/admin/user/'.$id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label">用户状态</label>
                              <div class="mws-form-item">
                                  <input class="radio squared" name="status" @if($ud == 1) 
                                  checked @endif type="radio" value="1">
                                  <span>启用&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                  </label> <label>
                                  <input class="radio squared" name="status" @if($ud == 0) checked @endif type="radio" value="0">
                                  <span>禁用</span>
                              </div>
                         </div>
                         <div class="mws-form-row">
                         @if($users ==1 || $users ==2)
                              <label class="mws-form-label">身份</label>
                              <div class="mws-form-item">
                                <select class="form-control" name="indentity">
                                  <option @if($users == 1) selected @endif value="1">管理员</option>
                                  <option @if($users == 2) selected @endif value="2">普通用户</option>
                                </select>
                              </div>
                          @endif
                        </div>
                      </div>
                    <div class="mws-button-row">
                         <input type="submit" value="修改" class="btn btn-success">
                    </div>
              </form>
          </div>         
     </div>     
<!-- Panels End -->
</div>
@endsection