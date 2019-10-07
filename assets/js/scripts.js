(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */
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

    
    
    //1. mitra->barang search
        // Loading remote data
        
    $("#m_kategori_barang_id").select2({
      placeholder: "Pilih Kategori Barang",
      ajax: {
        url: $base_url + "api/internal/kategoribarang/loaddata_select",
        dataType: 'json',
        delay: 250,
        cache: true,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {

          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo, // omitted for brevity, see the source of this page
      templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
    
//    end  -------------
    //1. mitra->barang search
        // Loading remote data   
        
    $("#m_satuan_barang_id").select2({
      placeholder: "Pilih Satuan Barang",
      ajax: {
        url: $base_url + "api/internal/satuan/loaddata_select",
        dataType: 'json',
        delay: 250,
        cache: true,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {

          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo, // omitted for brevity, see the source of this page
      templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
    
//    end  -------------
    
    function formatRepo (repo) {
      if (repo.loading) return repo.text;

      var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__avatar'></div>" +
          "<div class='select2-result-repository__title'>" + repo.text + "</div></div>";

      return markup;
    }
    function formatRepoSelection (repo) {
      return repo.text || repo.text;
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
              //window.location.href = $base_url +''+$("#url_data").val();
            } else if (data.status=='204') {
              alert_fail_save();
            }
          }
        });
    }

        //1. mitra->RAB search parent
        // Loading remote data
        
        $("#m_mitra_rab_select").select2({
          placeholder: "Pilih Parent RAB",
          ajax: {
            url: $base_url + "api/internal/RAB/loaddata_select",
            dataType: 'json',
            delay: 250,
            cache: true,
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
            },
            processResults: function (data, params) {
    
              params.page = params.page || 1;
    
              return {
                results: data.items,
                pagination: {
                  more: (params.page * 30) < data.total_count
                }
              };
            },
            cache: true
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 0,
          templateResult: formatRepo, // omitted for brevity, see the source of this page
          templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });

        //1. mitra->RAB search parent
        // Loading remote data
        
        $("#m_mitra_supplier_select").select2({
          placeholder: "Pilih Supplier",
          ajax: {
            url: $base_url + "api/internal/supplier/loaddata_select",
            dataType: 'json',
            delay: 250,
            cache: true,
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
            },
            processResults: function (data, params) {
    
              params.page = params.page || 1;
    
              return {
                results: data.items,
                pagination: {
                  more: (params.page * 30) < data.total_count
                }
              };
            },
            cache: true
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 0,
          templateResult: formatRepo, // omitted for brevity, see the source of this page
          templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });


      

    

})(window);