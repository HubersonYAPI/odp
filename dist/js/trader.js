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

$("#traderform").submit(function(event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-trader.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == "success") {
            // console.log(data);

                window.location = "./../page/trader.php";
                // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
            } else {
                $("#errormessage").html(data);
            }
        },
        error: function() {
            $("#errormessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

    });

});

$(document).ready(function() {

    $(document).on('click', '.edit_trader', function() {

        var employee_id = $(this).attr("id");

        $.ajax({
            url: "./../page/view-trader.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                $('#edit_trader_name').val(data.com_nom);
                $('#edit_trader_fname').val(data.com_prenoms);
                $('#edit_trader_company').val(data.com_ent);
                $('#edit_trader_phone').val(data.com_cel1);
                $('#edit_trader_phone2').val(data.com_cel2);
                $('#edit_trader_mail').val(data.com_mail);
                $('#edit_trader_addr').val(data.com_addr);
                $('#employee_id').val(data.com_id);
                $('#update-lg').modal('show');
            },
            error: function() {

            }
        });

    });

    $("#traderupdateform").submit(function(event) {
        // prevent default php procesing
        event.preventDefault();
        // collect user inputs  

        var datatopost = $(this).serializeArray();
        console.log(datatopost);
        // send them to signup.php using AJAX
        $.ajax({
            url: "./../page/edit-trader.php",
            type: "POST",
            data: datatopost,
            success: function(data) {
                if (data == "success") {
                    $('#update-lg').modal('show');
                    window.location = "./../page/trader.php";
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

    $(document).on('click', '.view_trader', function() {

        var employee_id = $(this).attr("id");

        $.ajax({
            url: "./../page/view-trader.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('#view_trader_name').val(data.com_nom);
                $('#view_trader_company').val(data.com_ent);
                $('#view_trader_phone').val(data.com_cel1);
                $('#view_trader_phone2').val(data.com_cel2);
                $('#view_trader_mail').val(data.com_mail);
                $('#view_trader_addr').val(data.com_addr);
                $('#employee_id').val(data.com_id);
                $('#info-xl').modal('show');

            },
            error: function() {

            }
        });

    });

    $(document).on('click', '.del_trader', function() {

        var employee_id = $(this).attr("id");
        var datatopost = $(this).serializeArray();
        console.log("emp "+employee_id);
        console.log("post "+datatopost);
        $.ajax({
            url: "./../page/del-trader.php",
            type: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                console.log("data "+data);
                // window.location = "./../page/trader.php";

            },
            error: function() {}

        });



    });

});