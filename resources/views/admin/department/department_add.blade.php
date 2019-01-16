@extends('admin.layouts.app')

@section('htmlheader_title')
   Add Departments
@endsection
@section('contentheader_title','Departments')

@section('contentheader_description','Add Departments')
@section('main_page','Departments')

@section('here_page','Add Departments')


@section('main-content')
    <div class="container-fluid spark-screen">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus "></i>ADD department</h3>
                </div>
                <div class="panel-body">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible"> {!! $error !!}</div>
                    @endforeach
                    <form action="{{route('admin.department.store',$department)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                        {{csrf_field()}}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="name "  class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="email">description</label>
                            <div class="col-sm-6">
                                <textarea id="name" name="description"  placeholder="{{old('description')}} "  class="form-control"></textarea>

                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="company">company</label>
                            <div class="col-sm-6">
                                <select name="company" id="company-list" class="form-control">
                                    <option value="0">select one company</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="company">operators</label>
                            <div class="col-sm-6">
                                <select name="operator[]" id="result" multiple class="form-control">
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
        $.ajax({url: "{{route('admin.loadoperator')}}",method:'post',data: {id:id,_token:csrf_token} ,success: function(data){
                $('#result').html('');
                $('#result').html(data.options);

            }
        });
    });


</script>

@endsection
