@extends('admin.layout.index')

@section('content')


@if (count($errors) > 0)

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
        	<span>添加分类</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/cates/{{ $cate -> id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">分类名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="cname" value="{{ $cate -> cname }}">
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">所属分类</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="pid">
	                    	<option value="0">--- 默认一级分类 ---</option>
	                    	@foreach($cates as $key => $val)
                            <option value="{{ $val -> id }}" {{ $val -> id == $cate -> pid ? 'selected' : '' }}>{{ $val-> cname }}</option>
                            @endforeach
	                    	</select>
                   		</div>
                    </div>
		     	</div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">
                </div>
            </form>
        </div>    	
    </div>
@endsection