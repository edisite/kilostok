var $base_url = $("body").data("base_url");

function rules() {
  $(".kode").keydown(function(event) {
    if ( event.keyCode != 32 ) {
      // let it happen, don't do anything
    } else {
      event.preventDefault();
    }
  });
  $(".telp2").keyup(function(event) {
    // Allow: backspace, delete, tab, escape, enter and .
    // Get content
    var content = event || window.event;
    var string = this.value;
    // alert("string="+string);
    var key = content.keyCode || content.which;
    // Make Regex pattern \+?\d
    var regex = /\+?\d?/;
    // Match content with pattern
    // If match do nothing
    // if not match, set value = content
    var plus = event.which || event.keyCode;
    key = String.fromCharCode(key);
    if(regex.test(string)) {
        content.returnValue = false;
    } else {
        this.value = "";
        alert("not match");
    }
  });
  $(".telp").keydown(function(event) {
    // Allow: backspace, delete, tab, escape, enter and .
    var plus = event.which || event.keyCode;
    if ($.inArray(event.keyCode, [43, 46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
         // Allow: home, end, left, right, down, up
        (event.keyCode >= 35 && event.keyCode <= 40)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
        event.preventDefault();
    }
  });
  $(".num").keydown(function(event) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
         // Allow: home, end, left, right, down, up
        (event.keyCode >= 35 && event.keyCode <= 40)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
        event.preventDefault();
    }
  });
  $(".decimal").keydown(function(event) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || 
         // Allow: home, end, left, right, down, up
        (event.keyCode >= 35 && event.keyCode <= 40) || event.keyCode == 190 ) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
        event.preventDefault();
    }
  });
  $('.reset').on('click', function() {
    resetValidation();
  });
  $('.select2').select2();
  $('.select2').width('100%');
  $('.money').number( true, 2, '.', ',' );
  $('.money').css('text-align', 'right');
  $('.num2').number( true, 2, '.', ',' );
  $('.num2').css('text-align', 'right');
  $('.datepicker').datepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        "opens": "left",
        "drops": "down"
  });
  var dateToday = new Date();
  $('.datepicker-range').daterangepicker({
        minDate : dateToday,
        locale: {
            format: 'DD/MM/YYYY',
        },
        "opens": "left",
        "drops": "down"
  });
    $('.timepicker-default').timepicker({
        autoclose: true,
        minuteStep: 5
    });
}

// Custom Validation 
var MyFormValidation = function () {

    // Validation
    var handleValidationCustom = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form = $('#formAdd');
            var error2 = $('.alert-danger', form);
            var success2 = $('.alert-success', form);

            form.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    App.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                }
            });


    }

    return {
        //main function to initiate the module
        init: function () {

            handleValidationCustom();
            resetValidation();

        }

    };
}();

var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto', 
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#formAdd');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    // return false;
                    
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
              checkPosition(4);
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

var FormWizard2 = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto', 
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#formAdd');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    // return false;
                    
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    checkPosition(clickedIndex);
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
              checkPosition(4);
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

var FormWizard3 = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto', 
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#formAdd');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    // return false;
                    
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    checkPosition(index);
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
              checkPosition(3);
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

jQuery(document).ready(function() {   
    MyFormValidation.init();
});

// Logout
function doLogout() {
    var $base_url = $("body").data("base_url");
    $.ajax({
        url: $base_url+'Login/doLogout',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
          if (data.status=='200') {
            toastr["success"]("Your sessions has been deleted", "Sukses", {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "200",
                  "timeOut": "5000",
                  "extendedTimeOut": "200",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
            });
            setTimeout(function(){
              window.location.href = $base_url+'Login';
            }, 2000);
          }
        }
    });
}

// Reset Validation
function resetValidation() {
    var form = $('#formAdd');
    if (form) {
        var formadd = form.validate();
        formadd.resetForm();
    }
    $(".has-success").removeClass("has-success");
    $(".fa-check").removeClass("fa-check");
    $('.alert-success').hide();
    $(".has-error").removeClass("has-error");
    $(".fa-warning").removeClass("fa-warning");
    $('.alert-danger').hide();
}

function reset() {
    if (document.getElementById("formadd")) {
        document.getElementById("formadd").reset();
        var formadd = $("#formadd").validate();
        formadd.resetForm();
    }
}

// Select2 AJAX
function FormatResult(data) {
    markup = '<div>'+data.text+'</div>';
    return markup;
}

function FormatSelection(data) {
    return data.text;
}
// End Select2 AJAX

//ALERT FUNCTION
function alert_success_save() {
    swal({
        title: "Success!",
        text: "Data telah tersimpan!",
        type: "success",
        confirmButtonClass: "btn-raised btn-success",
        confirmButtonText: "OK",
    });
}

