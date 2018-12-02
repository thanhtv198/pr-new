//hover image
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.image-bot-container>img').hover(function () {
        $('.image-top>img').attr('src', $(this).attr('src'));
        $(this).css("border", "1px solid whitesmoke");
    });
// add-cart

    $('.product-icon-container').find('a').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                var a = document.getElementById("count_cart").innerText;
                var b = parseInt(a) + 1;
                document.getElementById("count_cart").innerHTML = b;
                alert('Add to cart success');
            }
        });

        return false; //for good measure
    });


// function addToCart() {
//     var a = document.getElementById("count_cart").innerText;
//     var b = parseInt(a) + 1;
//     document.getElementById("count_cart").innerHTML = b;
// }

// add-wishlist

    $('.product-add-wishlist').find('a').click(function (event) {
        event.preventDefault();

        let url = $(this).attr('href');
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                console.log(data)
                if (data && data.product > 0) {
                    alert(data.message);
                } else {
                    var a = document.getElementById("count_wishlist").innerText;
                    var b = parseInt(a) + 1;
                    document.getElementById("count_wishlist").innerHTML = b;
                    alert(data.success);
                }
            }
        });

        return false; //for good measure
    });


//del -wishlist

    $(document).on('click', '.del-button', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (confirm('Are you sure!')) {
            let id = $(this).attr('id');
            let url = $(this).attr('data-url');
            $('#row-' + id).remove();
            $.ajax({
                url: url,
                type: 'POST',  // user.destroy
                success: function (result) {

                    var a = document.getElementById("count_wishlist").innerText;
                    var b = parseInt(a) - 1;
                    document.getElementById("count_wishlist").innerHTML = b;
                    if (b == 0) {
                        alert(result.empty)
                    }
                }
            });
        }
    });


    $(document).on('click', '.del-button-post', function (e) {
        if (confirm('Are you sure!')) {
            let id = $(this).attr('id');
            $('#row-' + id).remove();
            let url = $(this).attr('data-url');
            // alert(url);
            $.ajax({
                url: url,
                type: 'DELETE',  // user.destroy
                success: function (result) {

                }
            });
        }
    });

// add-compare

    $('.compare_count').find('a').click(function (event) {
        event.preventDefault();
        var a = document.getElementById("count_compare").innerText;
        if (a >= 2) {
            alert('Can\'t compare over 2 produts');
            return false;
        }
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                console.log(data)
                if (data && data == 1) {
                    // document.getElementById("count_compare").innerHTML = 1;
                    alert(('Product have been exists in compare!'));
                    return false;
                }
                // document.getElementById("count_compare").innerHTML = 2;
                if(a < 2) {
                    alert(('Add to compare!'));
                    var b = parseInt(a) + 1;
                    document.getElementById("count_compare").innerHTML = b;
                }
            }
        });
    });

// delete

    $('.delete').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function () {
            }
        });
        return false;
    });
});
//delete cart
function deleteRow(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    console.log(a);
    var b = document.getElementById("cart_table").deleteRow(a);
    var total = document.getElementById("count_cart").innerText;
    var sub = x.parentNode.parentNode.parentNode.children[1].children[0].value;
    document.getElementById("count_cart").innerHTML = total - sub;
}

//delete sold
function deleteSold(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    // console.log(a);
    var b = document.getElementById("cart_table").deleteRow(a);
}

// delete sell
function deleteSell(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    var b = document.getElementById("cart_table").deleteRow(a);
}

// search
function autoComplete() {
    var x = document.getElementById("tags");
    var url = $('#url').val();
    var key = x.value;
    console.log(x);
    console.log(url);
    $.ajax({
        type:'get',
        url: url + 'searchx',
        data:{key:key},
        success: function(data){
            console.log(data);
            $( "#tags" ).autocomplete({
                source: data
            });
        }
    });
}

//search name
$(document).ready(function () {
    $('.search_name').click(function(){
        var url = $('#url').val();
        var key1 = ($('#tags').val());
        var key = key1.replace( "/", '__');
//            alert(key);
        window.location.href = url + 'search' + '/' + key;
    });
});

//search address
$(document).ready(function () {
    $('.btn-address').click(function(){
        var url = $('#url').val();
        // alert(url);
        var id = $('.address1').val();
        window.location.href = url + 'address' + '/' + id;
    });
});
//search price
$(document).ready(function () {
    $('.search_price').click(function(){
        var url = $('#url').val();
        var from = $('#from').val();
        var to = $('#to').val();
        // alert(from);
        if(!to && from){
            window.location.href = url + 'price' + '/' + from;
        }else if(!from && to){
            window.location.href = url + 'price'  + '/to' + to;
        }else{
            window.location.href = url + 'price'  + '/' + from + '/' + to;
        }
    });
});

//add product
$(document).ready(function () {
    $('.plus-custom').click(function () {
        $('#custom-prop').toggle();
    });
});


//show more post
$(document).ready(
    function () {
        let showChar = 300;
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";

        $('.content-post').each(function () {
            var content = $(this).html();
            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
                var html = c +
                    '<span class="moreellipses">'
                    + ellipsestext +
                    '&nbsp;</span><span class="morecontent"><span>'
                    + h +
                    '</span>&nbsp;&nbsp;<a href="" class="morelink">'
                    + moretext +
                    '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }

            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });



// //select2
// $(document).ready(function(){
//     $(".select2").select2({
//         tags: true,
//         tokenSeparators: [',', ' ']
//     });
// });//document ready

// $(document).ready(function(){
//     $('.value-plus').on('click', function () {
//         alert(5);
//         //        var divUpd = $(this).parent().find('.value'),
//         //            newVal = parseInt(divUpd.text(), 10) + 1;
//         //        divUpd.text(newVal);
//     });
//
//     $('.value-minus').on('click', function () {
//         var divUpd = $(this).parent().find('.value'),
//             newVal = parseInt(divUpd.text(), 10) - 1;
//         if (newVal >= 1) divUpd.text(newVal);
//     });
// });

