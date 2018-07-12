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
        	<span>添加推荐</span>
        </div>
        <div class="mws-panel-body no-padding">

            <form class="mws-form" action="/recom" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">推荐名称</label>
	                    	<div class="mws-form-item">
                            <select class="small" name="cid">
                            @foreach($recom as $k => $v)
                            <option value="{{ $v -> id }}">{{ $v -> gname }}</option>            
                            @endforeach
	                    		</select>

	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">推荐导语</label>
	                    <div class="mws-form-item">
	                    	<input type="text" class="small" name="introduction" value="">
                   		</div>
                    </div>


                     <div class="mws-form-row">
                        <label class="mws-form-label">推荐位置</label>
                        <div class="mws-form-item">
                            <select class="small" name="location">
                            <option value="1">1</option>
                            <option value="2">2</option>            
                            <option value="3">3</option>            
                            </select>
                        </div>
                    </div>

		     	</div>

                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-success">
                    <a href="/recom" class="btn btn-info">返回</a>
                 </div>

            </form>
        </div>    	
    </div>
@endsection