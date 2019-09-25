<?php require_once 'includes/header.php';
      require_once 'php_action/db_connect.php';
 ?>

<script src="angular.min.js"></script>
<div class="row" ng-app='myapp' ng-controller="userCtrl">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">HR MANAGEMENT</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Employee</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body" >

				<div class="remove-messages"></div>
				<div class="div-action pull pull-left" style="padding-bottom:20px;">
                 <input  type="text" ng-model="search"  placeholder="Enter some text to search" />
			</div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button type="button" class="btn btn-default button1" data-toggle="modal"  data-target="#exampleModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Employee </button>
	
                  
<!-- Modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-plus-sign"></i>Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:500px">
	  <!--
	                   <form method="POST" action="" enctype="multipart/form-data">
	                  <label style="position:absolute;top:3%;left:10%">Image:</label><input type="file" id='txt_img' ng-model='img'style="position:absolute;top:4%;right:60px"/>
	              <input type="submit"  value="submit" />         -->              <!-- pic -->
<!-- 
	</form>
	-->
	                     
        					<div class="form-group">
	        	<label for="date" class="col-sm-3 control-label" style="position:absolute;top:15%;left:11%"> Name:</label> 
	        	
				    <div class="col-sm-8" style="position:absolute;top:14%;right:8%">
				      <input type="text" class="form-control"   ng-model='name' >   <!-- date -->	
				    </div>
	        </div> 
			<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:31%;left:7%">Join Date: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:30%;right:8%">
						      <input  type="date" class="form-control"  ng-model='dat' >
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:45%;left:4%"> Designation: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:44%;right:8%">
						      <input  type="text" class="form-control"  ng-model='deg'  >
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:60%;left:9%"> Contact: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:59%;right:8%">
						      <input  type="text" class="form-control"   ng-model='con' ">
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:74%;left:5%"> Department: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:73%;right:8%">
						      <input  type="text" class="form-control"  ng-model='dep'>
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:88%;left:2%">Starting Salary: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:87%;right:8%">
						      <input  type="text" class="form-control"  ng-model='sal'  >
						    </div>
			        </div>
					
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<td>&nbsp;</td>
        <input type="button" class="btn btn-primary"id='but_save' value='Save' ng-click="add()">
      </div>
    </div>
  </div>
</div>
</div> <!-- /div-action -->			
<!-- Modal  update-->
<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>Update Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:500px">
	  <!--
	                   <form method="POST" action="" enctype="multipart/form-data">
	                  <label style="position:absolute;top:3%;left:10%">Image:</label><input type="file" id='txt_img' ng-model='img'style="position:absolute;top:4%;right:60px"/>
	              <input type="submit"  value="submit" />         -->              <!-- pic -->
<!-- 
	</form>
	-->
	                     
        					<div class="form-group">
	        	<label for="date" class="col-sm-3 control-label" style="position:absolute;top:15%;left:11%"> Name:</label> 
	        	
				    <div class="col-sm-8" style="position:absolute;top:14%;right:8%">
				      <input type="text" class="form-control"   ng-model='name' >   <!-- date -->	
				    </div>
	        </div> 
			<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:31%;left:7%">Join Date: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:30%;right:8%">
						      <input  type="date" class="form-control"  ng-model='dat' >
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:45%;left:4%"> Designation: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:44%;right:8%">
						      <input  type="text" class="form-control"  ng-model='deg'  >
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:60%;left:9%"> Contact: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:59%;right:8%">
						      <input  type="text" class="form-control"   ng-model='con' ">
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:74%;left:5%"> Department: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:73%;right:8%">
						      <input  type="text" class="form-control"  ng-model='dep'>
						    </div>
			        </div>
					<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"style="position:absolute;top:88%;left:2%">Starting Salary: </label>
			        	
						    <div class="col-sm-8" style="position:absolute;top:87%;right:8%">
						      <input  type="text" class="form-control"  ng-model='sal'  >
						    </div>
			        </div>
					
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<td>&nbsp;</td>
        <input type="button" class="btn btn-primary"id='but_save' value='Update' ng-click="add()">
      </div>
    </div>
  </div>
</div>
</div> <!-- /div-action -->			
				
				
				<!-- /table -->
				<table class="table" >
					<thead>
						<tr>
							<!-- <th style="width:10%;">Photo</th>	-->						
							<th>Employee Name</th>
							<th>Join Date</th>							
							<th>Designation</th>
							<th>Contact</th>
							<th>Department</th>
							<th>Salary</th>
							<th style="width:15%;">Delete</th>
							
						</tr>
					</thead>
					 <tr ng-repeat="emp in employee | filter : search">
              <!--   <td><img src={{user.img}}></td> -->
			    <td>{{emp.name}}</td>
                <td>{{emp.Join_dt}}</td>
				<td>{{emp.desig}}</td>
                <td>{{emp.contact}}</td>
                <td>{{emp.dep}}</td>
				<td>{{emp.salary}}</td>
                <td><input type='button' class="btn btn-danger" ng-click='remove($index,emp.id);' value='Delete'></td>
                
                </tr>
				</table>
				
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add employee -->

<!-- Script -->
        <script>
        var fetch = angular.module('myapp', []);

        fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

            // Get all records
            $http({
                method: 'post',
                url: 'emp_con.php',
                data: {request_type:1},

            }).then(function successCallback(response) {
                $scope.employee = response.data;
            });

            // Add new record
            $scope.add = function(){

                var len = $scope.employee.length;
                $http({
                method: 'post',
                url: 'emp_con.php',
                data: {name:$scope.name,deg:$scope.deg,con:$scope.con,dep:$scope.dep,sal:$scope.sal,dat:$scope.dat,request_type:2,len:len},
                }).then(function successCallback(response) {
                    if(response.data.length > 0)
                        $scope.employee.push(response.data[0]);
                    else
                        alert('Record not inserted.');
                });
            }

            // Delete record
            $scope.remove = function(index,u_id){
               
                $http({
                method: 'post',
                url: 'emp_con.php',
                data: {u_id:u_id,request_type:3},
                }).then(function successCallback(response) {
                    if(response.data == 1)
                        $scope.employee.splice(index, 1);
                    else
                        alert('Record not deleted.');
                }); 
            }
            
        }]);

        </script>
<script src="jquery-3.4.1.min.js"></script>

<?php require_once 'includes/footer.php'; ?>