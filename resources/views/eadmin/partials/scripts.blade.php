<!-- jQuery -->
<script src="{{ asset('public/eadmin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('public/eadmin/material/bootstrap/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('public/eadmin/material/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>

<!-- Menu Plugin JavaScript -->
<script src="{{ asset('public/eadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<!--slimscroll JavaScript -->
<script src="{{ asset('public/eadmin/material/js/jquery.slimscroll.js') }}"></script>

<!--Wave Effects -->
<script src="{{ asset('public/eadmin/material/js/waves.js') }}"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset('public/eadmin/plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

<!--Counter js -->
<script src="{{ asset('public/eadmin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
<!--Morris JavaScript -->
<script src="{{ asset('public/eadmin/plugins/bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/morrisjs/morris.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/eadmin/material/js/custom.min.js') }}"></script>

<!-- Editable -->
<script src="{{ asset('public/eadmin/plugins/bower_components/jsgrid/db.js') }}"></script>

@isset($racks)
<script type="text/javascript">
	db.racks = {!! $racks !!};	
</script>
@endisset

@isset($books)
<script type="text/javascript">
	book.data = {!! $books !!};	
</script>
@endisset

@isset($menuCategories)
<script type="text/javascript">
	menuCategories.data = {!! $menuCategories !!};	
</script>
@endisset

@isset($menuItems)
<script type="text/javascript">
	menuItems.data = {!! $menuItems !!};	
</script>
@endisset

@isset($noots)
<script type="text/javascript">
	noots.data = {!! $noots !!};	
</script>
@endisset

<script type="text/javascript" src="{{ asset('public/eadmin/plugins/bower_components/jsgrid/dist/jsgrid.min.js') }}"></script>

<script src="{{ asset('public/eadmin/material/js/jsgrid-init.js') }}"></script>


<!-- Sparkline chart JavaScript -->
<script src="{{ asset('public/eadmin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js') }}"></script>
<script src="{{ asset('public/eadmin/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>

@if ( request()->path()=='dashboard' || request()->path()=='restaurant/dashboard' )

	<script src="{{ asset('public/eadmin/material/js/dashboard1.js') }}"></script>

    <script type="text/javascript">
		$(document).ready(function() {
		    $.toast({
		        heading: 'Welcome to BellyKick Admin Portal',
		        text: 'What would you like to see today?',
		        position: 'top-right',
		        loaderBg: '#ff6849',
		        icon: 'info',
		        hideAfter: 3500,

		        stack: 6
		    })
		});
	</script>
@endif


<!--Style Switcher -->
{{-- <script src="{{ asset('public/eadmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script> --}}

<script src="{{ asset('public/js/custom.js') }}"></script>