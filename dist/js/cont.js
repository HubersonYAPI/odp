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

$("#contform").submit(function(event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-cont.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == "success") {
                window.location = "./../page/cont.php";
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

    $(document).on('click', '.edit_cont', function() {

        var employee_id = $(this).attr("id");

        $.ajax({
            url: "./../page/view-cont.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                $('#edit_cont_name').val(data.cont_name);
                $('#edit_cont_phone').val(data.cont_phone);
                $('#edit_cont_phone2').val(data.cont_phone2);
                $('#edit_cont_mail').val(data.cont_mail);
                $('#edit_cont_addr').val(data.cont_addr);
                $('#edit_cont_img').val(data.cont_img);
                $('#employee_id').val(data.cont_id);
                $('#update-lg').modal('show');
            },
            error: function() {

            }
        });

    });

    $("#contupdateform").submit(function(event) {
        // prevent default php procesing
        event.preventDefault();
        // collect user inputs  

        var datatopost = $(this).serializeArray();
        console.log(datatopost);
        // send them to signup.php using AJAX
        $.ajax({
            url: "./../page/edit-cont.php",
            type: "POST",
            data: datatopost,
            success: function(data) {
                if (data == "success") {
                    $('#update-lg').modal('show');
                    window.location = "./../page/cont.php";
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

    $(document).on('click', '.view_cont', function() {

        var employee_id = $(this).attr("id");

        $.ajax({
            url: "./../page/view-cont.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#view_cont_name').val(data.cont_name);
                $('#view_cont_phone').val(data.cont_phone);
                $('#view_cont_phone2').val(data.cont_phone2);
                $('#view_cont_mail').val(data.cont_mail);
                $('#view_cont_addr').val(data.cont_addr);
                $('#edit_cont_img').val(data.cont_img);
                $('#employee_id').val(data.cont_id);
                $('#info-xl').modal('show');

            },
            error: function() {

            }
        });

    });

    $(document).on('click', '.del_cont', function() {

        var employee_id = $(this).attr("id");
        var datatopost = $(this).serializeArray();
        console.log(employee_id);
        console.log(datatopost);
        $.ajax({
            url: "./../page/del-cont.php",
            type: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                window.location = "./../page/cont.php";

            },
            error: function() {}

        });



    });

});