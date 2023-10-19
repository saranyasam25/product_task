
import { getToken } from "/resources/js/helpers/csrf_token";

$(document).ready(function() {

    toastr.otpions = {
        closeButton: true,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    $("#register_form").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            role: {
                required: true,
            },
            email: {
                required:true,
            },
            password:{
                required:true,
            },
            confirm_password:{
                required:true,
            },


        },
        messages: {
            first_name: {
                required: "First Name is required",
            },
            last_name: {
                required: "Last Name is required",
            },
            email: {
                required: "Email address is required",
                emailPattern: "Please enter a valid email address",
            },
            role: {
                required: "Role is required",
            },
            password: {
                required: "Password is required",
            },
            confirm_password: {
                required: "Confirm Password is required",
            },
        },

        errorElement: "small",
        errorPlacement: function (error, element) {
            error.appendTo("#" + element.attr("name") + "_error");
        },
        highlight: function (element) {
            $(element).closest(".form-group").addClass("has-error");
        },
        unhighlight: function (element) {
            $(element).closest(".form-group").removeClass("has-error");
        },

    });

    $('body').on('click','#register', function(e){
        e.preventDefault();
        if (!$("#register_form").valid()) {
            return;
        }
        var firstName = $('.first_name').val();
        var lastName = $('.last_name').val();
        var role = $('.role option:selected').val();
        var email = $('.email').val();
        var password = $('.password').val();
        var confirmPassword = $('.confirm_password').val();
        $.ajax({
            url: '/register-form',
            type: 'POST',
            data: {
                'first_name':firstName,
                'last_name' : lastName,
                'role' : role,
                'email' : email,
                'password' : password,
                'confirm_password' : confirmPassword,
            },
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
            dataType: "JSON",
        })
            .done(function (response) {
                toastr.success('Registered Successfully');
                setTimeout(function () {
                    window.location.href = "/";
                }, 2000);
            }).fail(function (error) {
                toastr.error(error.message);
            });

    });
    $('body').on('click','#login_user', function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        // console.log(password);
        $.ajax({
            url: '/login-user',
            type: 'POST',
            data: {
                'email' : email,
                'password' : password,
            },
            headers: {
                "X-CSRF-TOKEN": getToken(),
            },
            dataType: "JSON",
        })
            .done(function (response) {
                if (response.status === 'Success') {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                setTimeout(function () {
                    window.location.href = "/dashboard";
                }, 2000);
            }).fail(function (response) {
                if (response.status === 'Error') {
                    toastr.error(response.message);
                }
            });


    })

    // logout function

    $('body').on('click','.logout', function(e){
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/user-logout",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function (response) {
            window.location.href = '/';
        }).fail(function (error) { console.log(error); });
    })
});
