<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage News - Remove</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.php">InfoBreak Admin</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Manage News<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add.php">Add</a>
                                </li>
                                <li>
                                    <a href="update.php">Update</a>
                                </li>
                                <li>
                                    <a href="remove.php">Remove</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Remove News
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-7">
										<div class="panel-body">
                                    <form role="form" method="post" action="blank3.php">
											<div class="table-responsive">
											<?php
												// Create connection
												$conn = mysql_connect('localhost','root','');
												mysql_select_db("articleDB", $conn);

												// Check connection
												if (!$conn) {
													die("Connection failed: " . mysql_connect_error());
												}
												$result = mysql_query("SELECT * FROM article");
												
												echo "<table class='table table-striped table-bordered table-hover'>";
													echo "<thead>";	
														echo "<tr>";
															echo "<th>#</th>";
															echo "<th>Number</th>";
															echo "<th>Title</th>";
															echo "<th>Details</th>";
														echo "</tr>";
													echo "</thead>";
													echo "<tbody>";
													if (count($result) > 0) {
														// output data of each row
														while($row = mysql_fetch_array($result)) {
															echo "<tr>";
																echo "<td>1</td>";
																echo "<td>" . $row["no"]. "</td>";
																echo "<td>" . $row["title"]. "</td>";
																echo "<td>" . $row["details"]. "</td>";
															echo "</tr>";
														}
													} else {
														echo "0 results";
													}
													echo "</tbody>";
												echo "</table>";
											?>
											</div>
											<!-- /.table-responsive -->
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input name="no" class="form-control" placeholder="Enter number"><br>
                                        </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                        <div class="panel-footer">
                                        <button type="submit" class="btn btn-default">Remove</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                                    </form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