function alert_fail_save() {
    swal({
        title: "Alert!",
        text: "Data gagal tersimpan!",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}

function alert_success_delete() {
    swal({
      title: "Success!",
      text: "Data telah dinonaktifkan!",
      type: "success",
      confirmButtonClass: "btn-raised btn-success",
      confirmButtonText: "OK",
    });
}

function alert_fail_delete() {
    swal({
        title: "Alert!",
        text: "Data gagal dinonaktifkan!",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}

function alert_success_nonaktif() {
    swal({
      title: "Success!",
      text: "Data telah dinonaktifkan!",
      type: "success",
      confirmButtonClass: "btn-raised btn-success",
      confirmButtonText: "OK",
    });
}

function alert_fail_nonaktif() {
    swal({
        title: "Alert!",
        text: "Data gagal dinonaktifkan!",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}

function alert_success_aktif() {
    swal({
      title: "Success!",
      text: "Data telah selesai di posting!",
      type: "success",
      confirmButtonClass: "btn-raised btn-success",
      confirmButtonText: "OK",
    });
}

function alert_success_posting() {
    swal({
      title: "Success!",
      text: "Data Jurnal telah selesai di Posting!",
      type: "success",
      confirmButtonClass: "btn-raised btn-success",
      confirmButtonText: "OK",
    });
}
function alert_fail_aktif() {
    swal({
        title: "Alert!",
        text: "Gagal, data jurnal kosong !",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}


function alert_fail_posting() {
    swal({
        title: "Alert!",
        text: "Data gagal tersimpan!",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}
function alert_success_batal() {
    swal({
      title: "Success!",
      text: "Data telah dibatalkan!",
      type: "success",
      confirmButtonClass: "btn-raised btn-success",
      confirmButtonText: "OK",
    });
}

function alert_fail_batal() {
    swal({
        title: "Alert!",
        text: "Data gagal dibatalkan!",
        type: "error",
        confirmButtonClass: "btn-raised btn-danger",
        confirmButtonText: "OK",
    });
}
//END ALERT FUNCTION

function openFormCabang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Cabang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#cabang_kota').css('width', '100%');
        selectList_Kota('#cabang_kota', 'Master-Data/Cabang/loadDataSelectKota');
        if (id) {
            setTimeout(function(){
              $('#cabang_kota').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#cabang_kota').select2();
                selectList_Kota('#cabang_kota', 'Master-Data/Cabang/loadDataSelectKota');
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormJenisGudang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Jenis-Gudang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}

function openFormTipeKaryawan(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Tipe-Karyawan/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}

function openFormDepartemen(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Departemen/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_cabang_id').css('width', '100%');
        selectList_cabang();
        if (id) {
            setTimeout(function(){
              $('#m_cabang_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_cabang_id').select2();
                selectList_cabang();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormMatauang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Mata-Uang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}

function openFormKaryawan(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Karyawan/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_cabang_id').css('width', '100%');
        $('#m_type_karyawan_id').css('width', '100%');
        $('#m_departemen_id').css('width', '100%');
        selectList_cabang();
        selectList_typeKaryawan();
        selectList_departemen();
        if (id) {
            setTimeout(function(){
              $('#m_cabang_id').select2('destroy');
              $('#m_type_karyawan_id').select2('destroy');
              $('#m_departemen_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_cabang_id').select2();
                $('#m_type_karyawan_id').select2();
                $('#m_departemen_id').select2();
                selectList_cabang();
                selectList_typeKaryawan();
                selectList_departemen();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormPartner(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Partner/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionDataFile();
          }
          return false;
        });
        $('#partner_kota').css('width', '100%');
        selectList_Kota('#partner_kota', 'Master-Data/Cabang/loadDataSelectKota');
        if (id) {
            setTimeout(function(){
                $('#partner_kota').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#partner_kota').select2();
                selectList_Kota('#partner_kota', 'Master-Data/Cabang/loadDataSelectKota');
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormGudang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Gudang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#gudang_kota').css('width', '100%');
        $('#m_cabang_id').css('width', '100%');
        $('#m_jenis_gudang_id').css('width', '100%');
        selectList_Kota('#gudang_kota', 'Master-Data/Gudang/loadDataSelectKota');
        selectList_cabang();
        selectList_jenisGudang();
        if (id) {
            setTimeout(function(){
              $('#gudang_kota').select2('destroy');
              $('#m_cabang_id').select2('destroy');
              $('#m_jenis_gudang_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#gudang_kota').select2();
                $('#m_cabang_id').select2();
                $('#m_jenis_gudang_id').select2();
                selectList_Kota('#gudang_kota', 'Master-Data/Gudang/loadDataSelectKota');
                selectList_cabang();
                selectList_jenisGudang();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormJenisBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Jenis-Barang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_jenis_gudang_id').css('width', '100%');
        selectList_jenisGudang();
        if (id) {
            setTimeout(function(){
              $('#m_jenis_gudang_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_jenis_gudang_id').select2();
                selectList_jenisGudang();
              }, 800);
            }, 200);
        }
      }
    });
}
function openFormKategoriBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Kategori-Barang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_jenis_gudang_id').css('width', '100%');
        selectList_jenisGudang();
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}
function openFormBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Barang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_jenis_barang_id').css('width', '100%');
        $('#m_kategori_barang_id').css('width', '100%');
        $('#m_satuan_id').css('width', '100%');
        // $('#konversi_akhir_satuan1').css('width', '100%');
        
        selectList_jenisBarang();
        selectList_kategoriBarang();
        selectList_Satuan('#m_satuan_id');
        // selectList_Satuan('#konversi_akhir_satuan1');
        if (id) {
            setTimeout(function(){
              $('#m_kategori_barang_id').select2('destroy');
              $('#m_jenis_barang_id').select2('destroy');
              $('#m_satuan_id').select2('destroy');
              // $('#konversi_akhir_satuan1').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_kategori_barang_id').select2();
                $('#m_jenis_barang_id').select2();
                $('#m_satuan_id').select2();
                $('#konversi_akhir_satuan1').select2();
                
                selectList_jenisBarang();
                selectList_kategoriBarang();
                selectList_Satuan('#m_satuan_id');
                // selectList_Satuan('#konversi_akhir_satuan1');
              }, 1000);
            }, 500);
        }
      }
    });
}

function openFormSatuan(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Satuan/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}

function openFormValueBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Value-Barang/getFormValue/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_jenis_barang_id').css('width', '100%');
        selectList_jenisBarang();
        if (id) {
            setTimeout(function(){
              $('#m_jenis_barang_id').select2('destroy');
              selectList_jenisBarang();
              editDataValue(id);
            }, 200);
        }
//        $('#m_kategori_barang_id').css('width', '100%');
//        selectList_kategoriBarang();
//        if (id) {
//            setTimeout(function(){
//              $('#m_kategori_barang_id').select2('destroy');
//              selectList_kategoriBarang();
//              editDataValue(id);
//            }, 200);
//        }
      }
    });
}

function openFormAtributBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Atribut-Barang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_barang_id').css('width', '100%');
        $('#atribut_satuan').css('width', '100%');
        selectList_barang();
        selectList_Satuan('#atribut_satuan');
        if (id) {
            setTimeout(function(){
              $('#m_barang_id').select2('destroy');
              $('#atribut_satuan').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_barang_id').select2();
                $('#atribut_satuan').select2();
                selectList_barang();
                selectList_Satuan('#atribut_satuan');
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormSubAtributBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Sub-Atribut-Barang/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_barang_id').css('width', '100%');
        $('#m_atribut_id').css('width', '100%');
        $('#sub_atribut_satuan').css('width', '100%');
        selectList_barang();
        selectList_Satuan('#sub_atribut_satuan');
        if (id) {
            setTimeout(function(){
              $('#m_barang_id').select2('destroy');
              $('#m_atribut_id').select2('destroy');
              $('#sub_atribut_satuan').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_barang_id').select2();
                $('#m_atribut_id').select2();
                $('#sub_atribut_satuan').select2();
                selectList_barang();
                selectList_Satuan('#sub_atribut_satuan');
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormJenisProduksi(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Jenis-Produksi/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
            // checkRatioAwal();
          }
          return false;
        });
        $('#bahan_id').css('width', '100%');
        selectList_barangUraian("#bahan_id");
        $('#barang_id').css('width', '100%');
        selectList_barangUraian("#barang_id");
        if (id) {
            $('#bahan_id').select2('destroy');
            $('#barang_id').select2('destroy');
            setTimeout(function(){
                editData(id);
                $('#bahan_id').select2();
                $('#barang_id').select2();
            }, 200);
        }
      }
    });
}

function openFormBank(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Bank/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_cabang_id').css('width', '100%');
        selectList_cabang();
        if (id) {
            $('#m_cabang_id').select2('destroy');
            setTimeout(function(){
              editData(id);
              setTimeout(function(){
                $('#m_cabang_id').select2();
                selectList_cabang();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormMesin(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Mesin/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $('.datepicker').datepicker();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
              setTimeout(function(){
              }, 1000);
            }, 500);
        }
      }
    });
}

function openFormSparepart(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Sparepart/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $('.datepicker').datepicker();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
              setTimeout(function(){
              }, 1000);
            }, 500);
        }
      }
    });
}

