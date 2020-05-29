<?php
    session_start();
    include "connect_db.php";
    if(empty($_SESSION["role"]) || $_SESSION["role"]==""){
        echo '<script>window.location.href="index.php";</script>';
    }
?>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    </head>
    <body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<?php echo $_SESSION["role"]; ?>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
				<ul class="nav navbar-nav navbar-right">
					<li><a>Welcome <?php echo $_SESSION["fullname"]; ?></a></li>
					<li><a class="btn btn-warning" href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col col-md-3">	
		<?php
		    if($_SESSION["role"]=="Admin"){
	    ?>
			<div class="panel-group" id="accordion">
			    <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="dashboard.php">Dashboard</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="incidencies.php">Incidencies</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="historic.php">Historical</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="admin.php">Admin</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="role.php">Rols</a>
				  </h4>
				</div>
			  </div>
			</div> 
			<?php
		    }else if($_SESSION["role"]=="Teacher"){
	        ?>
	        <div class="panel-group" id="accordion">
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="incidencies.php">Incidencies</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="historic.php">Historical</a>
				  </h4>
				</div>
			  </div>
			</div> 
	        <?php
		    }else if($_SESSION["role"]=="Student"){
	        ?>
	        <div class="panel-group" id="accordion">
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="incidencies.php">Incidencies</a>
				  </h4>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a href="historic.php">Historical</a>
				  </h4>
				</div>
			  </div>
			</div> 
	        <?php
		    }
		    ?>
		    
		</div>
