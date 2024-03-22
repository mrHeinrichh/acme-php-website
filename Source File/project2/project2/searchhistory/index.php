<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <title>AngularJS CRUD with Search, Sort and Pagination</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body ng-controller="memberdata" ng-init="fetch()">
<div class="container">
    <h1 class="page-header text-center">Track your pet's Consultation History.</h1>
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-success text-center" ng-show="success">
				<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-check"></i> {{ successMessage }}
			</div>
			<div class="alert alert-danger text-center" ng-show="error">
				<button type="button" class="close" ng-lick="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-warning"></i> {{ errorMessage }}
			</div>
			<div class="row">
				<div class="col-md-12">
					<span class="pull-right">
						<input type="text" ng-model="search" class="form-control" placeholder="Search Pet's Name or Owner's Name">
					</span>
				</div>
			</div>
			<table class="table table-bordered table-striped" style="margin-top:10px;">
				<thead>
                    <tr>
                        <th ng-click="sort('ownername')" class="text-center">Owner Name
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='ownername'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='ownername'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                        </th>
                        <th ng-click="sort('petname')" class="text-center">Pet's Name
	                        <span class="pull-right">
	                       		<i class="fa fa-sort gray" ng-show="sortKey!='petname'"></i>
	                       		<i class="fa fa-sort" ng-show="sortKey=='petname'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
	                       	</span>
                        </th>
                        <th ng-click="sort('gender')" class="text-center">Pet's Gender
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='gender'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='gender'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th ng-click="sort('conditionz')" class="text-center">Pet's condition
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='conditionz'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='conditionz'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th ng-click="sort('email')" class="text-center">Owner's Email
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='email'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='email'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th ng-click="sort('contact')" class="text-center">Owner's Contact
                       			<i class="fa fa-sort gray" ng-show="sortKey!='contact'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='contact'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th ng-click="sort('consult_date')" class="text-center">Consultation Date
                       			<i class="fa fa-sort gray" ng-show="sortKey!='consult_date'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='consult_date'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       	<th ng-click="sort('comment')" class="text-center">Vet's Comment
                       			<i class="fa fa-sort gray" ng-show="sortKey!='comment'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='comment'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>


                    </tr>
                </thead>
				<tbody>
					<tr dir-paginate="member in members|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
						<td>{{ member.ownername }}</td>
						<td>{{ member.petname }}</td>
						<td>{{ member.gender }}</td>
						<td>{{ member.conditionz }}</td>
						<td>{{ member.email }}</td>
						<td>{{ member.contact }}</td>
						<td>{{ member.consult_date }}</td>
 						<td>{{ member.comment }}</td>
					</tr>
				</tbody>
			</table>
			<a href="../consultnow.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Back</button></a>
			<div class="pull-right" style="margin-top:-30px;">
				<dir-pagination-controls
				   max-size="5"
				   direction-links="true"
				   boundary-links="true" >
				</dir-pagination-controls>
			</div>
		</div>
	</div>

	<?php include('modal.php'); ?>
</div>
<script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
<script src="angular.js"></script>
</body>
</html>