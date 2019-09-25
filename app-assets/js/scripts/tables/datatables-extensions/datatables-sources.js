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
        //"ajax": "../server_side/scripts/server_processing.php" NOTE: use serverside script to fatch the data
        "ajax":  $base_url + "mitra/gudang/loadData"
    } );    
}

// -------------------END MITRA -----------------