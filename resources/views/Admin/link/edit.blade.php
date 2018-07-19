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
        	<span>友情链接修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/link/{{ $link -> id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">链接名称</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="name" value="{{ $link -> name }}">
	                    	</div><br><br>

	                    <label class="mws-form-label">链接地址</label>
	                    	<div class="mws-form-item">
	                    		<input type="text" class="small" name="url" value="{{ $link -> url }}">
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