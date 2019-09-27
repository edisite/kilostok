var $base_url = $("body").data("base_url");

$('#formAdd').not("[type=submit]").jqBootstrapValidation({
            preventSubmit: true,
            submitSuccess: function($form, event){     
             event.preventDefault();
             $this = $('#barangbtn');
             $this.prop('disabled', true);
             var form_data = $("#formAdd").serialize();
             $.ajax({
              url: $base_url+''+$("#url").val(),
              method:"POST",
              data:form_data,
              success:function(){
                    alert_success_save();
                        $('#success').html("<div class='alert alert-success'><strong>Your message has been sent. </strong></div>");
                    $('#formAdd').trigger('reset');
                    $('#formAdd').select2("destroy");
              },
              error:function(){
                     $('#success').html("<div class='alert alert-danger'>There is some error</div>");
                    $('#formAdd').trigger('reset');
              },
              complete:function(){
               setTimeout(function(){
                $this.prop("disabled", false);
                $('#success').html('');
               }, 5000);
              }
             });
            },
    });
    
    
    function alert_success_save() {
    swal({
        title: "Success!",
        text: "Data telah tersimpan!",
        type: "success",
        confirmButtonClass: "btn-raised btn-success",
        confirmButtonText: "OK",
    });
}
