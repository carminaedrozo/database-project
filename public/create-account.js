$("#addBtnAccount").on("click", function () {

    var role = $("#statusRole input").val();
    var first_name = $("#inputFirstName").val();
    var last_name = $("#inputLastName").val();
    var email = $("#inputEmailConfirm").val();
    var password = $("#inputPassword").attr('placeholder');


    $.ajax({
        url: baseurl + "/create/account",
        data: {
            "role": role,
            "first_name": first_name,
            "last_name": last_name,
            "email": email,
            "password": password,

        },
        dataType: "json",
        type: "POST"
    }).done(function (response) {
        console.log(response);

        $("#inputFirstName").val("");
        $("#inputLastName").val("");
        $("#inputEmail").val("");
        $("#inputEmailConfirm").val("");

    });
    return false;
});