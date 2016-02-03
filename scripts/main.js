var sub = $('#submit');
var productName = $('#productName');
var price = $('#price');
var details = $('#details');
var category = $('#category');
var subcategory = $('#subcategory');
var photo = $('#photo');
var keywords = $('#keywords');
var edit = $('#edit');
var updbtn = $('#update');


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

$('form').on('click','#update', function(event) {
    event.preventDefault();
    alert("edit clicked "+btnval);
    btnval = $(this).val();

    $.ajax({
            url: '../pages/inventory_process.php?update='+btnval,
            type: 'GET'
            //data: {productName: productName.val(), price: price.val(), details: details.val(), category: category.val(), subcategory: subcategory.val(), photo: photo.val(), keywords: keywords.val()}
        })
        .success(function(event) {
            console.log(event);
            table = JSON.parse(event);

            var result = $('#result');
            result.html(table);

        })

        .always(function() {
            console.log("update completed");
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

    btnval = $(this).val();

    $.ajax({

            url: '../pages/inventory_process.php?edit='+btnval,
            type: 'GET'
        })
        .success(function(event) {
            console.log(event);

            table = JSON.parse(event);
            productName.val(table[1]);
            price.val(table[2]);
            //photo.val(table[5]);
            keywords.val(table[8]);
            details.val(table[3]);
            sub.attr('id','update');
            sub.attr('value', btnval);

        })

        .always(function() {
            console.log("view edit completed");
        });

});
