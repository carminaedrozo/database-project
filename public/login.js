$("#submitBtn").on("click", function (e) {

    $("#failLogin").addClass("d-none");

    var username = $("#exampleInputEmail1").val();
    var password = $("#exampleInputPassword1").val();


    $.ajax({
        url: baseurl + "/login",
        data: {
            "username": username,
            "password": password
        },
        dataType: "json",
        type: "POST"
    }).done(function (response) {


});
    return false;
});

$("#logout").on("click", function () {

    $("#successfulLogin").addClass("d-none");
    $("#mainPage").removeClass("d-none");
    return false;
});