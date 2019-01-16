<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Page Header here')
        <small>@yield('contentheader_description','asds')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">@yield('main_page', 'home')</a></li>
        <li class="active">@yield('here_page', 'home')</li>
    </ol>
</section>