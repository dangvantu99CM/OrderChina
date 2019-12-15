<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author">
    <title>QUẢN TRỊ WEBSITE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- jQuery -->
    <script src="{{asset('css/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('css/admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('css/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('css/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
	
	<script src="{{asset('css/admin/js/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('css/admin/js/ckfinder/ckfinder.js')}}"></script>
	<script>
		var baseURL = "{!! url('/') !!}";
	</script>
	<script src="{{asset('css/admin/js/func_ckfinder.js')}}"></script>
	<style>
		table,tr,td,th{
			text-align:center;
			vertical-align: middle !important;
			font-size:14px !important
		}
		.input-message {
			  position: unset;
			  top: 0px;
			  left: 0px;
			  background: #fff;
			  padding: 5px;
			  border-radius: 0px;
			  width: 100% !important;
			  font-size: 14px;
			  box-shadow: 0 0 0px #fff !important;
			  min-height: 20px;
			  display: none;
			  animation: fadeIn .5s;
			  color:red;
		}
		table.dataTable thead .sorting_asc:after {
			content: "" !important;
		}

		table.dataTable thead .sorting_desc:after {
			content: "" !important;
		}

		table.dataTable thead .sorting:after {
			content: "" !important;
		}
		.user::before{
			font-size: 1.4em;
			display: block;
			width: 0;
			height: 0;
			content: '';
			pointer-events: none;
			border-right: 10px solid transparent;
			border-bottom: 10px solid #fff;
			border-left: 10px solid transparent;
			position: absolute;
			top: -.45em;
			right: .97em;
		}
		#wrapper button:hover{
			<!-- box-shadow: 0 4px 5px 0 rgba(20, 156, 137, 0.52), 0 1px 10px 0 rgb(150, 209, 201), 0 2px 4px -1px rgb(141, 206, 197);-->
			
		}
		#wrapper button{
			border: none;
		}
		#wrapper button{
			transition:all .2s;
		}
		.page-header{
			font-family: -webkit-pictograph !important;
			font-weight: 300 !important;
			font-size: 28px;
			margin-top: 0 !important;margin-bottom: 12px !important; 
			padding: 15px 0 !important;
		}
		.order-statistic .StatisticTab button{
			border: 1px solid #ccc;
		}
	</style>
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">QUẢN TRỊ WEBSITE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {!! Auth::user()->name !!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! asset('logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					
						<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.user.getList')}}">Danh sách User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tracking<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.tracking.search')}}">Tìm tracking</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.tracking.getList')}}">Danh sách tracking</a>
                                </li>
								 <li>
                                    <a href="{{route('admin.tracking.add')}}">Thêm tracking</a>
                                </li>
								 <li>
                                    <a href="{{route('admin.order.card')}}">Giỏ hàng</a>
                                </li>
                            </ul>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Hàng hóa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">Hàng thất lạc</a>
                                </li>
                            </ul>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tài chính<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.aconomy.thu_chi')}}">Thu chi tài chính</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.aconomy.don_hang')}}">Tài chính đơn hàng</a>
                                </li>
								<li>
                                    <a href="">Nạp tiền</a>
                                </li>
                            </ul>
                        </li>
						
                        <li>
                            <a href=""><i class="fa fa-cube fa-fw"></i>Đơn hàng <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.order.list')}}">Danh sách đơn hàng</a>
                                </li>
								  <li>
                                    <a href="{{route('admin.order.shop')}}">Danh sách đơn hàng shop</a>
                                </li>
								 <li>
                                    <a href="{{route('admin.order.tracking_order_list')}}">Danh sách tracking theo đơn hàng</a>
                                </li>
								  <li>
                                    <a href="{{route('admin.order.card')}}">Giỏ hàng</a>
                                </li>
                            </ul>
                        </li>
						
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" style = "padding-top: 20px;>
                <div class="row">
                    @include('admin.thongbao')
					@yield('content')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('css/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('css/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    

    
	
    <!-- DataTables JavaScript -->
    <!--<script src="{{asset('css/admin/bower_components/dataTables/media/js/jquery.dataTables.js')}}"></script>-->
    <script src="{{asset('css/admin/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('css/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('css/admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
	<!-- Custom Theme JavaScript -->
    <script src="{{asset('css/admin/dist/js/sb-admin-2.js')}}"></script>
	<script src="{{asset('css/admin/js/myscript.js')}}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>
