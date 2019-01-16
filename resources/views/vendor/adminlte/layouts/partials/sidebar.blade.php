<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
{{--
        @if ( !Auth::guard('company'))
--}}
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
{{--
        @endif
--}}

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('operator/') }}"><i class='fa fa-dashboard'></i> <span>DashBoard</span></a></li>
{{--
            <li class="active"><a href="{{ url('operator/conversation') }}"><i class='fa fa-comments-o'></i> <span>Conversations</span></a></li>
--}}

{{--
            <li><a href="#"><i class='fa fa-comments-o'></i> <span>Conversations</span></a></li>
--}}
            <li class="treeview">
                <a style="text-decoration: none;" href="#"><i class='fa fa-comments-o'></i> <span>Conversations</span> <i class="fa fa-angle-left pull-right" style="margin-right: 18%"></i>
                    <span class="pull-right-container">
              <span class="label label-danger pull-right"><span class="counts">0</span></span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('operator/conversation') }}">Active Conversations</a></li>
                    <li><a href="{{ url('operator/conversations') }}">All Conversations</a></li>
                </ul>
            </li>
           {{-- <li class="treeview">
                <a href="#"><i class='fa fa-bank'></i> <span>Departments</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/department')}}">All Departments</a></li>
                    <li><a href="{{url('admin/department/create')}}">Add Departments</a></li>
                </ul>
            </li>--}}
          {{--  <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Operators</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/department')}}">All Operators</a></li>
                    <li><a href="{{url('admin/department/create')}}">Add Operators</a></li>
                </ul>
            </li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
