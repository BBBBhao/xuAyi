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
        	<span>修改推荐</span>
        </div>
        <div class="mws-panel-body no-padding">

            <form class="mws-form" action="/recom/{{ $recom -> id }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
                 {{ method_field('PUT') }}
                <div class="mws-form-inline">
	                <div class="mws-form-row">
		                <label class="mws-form-label">推荐名称</label>
	                    	<div class="mws-form-item">
                                <input type="" class="small" value="{{$recom -> goodrecommend  -> gname}}">    
                         
                          
	                    	</div>
                    </div>
                    			
                    <div class="mws-form-row">
	                    <label class="mws-form-label">推荐导语</label>
	                    <div class="mws-form-item">
                            
	                    	<input type="text" class="small" name="introduction" value="{{ $recom -> introduction }}">
                            
                   		</div>
                    </div>

                    <div class="mws-form-row">
	                    <label class="mws-form-label">推荐位置</label>
	                    <div class="mws-form-item">
	                    	<select class="small" name="location">
                            <option value="1">1 (左边开始)</option>
                            <option value="2">2 (左边开始)</option>            
                            <option value="3">3 (左边开始)</option>            
                            </select>
                   		</div>
                    </div>

                    

		     	</div>

                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success" onclick =" return confirm('是否修改')">
                    <a href="/recom" class="btn btn-info">返回</a>
                </div>
            </form>
        </div>    	
    </div>
@endsection