function openFormKas(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Kas/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        $('#m_cabang_id').css('width', '100%');
        selectList_cabang();
        $('#m_coa_id').css('width', '100%');
        selectList_masterCOA('#m_coa_id', 4);
        if (id) {
            $('#m_cabang_id').select2('destroy');
            setTimeout(function(){
              editData(id);
              setTimeout(function(){
                $('#m_cabang_id').select2();
                selectList_cabang();
                $('#m_coa_id').css('width', '100%');
                selectList_masterCOA('#m_coa_id', 4);
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormHeader(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Header/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });
        if (id) {
            setTimeout(function(){
              editData(id);
            }, 200);
        }
      }
    });
}

function openFormCoa(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/COA/getForm/',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
          }
          return false;
        });

        $('#m_coa_id').css('width', '100%');
        selectList_masterCOA('#m_coa_id', 4);
        if (id) {
            $('#m_cabang_id').select2('destroy');
            setTimeout(function(){
              editData(id);
              setTimeout(function(){
                $('#m_cabang_id').select2();
                selectList_cabang();
                $('#m_coa_id').css('width', '100%');
                selectList_masterCOA('#m_coa_id', 4);
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormPilihBarang(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Bukti-Keluar-Barang/getForm', //database
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            tambahBarang();
          }
          return false;
        });
        $('#m_barang_id').css('width', '100%');
        selectList_barang();    //del
        if (id) {
            setTimeout(function(){
              $('#m_barang_id').select2('destroy'); //del
              editData(id);
              setTimeout(function(){
                $('#m_barang_id').select2(); //del
                selectList_barang();    //del
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormSPP(type, id = null) {
    if (type == 1) {
      var link_url = $base_url+'Gudang/Surat-Permintaan-Pembelian/getForm';
    } else if (type == 2) {
      var link_url = $base_url+'Pembelian/Surat-Permintaan-Pembelian/getForm';
    }

    $.ajax({
      type : 'GET',
      url  : link_url,
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
            // tambahBarangSPP();
          }
          return false;
        });
        $('#m_barang_id').css('width', '100%');
        $('#m_gudang_id_permintaan').css('width', '100%');
        selectList_barang();
        selectList_gudangCabangPermintaan();
        if (id) {
            setTimeout(function(){
              $('#m_barang_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_barang_id').select2();
                selectList_barang();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormPilihBarangPO(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Master-Data/Purchase-Order/getForm',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            tambahBarangPO();
          }
          return false;
        });
        $('#m_barang_id').css('width', '100%');
        selectList_barang();
        if (id) {
            setTimeout(function(){
              $('#m_barang_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_barang_id').select2();
                selectList_barang();
              }, 800);
            }, 200);
        }
      }
    });
}

function openFormPenawaran(id = null) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Pembelian/Penawaran-Harga/getForm',
      data : { id : id },
      dataType : "html",
      success:function(data){
        $("#modaladd .modal-body").html();
        $("#modaladd .modal-body").html(data);
        $('#modaladd').modal('show');
        MyFormValidation.init();
        rules();
        $("#formAdd").submit(function(event){
          if ($("#formAdd").valid() == true) {
            actionData();
            // tambahBarangSPP();
          }
          return false;
        });
        $('#m_partner_id').css('width', '100%');
        // $('#t_spp_id').css('width', '100%');
        selectList_supplier("#m_partner_id");
        // selectList_spp("#t_spp_id");
        if (id) {
            setTimeout(function(){
              $('#m_partner_id').select2('destroy');
              // $('#t_spp_id').select2('destroy');
              editData(id);
              setTimeout(function(){
                $('#m_partner_id').select2();
                // $('#t_spp_id').select2('destroy');
                selectList_supplier("#m_partner_id");
                // selectList_spp("#t_spp_id");
              }, 800);
            }, 200);
        }
      }
    });
}

