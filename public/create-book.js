$("#addBtnBook").on("click", function () {

    var title = $("#inputTitle").val();
    var author = $("#inputAuthor").val();
    var edition = $("#inputEdition").val();
    var isbn10 = $("#inputIsbn10").val();
    var isbn13 = $("#inputIsbn13").val();
    var publisher = $("#inputPublisher").val();
    var price = $("#inputPrice").val();
    var image = $("#inputImage").val();
    var quantity = $("#inputQuantity").val();

    $.ajax({
        url: baseurl + "/create/book",
        data: {
            "title": title,
            "author": author,
            "edition": edition,
            "isbn10": isbn10,
            "isbn13": isbn13,
            "publisher": publisher,
            "price": price,
            "quantity": quantity,
            "image": image

        },
        dataType: "json",
        type: "POST"
        // success: function(data){
        //
        // }
    }).done(function (response) {
        console.log(response);

        $("#inputTitle").val("");
        $("#inputAuthor").val("");
        $("#inputEdition").val("");
        $("#inputIsbn10").val("");
        $("#inputIsbn13").val("");
        $("#inputPublisher").val("");
        $("#inputPrice").val("");
        $("#inputImage").val("");
        $("#inputQuantity").val("");

    });
    return false;

    // $( 'form' ).on( 'submit', function( event ) {
  	// var $form = $( this );
    //
    // event.preventDefault();
    // $('.js-alert').addClass('d-none');
    // $('.js-btn').button('loading');
    //
    // $.ajax({
    //   url: baseurl,
    //   type: 'POST',
    //   data: {
    //   	json: $form.serialize(),
  	// 		delay: 2
    //   },
    // }).done(function(response){
    //   $('.js-alert').removeClass('d-none');
    //   $('.js-btn').button('reset');
    // });


});
