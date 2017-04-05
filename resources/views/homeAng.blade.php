<!DOCTYPE html>
<html lang="en" ng-app="getSupplier">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5 and Angular CRUD Application</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav lmenu">
                    {{--@if (Auth::guest())--}}
                        {{--&nbsp;--}}
                    {{--@else--}}
                        {{--<li><a class="lmenuhref" href="{{ url('/add') }}">Add</a></li>--}}
                        {{--<li><a class="lmenuhref" href="{{ url('/home') }}">Edit</a></li>--}}
                    {{--@endif--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<div class="container">

    <div ng-controller="SupplierController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name Goods</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
                <th>
                    <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add New Supplier</button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="supplier in suppliers">
                <td>@{{ supplier.id }}</td>
                <td>@{{ supplier.supplierName }}</td>
                <td>@{{ supplier.supplierEmail }}</td>
                <td>@{{ supplier.supplierContact }}</td>
                <td>@{{ supplier.supplierPosition }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', supplier.id)">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(supplier.id)">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <!-- show modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmSupplier" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name of Goods</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="supplierName" name="Name Goods" placeholder="Supplier Name" value="@{{supplierName}}" ng-model="supplier.supplierName" ng-required="true">
                                    <span ng-show="frmSupplier.supplierName.$invalid && frmSupplier.supplierName.$touched">Supplier Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="supplierEmail" name="Description" placeholder="Supplier Email" value="@{{supplierEmail}}" ng-model="supplier.supplierEmail" ng-required="true">
                                    <span ng-show="frmSupplier.supplierEmail.$invalid && frmSupplier.supplierEmail.$touched">Supplier Email field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="supplierContact" name="Category" placeholder="Supplier Contact" value="@{{supplierContact}}" ng-model="supplier.supplierContact" ng-required="true">
                                    <span ng-show="frmSupplier.supplierContact.$invalid && frmSupplier.supplierContact.$touched">Supplier Contact field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="supplierPosition" name="image" placeholder="Supplier Position"  ng-model="supplier.supplierPosition" ng-required="true">
                                    <span ng-show="frmSupplier.supplierPosition.$invalid && frmSupplier.supplierPosition.$touched">Supplier Position field is required</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmSupplier.$invalid">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Aangular Material load from CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

<!-- Angular Application Scripts Load  -->
<script src="{{ asset('angular/app.js') }}"></script>
<script src="{{ asset('angular/controllers/SupplierController.js') }}"></script>
</body>
</html>