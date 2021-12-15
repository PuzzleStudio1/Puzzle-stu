/******/
(() => { // webpackBootstrap
    /******/
    "use strict";
    /*!************************************************************!*\
      !*** ../demo1/src/js/pages/custom/projects/add-project.js ***!
      \************************************************************/


    // Class definition
    var KTProjectsAdd = function () {
        // Base elements
        var _wizardEl;
        var _formEl;
        var _wizardObj;
        var _validations = [];

        // Private functions
        var _initWizard = function () {
            // Initialize form wizard
            _wizardObj = new KTWizard(_wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: false // allow step clicking
            });

            // Validation before going to next page
            _wizardObj.on('change', function (wizard) {
                if (wizard.getStep() > wizard.getNewStep()) {
                    return; // Skip if stepped back
                }

                // Validate form before change wizard step
                var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                if (validator) {
                    validator.validate().then(function (status) {
                        if (status == 'Valid') {
                            wizard.goTo(wizard.getNewStep());

                            KTUtil.scrollTop();
                        } else {
                            Swal.fire({
                                text: "متاسفم، به نظر می‌رسد بخشی از فرم را به درستی تکمیل نکرده‌اید.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "بستن پنجره",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light"
                                }
                            }).then(function () {
                                KTUtil.scrollTop();
                            });
                        }
                    });
                }

                return false; // Do not change wizard step, further action will be handled by he validator
            });

            // Change event
            _wizardObj.on('changed', function (wizard) {
                KTUtil.scrollTop();
            });

            // Submit event
            _wizardObj.on('submit', function (wizard) {
                Swal.fire({
                    text: "تکمیل اطلاعات با موفقت انجام شد برا ادامه بر روی دکمه تایید کلیک کنید",
                    icon: "success",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "تایید",
                    cancelButtonText: "انصراف",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-primary",
                        cancelButton: "btn font-weight-bold btn-default"
                    }
                }).then(function (result) {
                    if (result.value) {
                        _formEl.submit(); // Submit form
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "متاسفم، به نظر می‌رسد بخشی از فرم را به درستی تکمیل نکرده‌اید.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "بستن پنجره",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-primary",
                            }
                        });
                    }
                });
            });
        }

        var _initValidation = function () {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            // Step 1
            _validations.push(FormValidation.formValidation(
                _formEl, {
                    fields: {
                        testname: {
                            validators: {
                                notEmpty: {
                                    message: 'تکمیل این فیلد الزامی است'
                                }
                            }
                        },
                        slug: {
                            validators: {
                                notEmpty: {
                                    message: 'تکمیل این فیلد الزامی است'
                                },
                                regexp: {
                                    regexp: '^[a-z0-9]+(?:-[a-z0-9]+)*$',
                                    message: 'در Slug صرفا باید از حروف انگلیسی و خط فاصله استفاده شود'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));

            // Step 2
            _validations.push(FormValidation.formValidation(
                _formEl, {
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));

            // Step 3
            _validations.push(FormValidation.formValidation(
                _formEl, {
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));
        }

        return {
            // public functions
            init: function () {
                _wizardEl = KTUtil.getById('kt_projects_add');
                _formEl = KTUtil.getById('kt_projects_add_form');

                _initWizard();
                _initValidation();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTProjectsAdd.init();
    });

    /******/
})();
//# sourceMappingURL=add-project.js.map
