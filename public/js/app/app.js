/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('app', [
    'toastr',
    'formly',
    'formlyBootstrap',
    'ui.bootstrap',
    'ui.grid',
    'ui.grid.pagination',
    'ngAnimate',
    'ngMessages',
    'ngSanitize',
    'ui.select'    
]).config(function (toastrConfig) {
    angular.extend(toastrConfig, {
        allowHtml: false,
        closeButton: true,
        closeHtml: '<button>&times;</button>',
        extendedTimeOut: 1000,
        preventDuplicates: true,
        preventOpenDuplicates: true,
        iconClasses: {
            error: 'toast-error',
            info: 'toast-info',
            success: 'toast-success',
            warning: 'toast-warning'
        },
        messageClass: 'toast-message',
        onTap: true,
        progressBar: true,
        tapToDismiss: true,
        timeOut: 5000,
        titleClass: 'toast-title',
        toastClass: 'toast',
        positionClass: 'toast-bottom-right'
    });
});


