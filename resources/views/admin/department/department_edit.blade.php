@extends('admin.layouts.app')

@section('htmlheader_title')
    Edit Departments
@endsection
@section('contentheader_title','Departments')

@section('contentheader_description','Edit Departments')
@section('main_page','Departments')

@section('here_page','Edit Companies')



@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>Edit Department</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.department.update',$department)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{$department->name}}" placeholder="name"  class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">description</label>
                            <div class="col-sm-6">
                                <textarea id="name" name="description"  placeholder="{{$department->description}}"  class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="dep-box">
                                <div class="head_department">department Current operators</div>
                                <ul class="correct-dep">
                                    @foreach($department->operators as $operator)
                                        <li class="itemsha">{{$operator->name}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="company">company</label>
                            <div class="col-sm-6">
                                <select name="company" id="company-list" class="form-control">
                                    @foreach($companies as $company)
                                        <option @if($department->company->id == $company->id) {{'selected'}} @endif value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">First of all change the company to load its departments</span>

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="company">operators</label>
                            <div class="col-sm-6">
                                <select name="operator[]" id="result" multiple="multiple" class="form-control">
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

@section('inline_script')
    <script>
        $("#company-list").change(function(){
            //alert('aasd');
            var id = $(this).val();
            var csrf_token=$('meta[name="csrf-token"]').attr('content');
            $.ajax({url: "{{route('admin.loadoperator')}}",method:'post',data: {id:id,_token:csrf_token} ,success: function(data){
                    $('#result').html('');
                    $('#result').html(data.options);

                }
            });
        });


    </script>

@endsection