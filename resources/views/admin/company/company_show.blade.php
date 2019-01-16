@extends('admin.layouts.app')

@section('htmlheader_title')
    Show Company Details
@endsection
@section('contentheader_title','Companies')

@section('contentheader_description','Show Company')
@section('main_page','Companies')

@section('here_page','Show Company')


@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Company Name: {{$company->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="">
                    <div class="department">
                        <h3 class="box-title">Departments:</h3>

                        <ul>
                            @foreach($company->departments as $department)
                            <li>{{$department->name}}</li>
                             @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-body" style="">
                    <div class="department">
                        <h3 class="box-title">Operators:</h3>
                    @foreach($company->Opertors as $opertor)
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                    <h3 class="widget-user-username">{{$opertor->name}}</h3>
                                    <h5 class="widget-user-desc">{{$opertor ->description}}</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle" src="{{Gravatar::get($opertor->email)}}" alt="User Avatar">
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header"></h5>
                                                <span class="description-text"></span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">{{$opertor->username}}</h5>
                                                <span class="description-text">Username</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header"></h5>
                                                <span class="description-text"></span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="box-footer" style="">

                </div>
                <!-- /.box-footer-->
            </div>

        </section>

    </div>
@endsection
