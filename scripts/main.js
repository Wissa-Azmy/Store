var sub = $('#submit');
var productName = $('#productName');
var price = $('#price');
var details = $('#details');
var category = $('#category');
var subcategory = $('#subcategory');
var photo = $('#photo');
var keywords = $('#keywords');
var edit = $('#edit');
//var delbtn = $('.delete');


var xhr = new XMLHttpRequest();

$( window ).load(function() {
    $.ajax({
            url: '../pages/inventory_process.php',
            type: 'GET'
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        })
        .success(function(event) {

            table = JSON.parse(event);

            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("page load complete");
        });
});


sub.on('click', function(event) {
    event.preventDefault();

    $.ajax({
            url: '../pages/inventory_process.php',
            type: 'POST',
            data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
        })
        .success(function(event) {
console.log(event);
            table = JSON.parse(event);

                var result = $('#result');
                result.html(table);

        })

        .always(function() {
            console.log("insertion completed");
        });
});


$('table').on('click','.delete', function(event) {
    event.preventDefault();

    btnval = $(this).val();

    $.ajax({

            url: '../pages/inventory_process.php?del='+btnval,
            type: 'GET'
        })
        .success(function(event) {
            console.log(event);

            table = JSON.parse(event);
            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("deletion completed");
        });

});

var btnval;

$('table').on('click','.edit', function(event) {
    event.preventDefault();

    btnval = $(this).val();

    alert('editBtn clicked '+btnval);

    $.ajax({

            url: '../pages/inventory_process.php?edit='+btnval,
            type: 'GET'
        })
        .success(function(event) {
            console.log(event);

            table = JSON.parse(event);
            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("deletion completed");
        });

});
