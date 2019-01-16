@extends('admin.layouts.app')

@section('htmlheader_title')
    Edit Oprators
@endsection
@section('contentheader_title','Oprators')

@section('contentheader_description','Edit Operators')
@section('main_page','Operators')

@section('here_page','Edit Operators')


@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>Edit operator</h3>
                </div>
                <div class="panel-body">

                    <form action="{{route('admin.operator.update',$operator)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{$operator->name}}" placeholder="name"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">email</label>
                            <div class="col-sm-6">
                                <input id="name" name="email" value="{{$operator->email}}" placeholder="email"  class="form-control" type="email">

                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="dep-box">
                                <div class="head_department">User Current Departments</div>
                                <ul class="correct-dep">
                                    @foreach($operator->departments as $department)
                                        <li class="itemsha">{{$department->name}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>


                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">username</label>
                            <div class="col-sm-6">
                                <input id="name" name="username" value="{{$operator->username}}" placeholder="any username"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">password</label>
                            <div class="col-sm-6">
                                <input id="name" name="password" value="" placeholder="password"  class="form-control" type="password">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">company</label>
                            <div class="col-sm-6">
                                <select name="company" class="form-control" id="company">
                                    <option value="0">select new company</option>
                                    @foreach($companies as $company)
                                        <option @if($operator->Company->id==$company->id) {{'selected'}}  @endif value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">First of all change the company to load its departments</span>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">Departments</label>
                            <div class="col-sm-6">
                                <select name="department[]" id="result" class="form-control" multiple="multiple">
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success" style="width: 100%">Edit</button>

                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection

@section('inline_script')
    <script>
        $("#company").change(function(){
            var id = $(this).val();
            var csrf_token=$('meta[name="csrf-token"]').attr('content');
            $.ajax({url: "{{route('admin.loadepartment')}}",method:'post',data: {id:id,_token:csrf_token} ,success: function(data){
                    $('#result').html('');
                    $('#result').html(data.options);

                }
            });
        });


    </script>

@endsection

@section('iternal_css')
    <style>
        .head_department {
            background: #ff00004d;
            padding: 5px;
            border-radius: 5px;
        }

        .itemsha {
            list-style: symbols;
        }
    </style>

    @endsection