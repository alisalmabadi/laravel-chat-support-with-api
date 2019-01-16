@extends('adminlte::layouts.app')

@section('htmlheader_title')
	dashboard
@endsection
@section('contentheader_title','Dashboard')

@section('contentheader_description','Dashboard details')
@section('main_page','Dashboard')

@section('here_page','Main page')


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>{{$loader['department_count']}}</h3>

							<p>Department(s)</p>
						</div>
						<div class="icon">
							<i class="fa fa-institution"></i>
						</div>
						<div href="#" class="small-box-footer"><br></div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3>{{$loader['activeconv_count']}}</h3>

							<p>Active Conversation</p>
						</div>
						<div class="icon">
							<i class="fa fa-group"></i>
						</div>
						<div href="#" class="small-box-footer"><br></div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3> {{$loader['messages_count']}}</h3>

							<p>Messages</p>
						</div>
						<div class="icon">
							<i class="fa fa-comments-o"></i>
						</div>
						<div href="#" class="small-box-footer"><br></div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3>{{$loader['conv_count']}}</h3>

							<p>Conversations</p>
						</div>
						<div class="icon">
							<i class="fa fa-commenting"></i>
						</div>
						<div href="#" class="small-box-footer"><br></div>
					</div>
				</div>
				<!-- ./col -->
			</div>
		<div class="row">
		<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-black" style="background: url('{{asset('img/photo1.png')}}') center center;">
					<h3 class="widget-user-username">{{Auth::user()->name}}</h3>
					<h5 class="widget-user-desc">Operator</h5>
				</div>
				<div class="widget-user-image">
					<img class="img-circle" src="{{Gravatar::Get(Auth::user()->email)}}" alt="User Avatar">
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">{{Auth::user()->company->name}}</h5>
								<span class="description-text">Company</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">{{$loader['conv_count']}}</h5>
								<span class="description-text">Conversations</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
							<div class="description-block">
								<h5 class="description-header">{{Auth::user()->email}}</h5>
								<span class="description-text">Email</span>
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
		</div>
		</div>
@endsection
