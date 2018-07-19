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
        	<span>修改配置</span>
        </div>
        <div class="mws-panel-body no-padding">

            <form class="mws-form" action="/config/{{ $config -> id }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
                 {{ method_field('PUT') }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">配置名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="name" value="{{ $config -> name }}">  
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">配置路径</label>
	                    <div class="mws-form-item">
	                    	<input type="text" class="small" name="url" value="{{ $config -> url }}">
                   		</div>
                    </div>


                    <div class="mws-form-row">
                        <label class="mws-form-label">配置备案</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="number" value="{{ $config -> number }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">配置电话</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone" value="{{ $config -> phone }}">
                        </div>
                    </div>


                    <div class="mws-form-row">
                        <label class="mws-form-label">配置版权</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="copyright" value="{{ $config -> copyright }}">
                        </div>
                    </div>


                    <div class="mws-form-row">
                        <label class="mws-form-label">配置描述</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="describe" value="{{ $config -> describe }}">
                        </div>
                    </div>

                   

                    <div class="mws-form-row">
	                    <label class="mws-form-label">配置图片</label>
	                    <div class="mws-form-item">
	                    	<input type="file" class="large" name="logo" value="">
                            
                            <img style="width:180px; height:100px;" src="/uploads/{{ $config -> logo }}">
                   		</div>
                    </div>

		     	</div>

                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success" onclick =" return confirm('是否修改')">
                   <a href="/config" class="btn btn-info">返回</a>
                </div>
            </form>
        </div>    	
    </div>
@endsection