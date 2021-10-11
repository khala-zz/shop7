@extends('admin.admin')
@section('title')
<title>Menu</title>
@endsection
@section('css')
<link href="{{ asset('admins/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('admins/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{asset('admins/css/pages/footable-page.css')}}" rel="stylesheet">
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->
    @include('admin.content-header',['name' => 'Menu','key' => 'Danh sách','link' => 'menu.create',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Menu</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên menu</th>
                                    <th>Tên menu cha</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $menu)
                                <?php
                                    $parent_menus = DB::table('menus')->select('name')->where('id',$menu->parent_id)->get();
                                ?>
                                <tr>
                                    <td>{{ $menu -> id}}</td>
                                    <td>
                                        {{ $menu -> name}}
                                    </td>
                                    <td> 
                                        @foreach($parent_menus as $parent_menu)
                                            {{$parent_menu->name}}
                                        @endforeach
                                    </td>
                                    <td>{{ $menu -> created_at -> diffForHumans()}}</td>
                                    <td><span class="label {{ $menu -> status ==1?'label-success':'label-inverse' }}">{{ $menu -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    <td>
                                        <a href="{{ route('menu.edit',['id' => $menu -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('menu.delete',['id' => $menu -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $menus -> links() }} 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4 ">
                       {{ $menus -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('menu.create') }}"  class="btn btn-info btn-rounded" >Thêm Menu</a>
                   </div> 
                   
                   
               </div>
            </div>

        </div>
    </div>
    
</div>
                                   

@endsection

@section('js')

<script src="{{asset('admins/js/footable.all.min.js')}}"></script>
<script src="{{asset('admins/js/pages/footable-init.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('admins/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admins/js/jquery.sweet-alert.custom.js')}}"></script>
    
@endsection