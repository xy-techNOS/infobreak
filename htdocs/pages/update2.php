<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage News - Update</title>

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
                            Update News
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-7">
											<?php
												// Create connection
												$conn = mysqli_connect('localhost','root','','articleDB');

												// Check connection
												if (!$conn) {
													die("Connection failed: " . mysqli_connect_error());
												}
												$inp0 = $_POST["no"];
												
												$sql = "SELECT * FROM article WHERE no = '$inp0'";
												$result = $conn->query($sql);
												
												if ($result->num_rows > 0) {
													$row = $result->fetch_assoc();
													$inp1 = $row["title"];
													$inp2 = $row["details"];
													
													echo "<form role='form' method='post' action='blank2.php'>";
														echo "<div class='form-group'>";
															echo "<label>Number</label>";
															echo "<input name='no' value='$inp0' class='form-control'><br>";
														echo "</div>";
														echo "<div class='form-group'>";
															echo "<label>Title</label>";
															echo "<input name='title' value='$inp1' class='form-control'><br>";
														echo "</div>";
														echo "<div class='form-group'>";
															echo "<label>Details</label>";
															echo "<textarea name='details' class='form-control' rows='5'>$inp2</textarea>";
														echo "</div>";
												} else {
													echo "No record found";
												}
														
												$conn->close();
											?>
                                </div>
								<!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
									<?php 
									if ($result->num_rows > 0) {
                                        echo "<button type='submit' class='btn btn-default'>Update</button>";
                                        echo " <button type='reset' class='btn btn-default'>Reset</button>";
									}
									else {
										echo "<a href='update.php'><button class='btn btn-default'>Go Back</button></a>";
									}
									?>
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
