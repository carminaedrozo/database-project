$("#submitReq").on("click", function () {
    $.ajax({
        url: baseurl + '/submitRequest',
        dataType: "json",
        type: "POST"
    });
});