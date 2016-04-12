/*
 *  Document   : base_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.form-murid').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group').append(error);
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
                'no_induk': {
                    required: true,
					number:true,
					minlength:8,
					
                
                },
				'nama_lengkap': {
                    required: true,
                
                },
				'angkatan': {
                    required: true,
                
                },
				'jurusan_id': {
                    required: true,
                
                },
                'agama': {
                    required: true,
                },
				'tahun': {
                    required: true,
                },
				'semester': {
                    required: true,
                },
                'val-password2': {
                    required: true,
                    minlength: 5
                },
                'val-confirm-password2': {
                    required: true,
                    equalTo: '#val-password2'
                },
                'val-suggestions2': {
                    required: true,
                    minlength: 5
                },
                'val-skill2': {
                    required: true
                },
                'val-website2': {
                    required: true,
                    url: true
                },
                'val-digits2': {
                    required: true,
                    digits: true
                },
                'val-number2': {
                    required: true,
                    number: true
                },
                'val-range2': {
                    required: true,
                    range: [1, 5]
                },
                'val-terms2': {
                    required: true
                }
            },
            messages: {
                'no_induk': {
                    required: 'No induk tidak boleh kosong',
					number: 'hanya boleh number',
					minlength: 'harus 8 karakter',
					
					
				
                },
				'nama_lengkap': {
                    required: 'Nama lengkap tidak boleh kosong',
					
                },
				'angkatan': {
                    required: 'Angkatan tidak boleh kosong',
                },
				'jurusan_id': {
                    required: 'Jurusan tidak boleh kosong',
                },
                'agama': {
                    required: 'Agama tidak boleh kosong',
                },
				'tahun': {
                    required: 'Tahun tidak boleh kosong',
                },
				'semester': {
                    required: 'Semester tidak boleh kosong',
                },
                'val-confirm-password2': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'val-suggestions2': 'What can we do to become better?',
                'val-skill2': 'Please select a skill!',
                'val-website2': 'Please enter your website!',
                'val-digits2': 'Please enter only digits!',
                'val-number2': 'Please enter a number!',
                'val-range2': 'Please enter a number between 1 and 5!',
                'val-terms2': 'You must agree to the service terms!'
            }
        });
    };

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();

        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormValidation.init(); });