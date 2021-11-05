$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

$("#odpform").submit(function(event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-odp.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == "success") {
                // console.log(data);
                // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
                window.location = "./../page/odp.php";
            } else {
                $("#errormessage").html(data);
                console.log(data);

            }
        },
        error: function() {
            $("#errormessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

    });

});

$(document).ready(function() {

    $(document).on('click', '.edit_odp', function() {

        var employee_id = $(this).attr("id");

        $.ajax({
            url: "./../page/view-odp.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#edit_annee').val(data.annee);
                $('#edit_reference').val(data.reference);
                $('#edit_total').val(data.total);
                $('#edit_indic').val(data.indic);
                $('#edit_reste').val(data.reste);
                $('#edit_jour').val(data.jour);
                $('#edit_longu').val(data.longu);
                $('#edit_larg').val(data.larg);
                $('#edit_sup').val(data.sup);
                $('#edit_secteur').val(data.secteur);
                $('#edit_localisation').val(data.localisation);
                $('#edit_cont_name').val(data.cont_name);
                $('#edit_trader_id').val(data.trader_name);
                $('#edit_obs').val(data.obs);
                $('#employee_id').val(data.odp_id);
                $('#update-lg').modal('show');
            },
            error: function() {

            }
        });

    });

    $("#odpupdateform").submit(function(event) {
        // prevent default php procesing
        event.preventDefault();
        // collect user inputs  

        var datatopost = $(this).serializeArray();
    // console.log(datatopost);

        // send them to signup.php using AJAX
        $.ajax({
            url: "./../page/edit-odp.php",
            type: "POST",
            data: datatopost,
            success: function(data) {
                if (data == "success") {
                    window.location = "./../page/odp.php";
                    // $('#update-lg').modal('show');
                    // $("#errorupmessage").html("<div class='alert alert-success'>Edited.</div>");
                } else {
                    $('#update-lg').modal('show');
                    $("#errorupmessage").html(data);
                }
            },
            error: function() {
                $('#update-lg').modal('show');
                $("#errorupmessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
            }

        });

    });

    $(document).on('click', '.view_odp', function() {

        var employee_id = $(this).attr("id");
        $.ajax({
            url: "./../page/view-odp.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('#view_annee').val(data.annee);
                $('#view_reference').val(data.reference);
                $('#view_total').val(data.total);
                $('#view_indic').val(data.indic);
                $('#view_reste').val(data.reste);
                $('#view_jour').val(data.jour);
                $('#view_longu').val(data.longu);
                $('#view_larg').val(data.larg);
                $('#view_sup').val(data.sup);
                $('#view_secteur').val(data.secteur);
                $('#view_localisation').val(data.localisation);
                $('#view_obs').val(data.obs);
                $('#view_trader_name').val(data.trader_name);
                $('#view_trader_company').val(data.trader_company);
                $('#view_trader_phone').val(data.trader_phone);
                $('#view_trader_phone2').val(data.trader_phone2);
                $('#view_trader_mail').val(data.trader_mail);
                $('#view_trader_addr').val(data.trader_addr);
                $('#view_cont_name').val(data.cont_name);
                $('#view_cont_phone').val(data.cont_phone);
                $('#employee_id').val(data.odp_id);
                $('#info-xl').modal('show');

            },
            error: function() {

            }
        });

    });

    $(document).on('click', '.del_odp', function() {

        var employee_id = $(this).attr("id");
        var datatopost = $(this).serializeArray();
        // console.log(employee_id);
        // console.log(datatopost);
        $.ajax({
            url: "./../page/del-odp.php",
            type: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                window.location = "./../page/odp.php";

            },
            error: function() {}

        });



    });

});