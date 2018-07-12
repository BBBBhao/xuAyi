@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> Default Data Table</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
			<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <tr role="row">
                    <th class="sorting_asc"  style="width: 119px;">Id</th>
                    <th class="sorting" style="width: 160px;">Browser</th>
                    <th class="sorting" style="width: 146px;">Platform(s)</th>
                    <th class="sorting" style="width: 102px;">Engine version</th>
                    <th class="sorting" style="width: 73px;">CSS grade</th></tr>
                          
                    <tr class="odd">
                    <td class="  sorting_1">Gecko</td>
                    <td class=" ">Firefox 1.0</td>
                    <td class=" ">Win 98+ / OSX.2+</td>
                    <td class=" ">1.7</td>
                    <td class=" ">A</td>
                </tr>
            </table>
		</div>
        <span><i class="icon-table"></i>用户列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="form-inline pull-right" action="/admin/user" method="get" enctype="multipart/form-data">
            <div class="form-group" style="background:#ddd" >
               
                <input type="text" name="search" class="form-control" id="username" placeholder="姓名">
                <button type="submit" class="btn btn-success">搜索</button>
            </div> 
        </form>
            <table class="mws-table table-hover">
                <thead>
                    <tr class="active">
                        <th>ID</th>
                        <th>头像</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>地址</th>
                        <th>身份</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody style="text-align:center">
                @foreach($res as $k => $v)
                    <tr>
                        <td>{{ $v -> uid }}</td>
                        <td><img src="/uploads/{{ $v -> userdetails -> face }}" onerror="this.src='/uploads/27.jpg';" width="50" height="50"></td>
                        <td>{{ $v -> uname }}</td>
                        <td>{{ $v -> userdetails -> tel }}</td>
                        <td>{{ $v -> userdetails -> addr }}</td>
                        @if($v['identity'] == 1)
                            <td class="no-overflow">管理员</td>
                        @elseif($v['identity'] == 2)
                            <td class="no-overflow">普通用户</td>
                        @else($v['identity'] == 3)
                            <td class="no-overflow">普通用户(未审核)</td>
                        @endif

                        @if( $v -> userdetails ->status == 1)
                            <td class="no-overflow">启用</td>
                        @else
                            <td class="no-overflow">禁用</td>
                        @endif
                        <td class="no-overflow"> 
                            <a href="{{ url('admin/user/'.$v->uid.'/edit') }}" class="btn btn-oval btn-danger">审核</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="center">
                <ul class="pagination">
                    <li>{!! $res ->appends(['search'=> $search])->render() !!}</li>
                </ul>   
            </div>

   	</div>
</div>
@endsection