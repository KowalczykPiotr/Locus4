app.controller('clientsAdminCtrl', function ($scope, $rootScope, $http, $base64, $timeout) {

    $scope.resetForm = function () {}

    $scope.loaded = function() {}


    $rootScope.modalClient = function (id) {

        $scope.customer_id = id;

        $scope.add = {};
        $scope.provide = {};
        $scope.sygnal ={};

        $scope.add.status = 'IDLE';
        $scope.provide.status = 'IDLE';
        $scope.sygnal.status = 'IDLE';

        $scope.letterType();
        $scope.tabDodaj();
        jQuery("#modalLetters").modal();
    }



    $scope.tabDodaj = function () {

        $scope.add.status = 'IDLE';
        $scope.ClientsTabUrl = './letters_modal/add'
    }


    $scope.tabWydaj = function () {

        $scope.getLetter();
        $scope.provide.status = 'IDLE';
        $scope.ClientsTabUrl = './letters_modal/provide'
    }

    $scope.tabSygnal = function () {

        $scope.getLetter();
        $scope.ClientsTabUrl = './letters_modal/sygnal'
    }

    $scope.letterType = function () {

        $http({
            method: 'GET',
            url: root+'api/letter_types/',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }

        })
            .then(function(response) {
                console.log(response.data);
                $scope.letter_type = response.data;

            }, function(rejection) {
            });
    }





});