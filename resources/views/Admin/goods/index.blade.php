@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>商品列表
                            <a href="/admin/goods/del/sellout" class="btn btn-inverse btn-small">已上架</a>
                            <a href="/admin/goods/del/sell" class="btn btn-inverse btn-small">已下架</a>
                        </span>

                    </div>
                  
                    <div class="mws-panel-body no-padding">
                    <form class="form-inline pull-right" action="/admin/goods" method="get">
                <div class="form-group" style="background:#ddd"> 
                    <input type="text" name="search" class="form-control" id="search" placeholder="商品名称">
                    <button type="submit" class="btn btn-success">搜索</button>
                </div> 
            </form>
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>商品名称</th>
                                    <th>所属分类</th>
                                    <th>图片</th>
                                    <th>商品描述</th>
                                    <th>原价</th>
                                    <th>折扣现价</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($goods as $k => $v)
                           {{-- @if(!$v -> deleted_at) --}}
                                <tr>
                                    <td>{{ $v -> id }}</td>
                                    <td>{{ $v -> gname }}</td>
                                    <td>
                                    @foreach($cates as $key => $val)
                                    @if($v -> cid == $val -> id)
                                    {{ $val -> cname }} 
                                    @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <img src="/image/uploads/{{ $v -> pic }}" alt="" style="width:130px;height:80px" >
                                    </td>
                                    <td>{{ $v -> describe }}</td>
                                    <td>{{ $v -> price }}</td>
                                    <td>{{ $v -> discount }}</td>
                                    @if( $v -> state == 1)
                                    <td>已上架</td>
                                    @else
                                    <td>已下架</td>
                                    @endif
                                    <td>
                                    <a href="/admin/goodsdetails/{{ $v -> id }}" class="btn btn-inverse btn-small">详情</a>
                                    {{-- <a href="/admin/goods/{{ $v -> id }}/edit" class="btn btn-info">修改</a> --}}
                                    <!-- <form action="/admin/goods/{{ $v -> id }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确认删除')">
                                    </form> -->
                                    <a href="/admin/goods/del/del/{{ $v -> id }}" onclick="return confirm('确认放入回收站？')" class="btn btn-inverse btn-small">删除</a>   
                               
                                    </td>
                                </tr>
                           {{-- @endif --}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>      
                </div>
                <div class="center">
                    <nav>
                        {!! $goods->appends(['search'=>$search])->render() !!}
                    </nav>
                </div>

@endsection