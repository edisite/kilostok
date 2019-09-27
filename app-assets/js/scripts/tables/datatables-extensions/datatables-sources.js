/*=========================================================================================
    File Name: datatables-sources.js
    Description: Sources Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.1
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
var $base_url = $("body").data("base_url");

$(document).ready(function() {
/**************************************
*       Server-side processing        *
**************************************/
    searchMitra_masterData_barang();
    searchMitra_masterData_gudang();
    searchMitra_masterData_supplier();

} );
// ------------------- MITRA ------------------
function searchMitra_masterData_barang() { 
    $('#barang-server-side').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax":  $base_url + "mitra/barang/loadData"
    } );    
}
function searchMitra_masterData_gudang() { 
    $('#gudang-server-side').DataTable( {
        "processing": true,
        "serverSide": true,        
        "ajax":  $base_url + "mitra/gudang/loadData"
    } );    
}
function searchMitra_masterData_supplier() { 
    $('#supplier-server-side').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax":  $base_url + "mitra/supplier/loadData"
    } );    
}

// -------------------END MITRA -----------------