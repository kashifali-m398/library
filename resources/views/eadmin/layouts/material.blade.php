<!DOCTYPE html>
<html lang="en">

@include('eadmin.partials.head')

<body>
    @include('eadmin.partials.preloader')
    <div id="wrapper">
        <!-- Navigation -->
        @if( Auth::user()->role=='admin' )
            @include('eadmin.partials.nav')
        @elseif( Auth::user()->role=='r_admin' )
            @include('eadmin.partials.restaurant.nav')
        @endif

        <!-- Left navbar-header -->
        @if( Auth::user()->role=='admin' )
            @include('eadmin.partials.left-nav')
        @elseif( Auth::user()->role=='r_admin' )
            @include('eadmin.partials.restaurant.left-nav')
        @endif
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                @if ($errors->any())
                    <div class="panel panel-danger">
                        <div class="panel-heading"> Whoops!
                            <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            @include('eadmin.partials.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('eadmin.partials.scripts')
</body>

</html>
