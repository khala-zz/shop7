@extends('admin.layout.app')

@section('title', ' | Show permission')

@section('content')

    <section class="content-header">
        <h1>
            Phân Quyền #{{ $permission->id }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/permissions') }}">Phân Quyền</a></li>
            <li class="active">Hiển thị</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/khalaadmin/permissions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $permission->id }}</td>
                                    </tr>
                                    <tr><th> Tên </th><td> {{ $permission->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection