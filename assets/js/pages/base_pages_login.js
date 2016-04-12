/*
 *  Document   : base_pages_login.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Login Page
 */

var BasePagesLogin = function() {
    // Init Login Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationLogin = function(){
        jQuery('.js-validation-login').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'login-username': {
                    required: true,
                    minlength: 3
                },
                'login-password': {
                    required: true,
                    minlength: 5
                },
                'login-code': {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                'login-username': {
                    required: '<i class="fa fa-exclamation-circle"></i> Username tidak boleh kosong',
                    minlength: '<i class="fa fa-exclamation-circle"></i> Username kurang dari 3 karakter'
                },
                'login-password': {
                    required: '<i class="fa fa-exclamation-circle"></i> Password tidak boleh kosong',
                    minlength: '<i class="fa fa-exclamation-circle"></i> Password kurang dari 5 karakter'
                },
                'login-code': {
                    required: '<i class="fa fa-exclamation-circle"></i> Kode kosong',
                    minlength: '<i class="fa fa-exclamation-circle"></i> max 5 karakter'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Login Form Validation
            initValidationLogin();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesLogin.init(); });