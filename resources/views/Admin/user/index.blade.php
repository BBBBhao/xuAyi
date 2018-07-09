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
   	</div>
</div>
@endsection