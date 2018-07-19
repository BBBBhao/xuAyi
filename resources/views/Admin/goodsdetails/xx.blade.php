@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8" style="">
                    <div class="mws-panel-header">
                        <span>商品详情</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="form_layouts.html">
                            <div class="mws-form-block">
                                <div class="mws-form-row" style="width:80">
                                    <label class="mws-form-label">商品名称</label>
                                    <div class="mws-form-item">
                                        <input type="text" class=""  value="{{ $goodsdetails -> goods_details -> gname }}" style="overflow:hidden;">
                                    </div>
                                </div>
                             
                                <div class="mws-form-row" style="width:200px">
                                    <label class="mws-form-label">商品列表展示图</label>
                                    <div id="mws-crop-parent" class="thumbnail">
                                        <img src="/image/uploads/{{ $goodsdetails -> goods_details -> pic }}" class="mws-crop-target" alt="Crop">
                                    </div>
                                </div>
                             
                                 <div class="mws-form-row" style="width:80">
                                    <label class="mws-form-label">商品详情描述</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small"  value="{!! $goodsdetails -> description !!}">
                                    </div>
                                </div>

                                 <div class="mws-form-row" style="width:80">
                                    <label class="mws-form-label">商品参数</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small"  value="{{ $goodsdetails -> type }}">
                                    </div>
                                </div>

                                <div class="mws-form-row" style="width:80">
                                    <label class="mws-form-label">商品颜色</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small"  value="{{ $goodsdetails -> color }}">
                                    </div>
                                </div>

                                <div class="mws-form-row" style="width:80">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item">
                                    @if($goodsdetails -> goods_details -> state == 1)
                                        <input type="text" class=""  value="已上架">
                                    @else
                                        <input type="text" class=""  value="已下架">
                                    @endif
                                    </div>
                                </div>
                            </div>
                           
                        </form>
                        <a href="/admin/goodsdetails/{{ $goodsdetails -> id }}/edit" class="btn btn-info">去修改</a>
                    </div>
                </div>
    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-pictures"></i> 商品详情展示图</span>
                    </div>
                    <div class="mws-panel-body">
                        <ul class="thumbnails mws-gallery">
                        @foreach($goodsimages as $k => $v)
                            <li>
                                <span class="thumbnail"><img src="/image/uploads/{{ $v -> images }}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="/admin/goodsimages/{{ $v -> id }}/edit" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                    
                                    <form action="/admin/goodsimages/{{ $v -> id }}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button value="删除" class="mws-gallery-btn"><i class="icon-trash"></i></button>
                                    </form>
                                </span>
                            </li>
                         @endforeach  
                        </ul>
                    </div>
                </div>
   
    <div class="center">
    	<nav>
           
        </nav>
    </div>

@endsection