function checkStatusBkb(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Gudang/Bukti-Keluar-Barang/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusSPP(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Persetujuan/Surat-Permintaan-Pembelian/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusPJ(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Gudang/Permintaan-Jasa/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusPO(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Persetujuan/Purchase-Order/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusBPB(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Pembelian/Penerimaan-Barang/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusRetur(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Pembelian/Retur-Pembelian/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusNotaDebet(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Persetujuan/Nota-Debet/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusEstimasiPenjualan(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Persetujuan/Estimasi-Penjualan/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusPKB(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Gudang/Perhitungan-Kebutuhan-Bahan/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusPB(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Persetujuan/Pengubahan-Bahan/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusST(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Gudang/Serah-Terima/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

function checkStatusPengembalian(id) {
    $.ajax({
      type : 'GET',
      url  : $base_url+'Gudang/Pengembalian-Barang/checkStatus',
      data : { id : id },
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
        }
      }
    });
}

// ACTION FORM
function actionData(){
    $.ajax({
      type : "POST",
      url  : $base_url+''+$("#url").val(),
      data : $( "#formAdd" ).serialize(),
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
          $('#modaladd').modal('hide');
          window.scrollTo(0, 0);
          alert_success_save();
          resetValidation();
          reset();
          searchData();
        } else if (data.status=='204') {
          alert_fail_save();
        }
      }
    });
}

function actionDataFile(){
    var formData = new FormData($( "#formAdd" )[0]);
    $.each($("input[type='file']")[0].files, function(i, file) {
        formData.append('file', file);
    });

    $.ajax({
      type : "POST",
      url  : $base_url+''+$("#url").val(),
      data : formData,
      dataType : "json",
      processData: false,
      contentType: false,
      success:function(data){
        if(data.status=='200'){
          $('#modaladd').modal('hide');
          window.scrollTo(0, 0);
          alert_success_save();
          resetValidation();
          reset();
          searchData();
        } else if (data.status=='204') {
          alert_fail_save();
        }
      }
    });
}

function actionData2(){
    $.ajax({
      type : "POST",
      url  : $base_url+''+$("#url").val(),
      data : $( "#formAdd" ).serialize(),
      dataType : "json",
      success:function(data){
        if(data.status=='200'){
          alert_success_save();
          window.location.href = $base_url+''+$("#url_data").val();
        } else if (data.status=='204') {
          alert_fail_save();
        }
      }
    });
}
// END ACTION FORM

// SELECT2 AJAX
function selectList_cabang() {
  $('#m_cabang_id').select2({
    placeholder: 'Pilih Cabang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Cabang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}
function selectList_cabang_semua() {
  $('#m_cabang_id').select2({
    placeholder: 'Pilih Cabang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Cabang/loadDataSemua',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 0,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_cabang2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Cabang1',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Cabang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_cabangPermintaan() {
  $('#m_cabang_id_permintaan').select2({
    placeholder: 'Pilih Cabang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Cabang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_typeKaryawan() {
  $('#m_type_karyawan_id').select2({
    placeholder: 'Pilih Tipe Karyawan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Tipe-Karyawan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_karyawan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Karyawan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Karyawan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_departemen() {
  $('#m_departemen_id').select2({
    placeholder: 'Pilih Departemen',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Departemen/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_mata_uang(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Mata Uang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Mata-Uang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_Kota(idElemen, url) {
  $(idElemen).select2({
    placeholder: 'Pilih Kota',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+url,
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_jenisGudang() {
  $('#m_jenis_gudang_id').select2({
    placeholder: 'Pilih Jenis Gudang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Jenis-Gudang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_jenisBarang() {
  $('#m_jenis_barang_id').select2({
    placeholder: 'Pilih Jenis Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Jenis-Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_kategoriBarang() {
  $('#m_kategori_barang_id').select2({
    placeholder: 'Pilih Kategori Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Kategori-Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_gudangCabang(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Gudang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Gudang/loadDataSelectCabang2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_gudangCabangPermintaan() {
  $("#m_gudang_id_permintaan").select2({
    placeholder: 'Pilih Gudang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Gudang/loadDataSelectCabang2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_gudangCabangTujuan() {
  $("#m_gudang_id_tujuan").select2({
    placeholder: 'Pilih Gudang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Gudang/loadDataSelectCabang2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_barang() {
  $('#m_barang_id').select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_barang2(idElemen, id) {
  $(idElemen).select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Barang/loadDataSelectUraian',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          id : id,
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_barangKode(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Barang/loadDataSelectKode',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_barangUraian(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_barangGudang(idElemen, id_gudang) {
  $(idElemen).select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Inventory/Stok-Gudang/loadDataSelectBarang',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          id : id_gudang,
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_atributBarang() {
  $('#m_barang_id').select2({
    placeholder: 'Pilih Barang',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Atribut-Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_COA(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih COA ',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/COA/loadDataSelect/2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}
function selectList_COA_semua(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih COA ',
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/COA/loadDataSelect/2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_mesin() {
  $('#m_mesin_id').select2({
    placeholder: 'Pilih Mesin',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Mesin/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_sparepart(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Sparepart',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Sparepart/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_JenisProduksi(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Jenis Produksi',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Jenis-Produksi/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_supplier(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Supplier',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Partner/loadDataSelect1',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_customer(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Customer',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Partner/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_permintaanPembelian(idElemen, url) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SPP',
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+url,
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_penawaran(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Penawaran',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Pembelian/Penawaran-Harga/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_purchaseOrder(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor PO',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Pembelian/Purchase-Order/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_kontrakPenjualan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Kontrak Pernjualan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Kontrak-Penjualan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_kontrakPenjualan2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Kontrak Pernjualan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Kontrak-Penjualan/loadDataSelect3',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_workOrder(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor WO',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Pembelian/Work-Order/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_PJ(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Permintaan Jasa',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Gudang/Permintaan-Jasa/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_penerimaanBarang(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor BPB',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Gudang/Penerimaan-Barang/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_penerimaanBarangPembayaran(idElemen, idSupplier) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor BPB',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Gudang/Penerimaan-Barang/loadDataPembayaran',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          idsup: idSupplier, 
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_returPembelian(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Retur',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Pembelian/Retur-Pembelian/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_notaDebet(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Nota Debet',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Pembelian/Nota-Debet/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_estimasiPenjualan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Estimasi Penjualan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Estimasi-Penjualan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_jadwalProduksi(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Jadwal Produksi',
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Jadwal-Produksi/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_jadwalProduksi2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Jadwal Produksi',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Jadwal-Produksi/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_jadwalProduksiBahanAwal(idElemen, id) {
  $(idElemen).select2({
    placeholder: 'Pilih Nama Bahan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Jadwal-Produksi/loadDataSelectBahanAwal',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          id: id,
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_perhitunganKebutuhan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Perhitungan Kebutuhan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Perhitungan-Kebutuhan-Bahan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_perolehanProduksi(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Perolehan Produksi',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Perolehan-Produksi/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}
function selectList_perolehanProduksi2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Perolehan Produksi',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Perolehan-Produksi/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_pengubahanBahan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Pengubahan Bahan',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Produksi/Pengubahan-Bahan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_POCustomer(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor PO Customer',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Purchase-Order-Customer/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_SOCustomer(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SO Customer',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Sales-Order-Customer/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_SOCustomerMultiple(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SO Customer',
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Sales-Order-Customer/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_SOCustomer2(idElemen, idCust) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SO Customer',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Sales-Order-Customer/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          idCust: $(this).data(idCust),
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_SJ(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SJ',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Surat-Jalan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_SJ2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor SJ',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Surat-Jalan/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_faturPenjualan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Invoice',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Invoice-Penjualan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_fakturPenjualanPembayaran(idElemen, idCustomer, itemDetail = null) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Invoice',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Invoice-Penjualan/loadDataPembayaran',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          idcus: idCustomer, 
          item: itemDetail,
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_customer(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Customer',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Partner/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_suratJalanRetur(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Klaim/Retur',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Surat-Jalan-Retur/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_suratJalanRetur(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Klaim/Retur',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Penjualan/Surat-Jalan-Retur/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_returPenjualan(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Klain/Retur',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Klaim-Retur-Penjualan/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_returPenjualan2(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor Klaim/Retur',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Persetujuan/Klaim-Retur-Penjualan/loadDataSelect2',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_penerimaanBarangRetur(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nomor BPBR',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Gudang/Penerimaan-Barang-Retur/loadDataSelect',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_masterCOA(idElemen,type) {
  $(idElemen).select2({
    placeholder: 'Pilih Kode COA',
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/COA/loadDataSelect/'+type,
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 0,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}
function selectList_masterBank(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nama Bank',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Bank/loadDataSelect/',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function selectList_masterKas(idElemen) {
  $(idElemen).select2({
    placeholder: 'Pilih Nama Kas',
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+'Master-Data/Kas/loadDataSelect/',
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function select2List(idElemen = null, url_data = null, label = null, parameter = null) {
  $(idElemen).select2({
    placeholder: label,
    multiple: false,
    allowClear: true,
    ajax: {
      url: $base_url+url_data,
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          parameter: parameter,
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}

function select2MultipleList(idElemen = null, url_data = null, label = null, parameter = null) {
  $(idElemen).select2({
    placeholder: label,
    multiple: true,
    allowClear: true,
    ajax: {
      url: $base_url+url_data,
      dataType: 'json',
      delay: 100,
      cache: true,
      data: function (params) {
        return {
          q: params.term, // search term
          parameter: parameter,
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: FormatResult,
    templateSelection: FormatSelection,
  });
}
// END SELECT 2 AJAX

$(function(){
    /*
        -- inisialisasi plugin dropify(Drag'nDrop upload),
        -- Digunakan di [baseurl]/user, [baseurl]/user/[iduser]
    */
    // $('.dropify').dropify({
    //     messages: {
    //         'default': 'Drag and drop a file here or click',
    //         'replace': 'Drag and drop or click to replace',
    //         'remove': 'Remove',
    //         'error': 'Ooops, something wrong appended.'
    //     },
    // });
    
    //checkgroupcabang--detail user [baseurl]/user, [baseurl]/user/[iduser]
    checkgc = function(){
        var group = $("#groupus").val();
        if(group!=null){
            $.ajax({
              method: "POST",
              url: "groupus",
              dataType: "Json",
              data:{"field": "id_groupuser", "value": group}
            })
            .done(function( msg ) {
                if(msg[0]["cabang"]=="n"){
                    $("#cabang").val("");
                    $("#cabang").attr("disabled", "disabled");
                }else{
                    $("#cabang").removeAttr("disabled");
                }
            });
        }
    }
    
    checkgca = function(){
        var group = $("#groupus").val();
        if(group == 3){
            $("#typegaselect").show();
        }else{
            $("#typegaselect").hide();
        }
    }
    
    window.loadDashboard = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/Detail",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#container").html(msg);
        });
    }
    
    window.dashboardSales = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/DashboardSales",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#dashboardSales").html(msg);
        });
    }
    
    window.detailSales=function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        
        //penjualan
        showSales("penjualan");
        showSales("transaksi");
        showSales("pengunjung");
        showSales("perhead");
    }
    
    // window.getCabang=function(where){
    //     $('#brand'+where).css('width', '100%');
    //     $('#cabang'+where).css('width', '100%');
    //     var brand = $("#brand"+where).val();
    //     $("#cabang"+where).html("");
        
    //     $.ajax({
    //       method: "POST",
    //       url: $base_url+'Master-Data/Cabang/loadDataSelect',
    //       // url: $("body").data("base_url")+"C_index/getCabangDropdown",
    //       // data:{"brand": brand},
    //       dataType: "Json"
    //     }).done(function(msg){
    //         $("#cabang"+where).select2("val", "");
    //         for(var i=0; i<msg.length; i++){
    //             if(msg.length > 0 && i==0){
    //                 $("#cabang"+where).append("<option value='0'>All Branches</option>");
    //             }
    //             $("#cabang"+where).append("<option value='"+msg[i]['m_cab_id']+"'>"+msg[i]['m_cab_name']+"</option>");
    //         }
    //     });
    // }
    
    window.showSales = function(where){
        var brand   = $("#brand"+where).val();
        var cabang  = $("#cabang"+where).val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            if(brand != null){
                place = "brand";
            }else{
                place = "global";
            }
        }
        if(des != -1){
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_index/getCabangDropdown",
              data:{"brand": brand},
              dataType: "Json"
            }).done(function(msg){
                var cabangdua = new Array();
                for(var i=0; i<msg.length; i++){
                    cabangdua.push(msg[i]['m_cab_id']);
                }
                showSales_(cabangdua, where);
            });
        }else{
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_sales/"+where,
              data:{"brand": brand, "cabang": cabang, "place": place, "start":globalStart, "end":globalEnd, "label":globalLabel}
            }).done(function(msg){
                $("#"+where).html(msg);
            });
        }
    }
    showSales_ = function(cabang, where){
        var brand   = $("#brand"+where).val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_sales/"+where,
          data:{"brand": brand, "cabang": cabang, "place": "cabang", "start":globalStart, "end":globalEnd, "label":globalLabel}
        }).done(function(msg){
            $("#"+where).html(msg);
        });
    }
    
    window.dashboardTrend = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/DashboardTrend",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#dashboardTrend").html(msg);
        });
    }
    
    window.showTrand = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        // var brand   = $("#brandtrend").val();
        var cabang  = $("#cabangtrend").val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            place = "global";
            // cabang[0] = 0;
            // if(brand != null){
            //     place = "brand";
            // }else{
            // }
        }
        if(des != -1){
            // $.ajax({
            //   method: "POST",
            //   url: $("body").data("base_url")+"C_index/getCabangDropdown",
            //   data:{"brand": brand},
            //   dataType: "Json"
            // }).done(function(msg){
            //     var cabangdua = new Array();
            //     for(var i=0; i<msg.length; i++){
            //         cabangdua.push(msg[i]['m_cab_id']);
            //     }
            //     showTrand_(cabangdua, start, end, label);
            // });
        }else{
        // alert(cabang);
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"Dashboard/ShowTrand",
              data:{"cabang": cabang, "place": place, "start":start, "end":end, "label":label}
            }).done(function(msg){
                $("#trend").html(msg);
            });
        }
    }
    showTrand_ = function(cabangdua, start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandtrend").val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_trend/showTrand",
          data:{"brand": brand, "cabang": cabangdua, "place": "cabang", "start":start, "end":end, "label":label}
        }).done(function(msg){
            $("#trend").html(msg);
        });     
    }
    window.dashboardTarget = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_target/dashboard",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#dashboardTarget").html(msg);
        });
    }
    window.showTarget = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandtargetiui").val();
        var cabang  = $("#cabangtargetiui").val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            if(brand != null){
                place = "brand";
            }else{
                place = "global";
            }
        }
        if(des != -1){
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_index/getCabangDropdown",
              data:{"brand": brand},
              dataType: "Json"
            }).done(function(msg){
                var cabangdua = new Array();
                for(var i=0; i<msg.length; i++){
                    cabangdua.push(msg[i]['m_cab_id']);
                }
                showTarget_(cabangdua, start, end, label);
            });
        }else{
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_target/showTarget",
              data:{"brand": brand, "cabang": cabang, "place": place, "start":start, "end":end, "label":label}
            }).done(function(msg){
                $("#targetiui").html(msg);
            });
        }
    }
    showTarget_ = function(cabangdua, start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandtargetiui").val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_target/showTarget",
          data:{"brand": brand, "cabang": cabangdua, "place": "cabang", "start":start, "end":end, "label":label}
        }).done(function(msg){
            $("#targetiui").html(msg);
        });
    }
    window.dashboardsalKon = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_menu/dashboard",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#saleskontribusi").html(msg);
        });
    }
    window.showMenu = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandmenu").val();
        var group   = $("#groupgmenu").val();
        var cabang  = $("#cabangmenu").val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            if(brand != null){
                place = "brand";
            }else{
                place = "global";
            }
        }
        if(des != -1){
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_index/getCabangDropdown",
              data:{"brand": brand},
              dataType: "Json"
            }).done(function(msg){
                var cabangdua = new Array();
                for(var i=0; i<msg.length; i++){
                    cabangdua.push(msg[i]['m_cab_id']);
                }
                showMenu_(cabangdua, start, end, label);
            });
        }else{
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_menu/showMenu",
              data:{"brand": brand, "cabang": cabang, "place": place, "start":start, "end":end, "label":label, "group": group}
            }).done(function(msg){
                $("#menu").html(msg);
            });
        }
    }
    showMenu_ = function(cabangdua, start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandmenu").val();
        var group   = $("#groupgmenu").val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_menu/showMenu",
          data:{"brand": brand, "cabang": cabangdua, "place": "cabang", "start":start, "end":end, "label":label, "group": group}
        }).done(function(msg){
            $("#menu").html(msg);
        });
    }
    window.dashboardmarKon = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_menu/dashboardmargin",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#marginkontribusi").html(msg);
        });
    }
    window.showMargin = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandmenu").val();
        var group   = $("#groupgmenu").val();
        var cabang  = $("#cabangmenu").val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            if(brand != null){
                place = "brand";
            }else{
                place = "global";
            }
        }
        if(des != -1){
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_index/getCabangDropdown",
              data:{"brand": brand},
              dataType: "Json"
            }).done(function(msg){
                var cabangdua = new Array();
                for(var i=0; i<msg.length; i++){
                    cabangdua.push(msg[i]['m_cab_id']);
                }
                showMargin_(cabangdua, start, end, label);
            });
        }else{          
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"C_menu/showMargin",
              data:{"brand": brand, "cabang": cabang, "place": place, "start":start, "end":end, "label":label, "group": group}
            }).done(function(msg){
                $("#margin").html(msg);
            });
        }
    }
    showMargin_ = function(cabangdua, start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandmenu").val();
        var group   = $("#groupgmenu").val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_menu/showMargin",
          data:{"brand": brand, "cabang": cabangdua, "place": "cabang", "start":start, "end":end, "label":label, "group": group}
        }).done(function(msg){
            $("#margin").html(msg);
        });
    }
    window.dashboardmatrix = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/DashboardMatrix",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            // console.log(msg);
            $("#matrixmargin").html(msg);
        });
    }
    window.showMatrix = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        // var brand   = $("#brandmatrix").val();
        var group   = $("#groupmatrix").val();
        var cabang  = $("#cabangmatrix").val();
        var place   = "";
        var des     = -1;
        
        if(cabang != null){
            place = "cabang";
            des = cabang.indexOf('0');
        }else{
            // if(brand != null){
            //     place = "brand";
            // }else{
            // }
            place = "global";
        }
        if(des != -1){
            // $.ajax({
            //   method: "POST",
            //   url: $("body").data("base_url")+"C_index/getCabangDropdown",
            //   data:{"brand": brand},
            //   dataType: "Json"
            // }).done(function(msg){
            //     var cabangdua = new Array();
            //     for(var i=0; i<msg.length; i++){
            //         cabangdua.push(msg[i]['m_cab_id']);
            //     }
            //     showMatrix_(cabangdua, start, end, label);
            // });
        }else{          
            $.ajax({
              method: "POST",
              url: $("body").data("base_url")+"Dashboard/ShowMatrix",
              data:{"cabang": cabang, "place": place, "start":start, "end":end, "label":label, "group": group}
            }).done(function(msg){
                $("#matrix").html(msg);
            });
        }
    }
    showMatrix_ = function(cabangdua, start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        var brand   = $("#brandmatrix").val();
        var group   = $("#groupmatrix").val();
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"C_matrix/showMatrix",
          data:{"brand": brand, "cabang": cabangdua, "place": "cabang", "start":start, "end":end, "label":label, "group": group}
        }).done(function(msg){
            $("#matrix").html(msg);
        });
    }

    window.dashboardStok = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/DashboardStok",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#dashboardStok").html(msg);
        });
    }

    window.dashboardProduksi = function(start, end, label){
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/DashboardProduksi",
          data:{"start": start, "end": end, "label": label}
        }).done(function(msg){
            $("#dashboardProduksi").html(msg);
        });
    }
    
    window.showProduksi = function(start, end, label){
        globalStart = start;
        globalEnd   = end;
        globalLabel = label;
        $.ajax({
          method: "POST",
          url: $("body").data("base_url")+"Dashboard/ShowProduksi",
          data:{"start":start, "end":end, "label":label}
        }).done(function(msg){
            $("#produksi").html(msg);
        });
    }
    // $('.summernote').summernote({
    //     height: 320,                 // set editor height
    //     minHeight: null,             // set minimum height of editor
    //     maxHeight: null,             // set maximum height of editor
    //     focus: false                 // set focus to editable area after initializing summernote
    // });
});
/***
Usage
***/
//Custom.doSomeStuff();