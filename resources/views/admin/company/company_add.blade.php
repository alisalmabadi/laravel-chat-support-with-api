@extends('admin.layouts.app')

@section('htmlheader_title')
    Add Companies
@endsection
@section('contentheader_title','Companies')

@section('contentheader_description','Add Companies')
@section('main_page','Companies')

@section('here_page','Add Companies')




@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>Add Company</h3>
                </div>
                @if(isset($message))
                    {{$message}}
                    @endif
                <div class="panel-body">

                    @foreach ($errors->all() as $error)

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {!! $error!!}</div>
                    @endforeach
                    <form action="{{route('admin.company.store',$company)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="name"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">email</label>
                            <div class="col-sm-6">
                                <input id="name" name="email" value="{{old('email')}}" placeholder="email"  class="form-control" type="email">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">website</label>
                            <div class="col-sm-6">
                                <input id="name" name="web" value="{{old('web')}}" placeholder="must contains http:// or https://"  class="form-control" type="website">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">tel</label>
                            <div class="col-sm-6">
                                <input id="name" name="tel" value="{{old('tel')}}" placeholder="phone"  class="form-control" type="number">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="token">token</label>
                            <div class="col-sm-6">
                                <input id="token" name="token" value="{{old('token')}}" placeholder="enter a special token number"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">username</label>
                            <div class="col-sm-6">
                                <input id="name" name="username" value="{{old('username')}}" placeholder="username"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="password">password</label>
                            <div class="col-sm-6">
                                <input id="name" name="password"  class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">password confirmation</label>
                            <div class="col-sm-6">
                                <input id="name" name="password_confirmation"  class="form-control" type="password">
                            </div>
                        </div>
                        <button class="btn btn-success" style="width: 100%">Add</button>

                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection
