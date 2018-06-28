<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="javascript://" class="waves-effect">
                    <span class="hide-menu"> {{ Auth::user()->name }}
                        <span class="fa arrow"></span>
                    </span>
                </a>
            </li>

            <li>
                <a href="javascript://" class="waves-effect active">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Racks <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.racks.index') }}">View All</a></li>
                    <li><a href="{{ route('admin.racks.create') }}">Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Books <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.books.index') }}">View All</a></li>
                    <li><a href="{{ route('admin.books.create') }}">Add New</a></li>
                </ul>
            </li>
            
            <li>
                <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Log out</span>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- Left navbar-header end -->