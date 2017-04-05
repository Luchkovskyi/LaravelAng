/**
 * Created by user on 05.04.2017.
 */

app.controller('SupplierController', function($scope, $http, API_URL) {
    // retrieve Supplier listing from API
    $http.get(API_URL + "supplier")
        .success(function(response){
            $scope.suppliers = response;
        });

    // show modal Form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        switch(modalstate) {
            case 'add':
                $scope.form_title = "Add New Supplier";
                break;
            case 'edit':
                $scope.form_title = "Supplier Detail";
                $scope.id = id;
                $http.get(API_URL + 'supplier/' + id).success(function(response){
                    console.log(response);
                    $scope.supplier = response;
                });
                break;
            default:
                break;
        }
        // console.log(id);
        $('#myModal').modal('show');
    }


    $scope.save = function(modalstate, id) {
        var url = API_URL + "supplier";
        if (modalstate === 'edit') {
            url += "/" + id;
        }
        console.log($.param($scope.supplier));
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.supplier),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response){
            console.log(response);
            location.reload();
        }).error(function(response){
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }


    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'supplier/' + id
            }).success(function(data){
                console.log(data);
                location.reload();
            }).error(function(data){
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});