var sub = $('#submit');
var productName = $('#productName');
var price = $('#price');
var details = $('#details');
var category = $('#category');
var subcategory = $('#subcategory');
var photo = $('#photo');
var keywords = $('#keywords');
var edit = $('#edit');
var delbtn = $('.delete');


var xhr = new XMLHttpRequest();

$( window ).load(function() {
    $.ajax({
            url: '../pages/inventory_process.php',
            type: 'GET'
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            //data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
        })
        .success(function(event) {

            table = JSON.parse(event);

            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("complete");
        });
});

//$(window).on('load')

sub.on('click', function(event) {
    event.preventDefault();
    alert('clicked');

    $.ajax({
            url: '../pages/inventory_process.php',
            type: 'POST',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
        })
        .success(function(event) {

            table = JSON.parse(event);

                var result = $('#result');
                result.html(table);

        })

        .always(function() {
            console.log("complete");
        });
});

//delbtn.on('click', function(event) {
//    event.preventDefault();
//    console.log("del Clicked");
//    alert('clicked');

    //var value = del.parentNode.previousSibling.nodeValue();
    //$.ajax({
    //        url: '../pages/inventory_process.php?id='+val,
    //        type: 'GET'
    //        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    //        //data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
    //    })
    //    .success(function(event) {
    //
    //        table = JSON.parse(event);
    //
    //        var result = $('#result');
    //        result.html(table);
    //
    //    })
    //
    //    .always(function() {
    //        console.log("complete");
    //    });
//});
var btnval;

$('table').on('click','.delete', function(event) {
    event.preventDefault();
    console.log("del Clicked");

    btnval = $(this).val();
    alert(btnval);

    $.ajax({
            url: '../pages/inventory_process.php?id='+btnval,
            type: 'GET'
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            //data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
        })
        .success(function(event) {

            table = JSON.parse(event);

            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("complete");
        });

});

//var id;
//function req (id) {
//    event.preventDefault();
//    alert('clicked');
//
//    $.ajax({
//            url: '../pages/inventory_process.php?id='+id,
//            type: 'GET'
//             //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
//            //data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
//        })
//        .success(function(event) {
//
//            table = JSON.parse(event);
//
//            var result = $('#result');
//            result.html(table);
//
//        })
//
//        .always(function() {
//            console.log("complete");
//        });
//};

//delbtn.onclick(function(){
//   alert('delete Clicked');
//});