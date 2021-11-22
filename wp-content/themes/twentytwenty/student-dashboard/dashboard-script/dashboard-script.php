<script type="text/javascript">
(function($) {
    'use strict';
    
 $(document).ready(function() {
    const af = $('#applicant_form').formValidation({
        message: 'This value is not valid',
        /*icon: {
            required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
            student_name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            birth_date: {
                validators: {
                    notEmpty: {
                        message: 'Birth date is required'
                    }
                }
            },
            birth_id: {
                validators: {
                    notEmpty: {
                        message: 'Birth Certificate No is required'
                    }
                }
            },
        	class: {
                validators: {
                    notEmpty: {
                        message: 'Class is required'
                    }
                }
            },
            shift: {
                validators: {
                    notEmpty: {
                        message: 'Shift is required'
                    }
                }
            },
            present_address: {
                validators: {
                    notEmpty: {
                        message: 'Present address is required'
                    }
                }
            },
            parmanent_address: {
                validators: {
                    notEmpty: {
                        message: 'Parmanent address is required'
                    }
                }
            },
            contact_no: {
                validators: {
                    notEmpty: {
                        message: 'Contact no is required'
                    },
                    stringLength: {
                        max: 11,
                        min: 11,
                        message: 'Phone Must be 11 number'
                    },

                }
            },
            blood_group: {
                validators: {
                    notEmpty: {
                        message: 'Blood group is required'
                    }
                }
            },
            parents_category: {
                validators: {
                    notEmpty: {
                        message: 'Parents Category is required'
                    }
                }
            },
            
            student_sex: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    }
                }
            },
            religion_id: {
                validators: {
                    notEmpty: {
                        message: 'Religion is required'
                    }
                }
            },
            last_school_name: {
                validators: {
                    notEmpty: {
                        message: 'School name is required'
                    }
                }
            },
            father_name: {
                validators: {
                    notEmpty: {
                        message: 'Father name is required'
                    }
                }
            },
            f_birth_date: {
                validators: {
                    notEmpty: {
                        message: 'Date of Birth is required'
                    }
                }
            },
            f_income: {
                validators: {
                    notEmpty: {
                        message: 'Yearly Income is required'
                    }
                }
            },
            father_occupation: {
                validators: {
                    notEmpty: {
                        message: 'Father occupation is required'
                    }
                }
            },
            f_office_address: {
                validators: {
                    notEmpty: {
                        message: 'Office address is required'
                    }
                }
            },
            father_contact: {
                validators: {
                    notEmpty: {
                        message: 'Father contact is required'
                    },
                    stringLength: {
                        max: 11,
                        min: 11,
                        message: 'Phone Must be 11 number'
                    },
                }
            },
            mother_name: {
                validators: {
                    notEmpty: {
                        message: 'Mother name is required'
                    }
                }
            },
            mother_occupation: {
                validators: {
                    notEmpty: {
                        message: 'Mother occupation is required'
                    }
                }
            },
            mother_contact: {
                validators: {
                    notEmpty: {
                        message: 'Mother contact is required'
                    },
                    stringLength: {
                        max: 11,
                        min: 11,
                        message: 'Phone Must be 11 number'
                    },
                }
            },
            profile_image: {
                validators: {
                    notEmpty: {
                        message: 'Profile image is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 600000,   // 3MB
                        message: 'File size must be less than 500kb and file type will be jpg / jpeg /png'
                    }
                }
            },
        	
        	birth_certificate: {
                validators: {
                    notEmpty: {
                        message: 'Birth certificate is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png,pdf',
                        type: 'image/jpeg,image/png,image/jpg,application/pdf',
                        maxSize: 800000,   // 3MB
                        message: 'File size must be less than 800kb and file type will be jpg / jpeg /png'
                    }
                }
            },
            testimonial_image: {
                validators: {
                    notEmpty: {
                        message: 'Unit Certificate is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png,pdf',
                        type: 'image/jpeg,image/png,image/jpg,application/pdf',
                        maxSize: 900000,   // 3MB
                        message: 'File size must be less than 900kb and file type will be jpg / jpeg /png'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                }
            },

        }
    }).on('success.form.fv', function(e) {
        $('#wpmp-register-alert').hide();
        $('#wpmp-mail-alert').hide();
        $('body, html').animate({
            scrollTop: 0
        }, 'slow');
        // You can get the form instance
        var $applicant_form = $(e.target);
        // and the FormValidation instance
        var fv = $applicant_form.data('formValidation');
        var formData = new FormData();
        // get all input and select item in a form
        $('#applicant_form input[type=text],#applicant_form input[type=radio]:checked, #applicant_form select,#applicant_form textarea,#applicant_form input[type=email],#applicant_form date,#applicant_form input[type=file],#applicant_form input[type=password]').each(function(i,item){
            if(item.type == 'file'){
                formData.append(item.name,item.files[0]);
            }else {
                formData.append(item.name,item.value);
            }
        })
        formData.append('action','profile');
        $('#wpmp-reg-loader-info').show();
        $.ajax({
            type:'POST',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
            console.log(data);
            $('#wpmp-reg-loader-info').hide();
            // check login status
            if (true == data.reg_status) {
                $('#wpmp-register-alert').removeClass('alert-danger');
                $('#wpmp-register-alert').addClass('alert-success');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.success);
                $('#applicant_form')[0].reset();
                window.location.href = '<?= home_url() ?>/applicant-profile';

            } else {
                $('#wpmp-register-alert').addClass('alert-danger');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.error);

            }
        },
        error: function(errors) {
            console.log(errors);
        }
        })
        // Prevent form submission
        e.preventDefault();
    })

    const aef = $('#applicant_edit_form').formValidation({
        message: 'This value is not valid',
        /*icon: {
            required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
            student_name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            father_name: {
                validators: {
                    notEmpty: {
                        message: 'Father name is required'
                    }
                }
            },
            father_occupation: {
                validators: {
                    notEmpty: {
                        message: 'Father occupation is required'
                    }
                }
            },
            mother_name: {
                validators: {
                    notEmpty: {
                        message: 'Mother name is required'
                    }
                }
            },
            mother_occupation: {
                validators: {
                    notEmpty: {
                        message: 'Mother occupation is required'
                    }
                }
            },
            present_address: {
                validators: {
                    notEmpty: {
                        message: 'Present address is required'
                    }
                }
            },
            parmanent_address: {
                validators: {
                    notEmpty: {
                        message: 'Parmanent address is required'
                    }
                }
            },
            /*contact_no: {
                validators: {
                    notEmpty: {
                        message: 'Contact no is required'
                    },
                    stringLength: {
                        max: 11,
                        min: 11,
                        message: 'Phone Must be 11 number'
                    },

                }
            },*/
            birth_date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    }
                }
            },
            student_sex: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    }
                }
            },
            religion_id: {
                validators: {
                    notEmpty: {
                        message: 'Religion is required'
                    }
                }
            },
            profile_image: {
                validators: {
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 3000000,   // 3MB
                        message: 'File size must be less than 3MB and file type will be jpg / jpeg /png'
                    }
                }
            }

        }
    }).on('success.form.fv', function(e) {
        $('#wpmp-register-alert').hide();
        $('#wpmp-mail-alert').hide();
        $('body, html').animate({
            scrollTop: 0
        }, 'slow');
        // You can get the form instance
        var $applicant_edit_form = $(e.target);
        // and the FormValidation instance
        var fv = $applicant_edit_form.data('formValidation');
        var formData = new FormData();
        // get all input and select item in a form
        $('#applicant_edit_form input[type=text],#applicant_edit_form input[type=hidden],#applicant_edit_form input[type=radio]:checked, #applicant_edit_form select,#applicant_edit_form textarea,#applicant_edit_form date,#applicant_edit_form input[type=file]').each(function(i,item){
            if(item.type == 'file'){
                formData.append(item.name,item.files[0]);
            }else {
                formData.append(item.name,item.value);
            }
        })
        formData.append('action','edit_profile');
        console.log(formData);
        $('#wpmp-reg-loader-info').show();
        $.ajax({
            type:'POST',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
            $('#wpmp-reg-loader-info').hide();
            // check login status
            if (true == data.reg_status) {
                $('#wpmp-register-alert').removeClass('alert-danger');
                $('#wpmp-register-alert').addClass('alert-success');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.success);

            } else {
                $('#wpmp-register-alert').addClass('alert-danger');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.error);

            }
        },
        error: function(errors) {
            console.log(errors);
        }
        })
        // Prevent form submission
        e.preventDefault();
    })

    $('#birth_date').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "1980:2025",
        onSelect: function() {
            $('#applicant_form').formValidation('revalidateField',   'birth_date');
        }
    })

    $('#f_birth_date').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2025",
        onSelect: function() {
            $('#applicant_form').formValidation('revalidateField',   'f_birth_date');
        }
    })

    $('#m_birth_date').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2025",
        onSelect: function() {
            $('#applicant_form').formValidation('revalidateField',   'm_birth_date');
        }
    })



    const profileupdate = $('#parent_update_form').formValidation({
        message: 'This value is not valid',
        /*icon: {
            required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
            display_name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            profile_image: {
                validators: {
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 3000000,   // 3MB
                        message: 'File size must be less than 3MB and file type will be jpg / jpeg /png'
                    }
                }
            },
            user_email: {
                validators: {
                    notEmpty: {
                        message: 'Father name is required'
                    }
                }
            }

        }
    }).on('success.form.fv', function(e) {
        $('#wpmp-register-alert').hide();
        $('#wpmp-mail-alert').hide();
        $('body, html').animate({
            scrollTop: 0
        }, 'slow');
        // You can get the form instance
        var $applicant_form = $(e.target);
        // and the FormValidation instance
        var fv = $applicant_form.data('formValidation');
        var formData = new FormData();
        // get all input and select item in a form
        $('#parent_update_form input,#parent_update_form file').each(function(i,item){
            if(item.type == 'file'){
                formData.append(item.name,item.files[0]);
            }else {
                formData.append(item.name,item.value);
            }
        })
        formData.append('action','profile_update');
        $('#wpmp-reg-loader-info').show();
        $.ajax({
            type:'POST',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
            console.log(data);
            $('#wpmp-reg-loader-info').hide();
            // check login status
            if (true == data.reg_status) {
                $('#wpmp-register-alert').removeClass('alert-danger');
                $('#wpmp-register-alert').addClass('alert-success');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.success);
            } else {
                $('#wpmp-register-alert').addClass('alert-danger');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.error);

            }
        },
        error: function(errors) {
            console.log(errors);
        }
        })
        // Prevent form submission
        e.preventDefault();
    })


    
    /*===============extra-subject=============*/

    jQuery(document).on('change','#academic_group', function(){
        var programe = jQuery(this).val();
       if (programe == 'Science') {
            jQuery('.o_commerce').hide();
            jQuery('.o_commerce_arts').hide();
            jQuery('.o_arts').hide();
            jQuery('.o_science').show();
            jQuery('.o_science_arts').show();
        }else if(programe == 'Business studies'){
            jQuery('.o_science').hide();
            jQuery('.o_science_arts').hide();
            jQuery('.o_arts').hide();
            jQuery('.o_commerce').show();
            jQuery('.o_commerce_arts').show();
        }else if(programe == 'Humanities'){
            jQuery('.o_science').hide();
            jQuery('.o_commerce').hide();
            jQuery('.o_arts').show();
            jQuery('.o_science_arts').show();
            jQuery('.o_commerce_arts').show();
        }else{
            jQuery('.o_science').show();
            jQuery('.o_commerce').show();
            jQuery('.o_arts').show();
            jQuery('.o_science_arts').show();
            jQuery('.o_commerce_arts').show();  
        }
    });

    jQuery(document).on('change','#class', function(){
        var programe = jQuery(this).val();
       if (programe == 'Two' || programe == 'Three' || programe == 'Four' || programe == 'Five') {
            jQuery('.morning').hide();
            jQuery('.day').show();
        }else if(programe == 'Six'){
            jQuery('.day').hide();
            jQuery('.morning').show();
        }else{
            jQuery('.day').show();
            jQuery('.morning').show();
        }
    });

    /*===============Rank and unit show=============*/
    jQuery(document).on('change','#parents_category', function(){
        var program = jQuery(this).val();
        if (program == 'Army & Air Force' || program == 'Navy' || program == 'Defense officer' || program == 'Defense sailors and equivalent / 4th class' || program == 'Ministry of defense (officer)' || program == 'Ministry of defense (3th and 4th)' || program == '4th Class (Navy & Navy civil'){
            jQuery('.unit_certificate').show(1000);
        }else{
            jQuery('.unit_certificate').hide(1000);
        }
    })


 });

})(jQuery);

</script>