@extends('admin.layouts.app')

@section('htmlheader_title')
    Edit Company
@endsection
@section('contentheader_title','Companies')

@section('contentheader_description','Edit Companies')
@section('main_page','Companies')

@section('here_page','Edit Companies')


@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>Edit Company</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.company.update',$company)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                    @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {!! $error !!}
                                </div>
                    @endforeach
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{$company->name}}" placeholder="name"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">email</label>
                            <div class="col-sm-6">
                                <input id="name" name="email" value="{{$company->email}}" placeholder="email"  class="form-control" type="email">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">website</label>
                            <div class="col-sm-6">
                                <input id="name" name="web" value="{{$company->web}}" placeholder="must contains http:// or https://"  class="form-control" type="website">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">tel</label>
                            <div class="col-sm-6">
                                <input id="name" name="tel" value="{{$company->tel}}" placeholder="+985465465"  class="form-control" type="number">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">token</label>
                            <div class="col-sm-6">
                                <input id="name" name="token" value="{{$company->token}}" placeholder="enter a unique one"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">username</label>
                            <div class="col-sm-6">
                                <input id="name" name="username" value="{{$company->username}}" placeholder="username"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">Password</label>
                            <div class="col-sm-6">
                                <input id="name" name="password" value="" placeholder=""  class="form-control" type="password">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="password_confirmation">password confirmation</label>
                            <div class="col-sm-6">
                                <input id="password_confirmation" name="password_confirmation" value="" placeholder=""  class="form-control" type="password">

                            </div>
                        </div>

                        <button class="btn btn-success" style="width: 100%">Edit</button>

                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection
