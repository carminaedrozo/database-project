$("#addOrder").on("click", function () {
    var title = $("#inputTitle").val();
    var quantity = $("#inputQuantity").val();

    $.ajax({
        url: baseurl + "/create/order",
        data: {
            "title": title,
            "quantity": quantity
        },
        dataType: "json",
        type: "POST"
    }).done(function (response) {
        console.log(response);
    });

});