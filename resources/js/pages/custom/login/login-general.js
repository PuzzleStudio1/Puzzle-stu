/******/
(() => { // webpackBootstrap
    /******/
    "use strict";
    /*!***********************************************************!*\
      !*** ../demo1/src/js/pages/custom/login/login-general.js ***!
      \***********************************************************/


    // Class Definition
    var KTLogin = function () {
        var _login;

        var _showForm = function (form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.removeClass('login-signup-on');

            _login.addClass(cls);

            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }

        var _handleSignInForm = function () {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_signin_form'), {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن آدرس ایمیل الزامی است'
                                },
                                emailAddress: {
                                    message: 'فرمت ایمیل وارد شده معتبر نیست'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن رمز عبور الزامی است'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signin_submit').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    if (status == 'Valid') {
                        swal.fire({
                            text: "تکمیل اطلاعات با موفقت انجام شد",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "تایید",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            $('form#kt_login_signin_form').submit();
                        });
                    } else {
                        swal.fire({
                            text: "متاسفم، به نظر می‌رسد بخشی از فرم را به درستی تکمیل نکرده‌اید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "بستن پنجره",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle forgot button
            $('#kt_login_forgot').on('click', function (e) {
                e.preventDefault();
                _showForm('forgot');
            });

            // Handle signup
            $('#kt_login_signup').on('click', function (e) {
                e.preventDefault();
                _showForm('signup');
            });
        }

        var _handleSignUpForm = function (e) {
            var validation;
            var form = KTUtil.getById('kt_login_signup_form');

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                form, {
                    fields: {
                        fname: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                }
                            }
                        },
                        lname: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                },
                                emailAddress: {
                                    message: 'فرمت ایمیل وارد شده معتبر نیست'
                                }
                            }
                        },
                        mobile: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                },
                                phone: {
                                    country: 'CN',
                                    message: 'فرمت موبایل وارد شده معتبر نیست. حتما با صفر اول'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                }
                            }
                        },
                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                },
                                identical: {
                                    compare: function () {
                                        return form.querySelector('[name="password"]').value;
                                    },
                                    message: 'رمز عبور و تایید رمز عبور برابر نیستند.'
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'شما باید قوانین ثبت نام را تایید کنید.'
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signup_submit').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    if (status == 'Valid') {
                        swal.fire({
                            text: "تکمیل اطلاعات با موفقت انجام شد برا ادامه بر روی دکمه تایید کلیک کنید",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "تایید",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            $('form#kt_login_signup_form').submit();
                        });
                    } else {
                        swal.fire({
                            text: "متاسفم، به نظر می‌رسد بخشی از فرم را به درستی تکمیل نکرده‌اید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "بستن پنجره",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_signup_cancel').on('click', function (e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        var _handleForgotForm = function (e) {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_forgot_form'), {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'وارد کردن این فیلد الزامی است'
                                },
                                emailAddress: {
                                    message: 'فرمت ایمیل وارد شده معتبر نیست'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_forgot_submit').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Submit form
                        KTUtil.scrollTop();
                    } else {
                        swal.fire({
                            text: "متاسفم، به نظر می‌رسد بخشی از فرم را به درستی تکمیل نکرده‌اید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "بستن پنجره",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_forgot_cancel').on('click', function (e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        // Public Functions
        return {
            // public functions
            init: function () {
                _login = $('#kt_login');

                _handleSignInForm();
                _handleSignUpForm();
                _handleForgotForm();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function () {
        KTLogin.init();
    });

    /******/
})();
//# sourceMappingURL=login-general.js.map
