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
            $('#view_user').val(data.com_nom);
            $('#view_status').val(data.plainte_status);
            $('#view_motif').val(data.plainte_motif);
            $('#view_desc').val(data.plainte_des);
            $('#ag_id').val(data.ag_id);
            $('#ag_nom').val(data.ag_nom+" "+data.ag_prenoms);
            $('#view_contact').val(data.ag_cel1);
            $('#view_rapport').val(data.plainte_rapp);
            $('#employee_id').val(data.plainte_id);
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
                window.location = "./../page/mailbox-sent.php";
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
                window.location = "./../page/mailbox-solve.php";
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
