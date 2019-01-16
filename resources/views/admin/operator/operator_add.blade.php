@extends('admin.layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('contentheader_title','Add Operator')

@section('contentheader_description')
    adding opretors
@endsection
@section('main_page','Oprators')

@section('here_page','Add Oprators')

@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>ADD operator</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.operator.store',$operator)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible"> {!! $error !!}</div>
                        @endforeach
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="name "  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">email</label>
                            <div class="col-sm-6">
                                <input id="name" name="email" value="{{old('email')}}" placeholder="email "  class="form-control" type="email">

                            </div>
                        </div>


                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">username</label>
                            <div class="col-sm-6">
                                <input id="name" name="username" value="{{old('username')}}" placeholder="username "  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">password</label>
                            <div class="col-sm-6">
                                <input id="name" name="password" value="" placeholder="password "  class="form-control" type="password">

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">password confirmation</label>
                            <div class="col-sm-6">
                                <input id="name" name="password_confirmation"  class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">company</label>
                            <div class="col-sm-6">
<select name="company" id="company-list" class="form-control">
    <option value="0">select your favourite company</option>
@foreach($companies as $company)
    <option value="{{$company->id}}">{{$company->name}}</option>
    @endforeach
</select>
                            </div>
                        </div>
                      {{--  <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">company</label>
                            <div class="col-sm-6">
                                <select name="department[]" class="form-control" multiple="multiple">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                          <div class="form-group required">
                            <label class="col-sm-2 control-label" for="tel">Department</label>
                            <div class="col-sm-6">
                                <select name="department[]" class="form-control" id="result" multiple="multiple">
                                </select>

                            </div>
                        </div>

                        <button class="btn btn-success" style="width: 100%">Add</button>

                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection
@section('inline_script')
<script>
    $("#company-list").change(function(){
        //alert('aasd');
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
