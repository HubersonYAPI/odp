$("#interform").submit(function (event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  

    var datatopost = $(this).serializeArray();
    console.log(datatopost);

    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-inter.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data == "success") {
                window.location = "./../page/mailbox.php";
                // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
            } else {
                $("#errormessage").html(data);
            }
        },
        error: function () {
            $("#errormessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

    });

});


$(document).on('click', '.view_inter', function() {

    var employee_id = $(this).attr("id");
    // console.log(employee_id);
    $.ajax({
        url: "./../page/view-inter.php",
        method: "POST",
        data: {
            employee_id: employee_id
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            $('#view_user').val(data.username);
            $('#view_panne').val(data.panne);
            $('#view_desc').val(data.description);
            $('#view_priorite').val(data.priorite);
            $('#info_id').val(data.info_id);
            $('#view_diagnostic').val(data.diagnostic);
            $('#view_solution').val(data.solution);
            $('#employee_id').val(data.inter_id);
            $('#modal-lg').modal('show');
            

        },
        error: function() {

        }
    });

});

$("#waitform").submit(function (event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  

    var datatopost = $(this).serializeArray();
    // console.log(datatopost);

    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-info-inter.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            // console.log(data);
            if (data == "success") {
                window.location = "./../page/waiting.php";
                // $("#errorwaitmessage").html("<div class='alert alert-success'>Added.</div>");
            } else {
                $("#errorwaitmessage").html(data);
            }
        },
        error: function () {
            $("#errorwaitmessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

    });  

});

$("#sentform").submit(function (event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  

    var datatopost = $(this).serializeArray();
    // console.log(datatopost);

    // send them to signup.php using AJAX
    $.ajax({
        url: "./../page/add-sol-inter.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            // console.log(data);
            if (data == "success") {
                window.location = "./../page/waiting.php";
                // $("#errorwaitmessage").html("<div class='alert alert-success'>Added.</div>");
            } else {
                $("#errorsentmessage").html(data);
            }
        },
        error: function () {
            $("#errorsentmessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

    });

});
