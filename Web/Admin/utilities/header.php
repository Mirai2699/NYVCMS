<?php
include("../../../dbconnection.php");
session_start();
    $type = $_SESSION['UserRole'];
    if(!isset($_SESSION['UserName']) && $type!="1"){
      header('Location: 404.html?err=1');
    }
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>NYVCEMS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="../../../resources/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/css/animate.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/css/style.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="../../../resources/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="../../../resources/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />	
	<link href="../../../resources/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
	<link href="../../../resources/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
	<link href="../../../resources/images/nvyc.png" rel="icon" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../../resources/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>