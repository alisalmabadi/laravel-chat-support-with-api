@extends('admin.layouts.app')

@section('htmlheader_title')
Main Admin Page
@endsection
@section('contentheader_title','Admin Page')

@section('contentheader_description','...')
@section('main_page','Admin')

@section('here_page','Dashboard')



@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
