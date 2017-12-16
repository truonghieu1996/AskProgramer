<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="author" content="Tong Thien Viet Anh" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<title>Ask-Programer</title>
	<link href="<?php echo e(URL::asset('css/app.css')); ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('css/dataTables.bootstrap4.min.css')); ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" type="text/css" rel="stylesheet" /> <?php echo $__env->yieldContent('css'); ?>
	<link href="<?php echo e(URL::asset('css/custom.css')); ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('images/icons/favicon.png')); ?>" rel="shortcut icon">
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark" style="background:#000000;">
			<a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
				<img src="<?php echo e(URL::asset('images/logo.png')); ?>" width="130" height="40" alt="" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
			    aria-expanded="false" aria-label="Điều hướng">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo e(url('/home')); ?>">Home</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if(Auth::guest()): ?>
					<li class="nav-item">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
						</li>
					</li>
					<?php else: ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#tongquan" id="navbarQuanLy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Management</a>
						<div class="dropdown-menu" aria-labelledby="navbarQuanLy">
							<a class="dropdown-item" href="<?php echo e(url('/asks/myasks')); ?>">My ask question</a>
							<?php if(Auth::user()->role == 1): ?>
							<a class="dropdown-item" href="<?php echo e(url('/asks')); ?>">Asks question</a>
							<a class="dropdown-item" href="<?php echo e(url('/categories')); ?>">Categories</a>
							<a class="dropdown-item" href="<?php echo e(url('/users')); ?>">Users</a>
							<?php else: ?> <?php endif; ?>
							<a class="dropdown-item" href="<?php echo e(url('/profile')); ?>">My profile</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#tongquan" id="navbarTaiKhoan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo e(Auth::user()->email); ?></a>
						<div class="dropdown-menu" aria-labelledby="navbarTaiKhoan">
							<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo e(csrf_field()); ?></form>
							<a class="dropdown-item" href="<?php echo e(url('/changepassword')); ?>">
								<i class="fa fa-key" aria-hidden="true"></i>Change password</a>
						</div>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
		<?php echo $__env->yieldContent('content'); ?>
		<hr />
		<footer class="footer">
			<p>&copy; <?php echo e(@date("Y")); ?> Ask-Programer Website ask and question about programing</p>
		</footer>
	</div>
	<script src="<?php echo e(URL::asset('js/popper.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('js/app.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('js/dataTables.bootstrap4.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(URL::asset('js/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#DataList").DataTable({
				"aLengthMenu": [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "All"]
				],
				"iDisplayLength": 25,
				"oLanguage": {
					"sLengthMenu": "Show _MENU_ line",
					"oPaginate": {
						"sFirst": "<i class='fa fa-step-backward' aria-hidden='true'></i>",
						"sLast": "<i class='fa fa-step-forward' aria-hidden='true'></i>",
						"sNext": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
						"sPrevious": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
					},
					"sEmptyTable": "No data",
					"sSearch": "Search:",
					"sZeroRecords": "No data",
					"sInfo": "Show _START_ to _END_ of _TOTAL_ line",
					"sInfoEmpty": "Not found",
					"sInfoFiltered": " (Total _MAX_ line)"
				}
			});

			$("#DataList_wrapper").removeClass("container-fluid");
		});
	</script>
	<?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>