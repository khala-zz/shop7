@extends('admin.layout.app')

@section('title', ' | Dashboard')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

        @if(\Auth::user()->is_super_admin == 1)
            <!-- Small boxes (Stat box) -->
            <div class="row">

                @if(count(getCategories()) > 0)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ count(getCategories()) }}</h3>
j
                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('khalaadmin/categories') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endif

                @if(count(getProducts()) > 0)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{count(getProducts())}}</h3>

                                <p>Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ url('khalaadmin/products') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endif

                
            </div>

            

        @else

            <div class="row">
                @if(user_can("list_products"))

                    @if(count(getProducts()) > 0)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ count(getProducts()) }}</h3>

                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('khalaadmin/products') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endif

                @endif
            </div>

            

        @endif

    </section>



@stop