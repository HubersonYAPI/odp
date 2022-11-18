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
    console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-odp.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == "success") {
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
                $('#edit_odp_ref').val(data.odp_ref);
                $('#edit_odp_long').val(data.odp_long);
                $('#edit_odp_larg').val(data.odp_larg);
                $('#edit_odp_sup').val(data.odp_sup);
                $('#edit_odp_quartier').val(data.odp_quartier);
                $('#edit_odp_localisation').val(data.odp_localisation);
                $('#edit_odp_obs').val(data.odp_obs);
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
 
    $("#odpversform").submit(function(event) {
        // prevent default php procesing
        event.preventDefault();
        // collect user inputs  
        var datatopost = $(this).serializeArray();
        console.log(datatopost);
        // send them to signup.php using AJAX
        $.ajax({
            url: "./../page/vers-odp.php",
            type: "POST",
            data: datatopost,
            success: function(data) {
                if (data == "success") {
                    // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
                    window.location = "./../page/odp.php";
                    // console.log("data");
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

    $("#odpversform1").submit(function(event) {
        // prevent default php procesing
        event.preventDefault();
        // collect user inputs  
        var datatopost = $(this).serializeArray();
        console.log(datatopost);
        // send them to signup.php using AJAX
        $.ajax({
            url: "./../page/vers-odp1.php",
            type: "POST",
            data: datatopost,
            success: function(data) {
                if (data == "success") {
                    // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
                    // window.location = "./../page/odp.php";
                    console.log("data");
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
                console.log(data);
                $('#view_odp_ref').val(data.odp_ref);
                $('#view_odp_long').val(data.odp_long);
                $('#view_odp_larg').val(data.odp_larg);
                $('#view_odp_sup').val(data.odp_sup);
                $('#view_odp_quartier').val(data.odp_quartier);
                $('#view_odp_localisation').val(data.odp_localisation);
                $('#view_odp_obs').val(data.odp_obs);
                $('#view_trader_name').val(data.com_nom + " " + data.com_prenoms);
                $('#view_trader_company').val(data.com_ent);
                $('#view_trader_phone').val(data.com_cel1);
                $('#view_trader_phone2').val(data.com_cel2);
                $('#view_trader_mail').val(data.com_mail);
                $('#view_trader_addr').val(data.com_addr);
                $('#view_cont_name').val(data.ag_nom);
                $('#view_cont_phone').val(data.ag_cel1);
                $('#employee_id').val(data.odp_id);
                $('#info-xl').modal('show');

            },
            error: function() {

            }
        });

    });

    $(document).on('click', '.vers_odp', function() {

        var employee_id = $(this).attr("id");
        // console.log(employee_id);
        
        $.ajax({
            url: "./../page/view-vers-odp.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                // console.log($vers_date);
                $('#reg_reste').val(data.reg_reste);
                $('#reg_avance').val(data.reg_avance);
                $('#reg_prix').val(data.reg_prix);
                $('#reg_odp_ref').val(data.odp_ref);
                $('#reg_odp_quartier').val(data.odp_quartier);
                $('#reg_odp_sup').val(data.odp_sup);
                $('#reg_trader_name').val(data.com_nom + " " + data.com_prenoms);
                $('#reg_trader_phone').val(data.com_cel1);
                $('#vers_reglements_id').val(data.reg_id);
                $('#vers_odp_id').val(data.odp_id);
                $('#vers_commercants_id').val(data.com_id);
                $('#vers_agents_id').val(data.ag_id);
                $('#employee_id').val(data.odp_id);
                $('#vers-lg').modal('show');

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