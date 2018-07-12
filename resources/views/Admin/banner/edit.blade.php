@extends('admin.layout.index')

@section('content')

@if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
	<div class="mws-panel grid_8">
		<div class="mws-panel-header">
        	<span>修改轮播</span>
        </div>
        <div class="mws-panel-body no-padding">

            <form class="mws-form" action="/shuffling/{{ $shuffling -> id }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
                 {{ method_field('PUT') }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">轮播名称</label>
	                    	<div class="mws-form-item">
                                
	                    		<input type="text" class="small" name="name" value="{{ $shuffling -> name }}">
                               
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">轮播路径</label>
	                    <div class="mws-form-item">
                            
	                    	<input type="text" class="small" name="banner_url" value="{{ $shuffling -> banner_url }}">
                            
                   		</div>
                    </div>

                    <div class="mws-form-row">
	                    <label class="mws-form-label">轮播状态</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="status">
	                    	<option value="">0 (开启)</option>
	                     	<option value="">1 (关闭)</option>         	
	                    	</select>
                   		</div>
                    </div>

                    <div class="mws-form-row">
	                    <label class="mws-form-label">轮播图片</label>
	                    <div class="mws-form-item">
	                    	<input type="file" class="large" name="picture" value="">
                            
                            <img style="" src="/uploads/{{ $shuffling -> picture }}">
                           

                   		</div>
                    </div>

		     	</div>

                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success" onclick =" return confirm('是否修改')">
                   <a href="/shuffling" class="btn btn-info">返回</a>
                </div>
            </form>
        </div>    	
    </div>
@endsection