app.run(function (formlyConfig, formlyValidationMessages) {
    formlyConfig.extras.errorExistsAndShouldBeVisibleExpression = 'fc.$touched || form.$submitted';
    
    formlyValidationMessages.addStringMessage('required', 'El campo es requerido');
    formlyValidationMessages.addStringMessage('minlength', 'No cumple con los digitos minimos');
    formlyValidationMessages.addStringMessage('number', 'Solo numeros');
});

app.config(function (formlyConfigProvider) {
    formlyConfigProvider.setWrapper({
        name: 'validation',
        types: ['input','multiselect','select'],
        templateUrl: '../template/messages/message_error.html'
    });
});

app.factory('modal', function ($q, $uibModal) {
    return {
        modal: function (model, add, title, fields) {
            var deferred = $q.defer();
            var result = $uibModal.open({
                animation: true,
                templateUrl: '../template/modal/modal.html',
                controller: 'ModalInstanceCtrl',
                controllerAs: 'vm',
                resolve: {
                    formData: function () {
                        return {
                            fields: fields,
                            model: model,
                            title: title
                        };
                    }
                }
            }).result;
            if (add) {
                result.then(function (model) {
                    deferred.resolve(model);
                });
            }
            return deferred.promise;
        }
    };
});

app.controller('ModalInstanceCtrl', function ($uibModalInstance, formData) {
    var vm = this;

    // function assignment
    vm.ok = ok;
    vm.cancel = cancel;

    // variable assignment
    vm.formData = formData;
    vm.originalFields = angular.copy(vm.formData.fields);
//    console.log(vm.formData.title);
    vm.title = angular.copy(vm.formData.title);
    // function definition
    function ok() {
        if (vm.form.$valid) {
//            vm.options.updateInitialValue();
            $uibModalInstance.close(vm.formData.model);
        }
    }

    function cancel() {   
        vm.formData.options.resetModel();
        $uibModalInstance.dismiss('cancel');
    }
    ;
});
 app.run(function(formlyConfig) {
    formlyConfig.setType({
      name: 'multiselect',
      extends: 'select',
      defaultOptions: {
        ngModelAttrs: {
          'true': {
            value: 'multiple'
          }
        }
      }
    });
  });
  