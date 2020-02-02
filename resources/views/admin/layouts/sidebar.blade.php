<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{asset('/admin_assets')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
            </div>
        </div>


        <ul class="sidebar-menu">

            <li >
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-list"></i> <span>{{ trans('لوحة التحكم') }}</span>
                </a>
            </li>

{{--//users--}}
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-users"></i> <span>{{trans('users.admin')}}</span>
            <span class="pull-right-container">

                    </span>
        </a>
        <ul class="treeview-menu" style="">

            <li class=""><a href="{{route('users')}}"><i class="fa fa-eye"></i> {{trans('users.show')}}
                </a></li>
            <li class=""><a href="{{route('users.create')}}"><i class="fa fa-plus"></i> {{trans('users.create')}}
                </a></li>

        </ul>
    </li>
            {{--//users--}}


        </ul>
</section>
<!-- /.sidebar -->
</aside>
