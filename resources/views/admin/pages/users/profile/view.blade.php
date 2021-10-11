@extends('admin.layout.app')

@section('title', ' | My Profile')

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
            <h1>
                Trang cá nhân
            </h1>
            @if(user_can('edit_profile'))
            <a href="{{ url('khalaadmin/my-profile/edit') }}" title="Edit profile"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
            @endif
        </div>
    </div>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Thông tin chi tiết</strong></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                                @if(!empty($user->image))
                                <tr>
                                    <td>
                                        <img src="{{ url('uploads/users/' . $user->image) }}" class="pull-right" width="200" height="200" />
                                    </td>
                                </tr>
                                @endif

                                <tr><th> Tên </th><td> {{ $user->name }} </td>
                                </tr><tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                

                            </tbody>
                        </table>

                        <hr/>

                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection