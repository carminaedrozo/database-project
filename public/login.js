$("#submitBtn").on("click", function (e) {

    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();

    $.ajax({
        url: baseurl + "/login",
        data: {
            "email": email,
            "password": password
        },
        dataType: "json",
        type: "POST"
    }).done(function (response) {
        if (response.passwordMatched === "true") {

            window.location.href = baseurl + "/home";


        } else {

        }
    });
    return false;
});

$("#logout").on("click", function () {

    $("#successfulLogin").addClass("d-none");
    $("#mainPage").removeClass("d-none");
    return false;
});