<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@yield('iternal_css')

@section('htmlheader')
    @include('company.layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('company.layouts.partials.mainheader')

    @include('company.layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('company.layouts.partials.contentheader')

        <!-- Content Header (Page header) -->
       {{--     <section class="content-header">
                <h1>
                    @yield('contentheader_title')
                    <small>@yield('contentheader_description')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
                    <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
                </ol>
            </section>--}}

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('company.layouts.partials.controlsidebar')

    @include('company.layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('company.layouts.partials.scripts')
    @yield('inline_script')

@show

</body>
</html>
