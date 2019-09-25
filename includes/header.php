<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
          .header {

	       height: 100px;
           }


            .header h1 {
               position: absolute;
               top: 0%;
               left:30%;
			   font-family:sans-sarif;
			   font-size:50px;
               color: #000;
                
            }
        .header img {
			position: absolute;
               top: 0%;
               left:0%;
  width: 170px;
  height: 126px;
 
}

	</style>

</head>
<body>
 <div class="header">
	<img src="logo/logo.jpg" alt="logo" id="img"/>                       <!-----logo---------------------->
  <h1 >Makkah National Bricks ,Pirojpur</h1>
</div>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard" style="position:absolute;left:8%;top:5%"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  DASHBOARD</a></li>  
		
		
        <li id=""style="position:absolute;left:21%;top:5%"><a href="employee.php"> <i class="glyphicon glyphicon-user"></i> HR MANAGEMENT </a></li> 		
		
		
		<li class="dropdown" id="stock"style="position:absolute;left:36%;top:5%">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></i> ACCOUNT <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="credit.php">  CREDIT  </a></li>    
         <li id="topNavAddOrder"><a href="debit.php"> DEBIT </a></li>    
			<li id="topNavAddOrder"><a href="creditreport.php">  CREDIT REPORT </a></li>  
			<li id="topNavAddOrder"><a href="debitreport.php">  DEBIT REPORT </a></li>
				<li id="topNavAddOrder"><a href="balance.php">  BALANCE REPORT </a></li>
				<li id="topNavAddOrder"><a href="update.php">  DUE REPORT </a></li>
				<li id="topNavAddOrder"><a href="younus.php?o=manord1"> UPDATE DUE  </a></li>
				         
          </ul>
        </li> 		
<!--
		<li class="dropdown" id="stock">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></i> STOCK <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="great.php">  GREAT WALL  </a></li>   
				 <li id="topNavAddOrder"><a href="cbc.php">  CBC  </a></li> 
         <li id="topNavAddOrder"><a href="rfl.php"> RFL</a></li>    
			<li id="topNavAddOrder"><a href="stella.php">  STELLA </a></li>  
			<li id="topNavAddOrder"><a href="gazitank.php">  GAZI TANK </a></li>
				<li id="topNavAddOrder"><a href="gazisink.php">  GAZI SINK </a></li>
				<li id="topNavAddOrder"><a href="bengal.php">  BENGAL </a></li>
				<li id="topNavAddOrder"><a href="tanvirmetal.php">  TANVIR METAL </a></li>
				<li id="topNavAddOrder"><a href="npoly.php">  NPOLY </a></li>
            <li id="topNavOrder"><a href="others.php"> </i>Others</a></li>            
          </ul>
        </li> 		
		
		
		
        
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i> COMPANY</a></li>    -->    

        <li id="navCategories"style="position:absolute;left:47%;top:5%"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> CATEGORY</a></li>        

        <li id="navProduct"style="position:absolute;left:58%;top:5%"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> PRODUCT </a></li>     

        <li class="dropdown" id="navOrder"style="position:absolute;left:69%;top:5%">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> SALES <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> NEW SALES</a></li>    
			<li id="topNavAddOrder"><a href="due.php?o=manord1"> <i class="glyphicon glyphicon-plus"></i> MANAGE DUE</a></li>   
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> MANAGE SALES</a></li>            
          </ul>
        </li> 
		
			

        <li id="navReport"style="position:absolute;left:79%;top:5%"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> REPORT </a></li>

        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-off"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> SETTINGS</a></li>            
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> LOGOUT</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">