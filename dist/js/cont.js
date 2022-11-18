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
                // console.log(data);

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
                $('#edit_ag_nom').val(data.ag_nom);
                $('#edit_ag_prenoms').val(data.ag_prenoms);
                $('#edit_ag_cel1').val(data.ag_cel1);
                $('#edit_ag_cel2').val(data.ag_cel2);
                $('#edit_ag_mail').val(data.ag_mail);
                $('#edit_ag_addr').val(data.ag_addr);
                $('#edit_ag_service').val(data.ag_service);
                $('#edit_ag_poste').val(data.ag_poste);
                $('#employee_id').val(data.ag_id);
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
                // console.log(data);
                $('#view_ag_nom').val(data.ag_nom + " " + data.ag_prenoms);
                $('#view_ag_service').val(data.ag_service);
                $('#view_ag_poste').val(data.ag_poste);
                $('#view_ag_cel1').val(data.ag_cel1);
                $('#view_ag_cel2').val(data.ag_cel2);
                $('#view_ag_mail').val(data.ag_mail);
                $('#view_ag_addr').val(data.ag_addr);
                $('#employee_id').val(data.ag_id);
                $('#employee_ag_id').val(data.ag_id);
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