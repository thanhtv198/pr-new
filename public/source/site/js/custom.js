//hover image
$(document).ready(function () {
    $('.image-bot-container>img').hover(function () {
        $('.image-top>img').attr('src', $(this).attr('src'));
        $(this).css("border", "1px solid whitesmoke");
    });
});
// add-cart
$(document).ready(function () {
    $('.product-icon-container').find('a').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                alert('Add to cart success');
            }
        });

        return false; //for good measure
    });
});

function addToCart() {
    var a = document.getElementById("count_cart").innerText;
    var b = parseInt(a) + 1;
    document.getElementById("count_cart").innerHTML = b;
}
// add-compare
$(document).ready(function () {
    $('.compare_count').find('a').click(function (event) {
        event.preventDefault();
        var a = document.getElementById("count_compare").innerText;
        if(a >= 2){
            alert('Can\'t compare over 2 produts');
            return false;
        }
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                console.log(data)
                if(data && data == 1){
                    document.getElementById("count_compare").innerHTML = 1;
                    alert(('Product have been exists in compare!'));
                    return false;
                }
                // document.getElementById("count_compare").innerHTML = 2;
                alert(('Add to compare!'));
            }
        });

        var b = parseInt(a) + 1;
        document.getElementById("count_compare").innerHTML = b;
        return false; //for good measure
    });
});
// delete
$(document).ready(function () {
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
        $('#custom-prop').show();
    });
});



//comment post
$(document).ready(
    function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', ".parent-comment", function (e) {
            let content = $('textarea[name="content_parent_comment"]').val();
            let href = $(this).attr('data-url');
            let name = $("input[name='username']").val();

            $.ajax({
                type: 'POST',
                url: href,
                data: {content: content},
                dataType: "json",
                success: function (data) {
                    let id = data.id;
                    console.log(data);
                    let url = 'http://localhost:8000/posts/' + id + '/replies';
                    let comment = '                 <div class="media comment-parent">\n' +
                        '                                                   <a href="javascript:;" class="pull-left">\n' +
                        '                                                       <img src="" alt="" class="media-object">\n' +
                        '                                                   </a>\n' +
                        '                                                   <div class="media-body">\n' +
                        '                                                    <h4 class="media-heading">' +
                        '                                                        <strong>' + name + '</strong>\n' +
                        '                                                         <input type="hidden" name="username" value="' + name + '">\n' +
                        '                                                        <span>' + data.created_at + '/ <a class="reply-parent" id="' + id + '">Reply</a></span>\n' +
                        '                                                    </h4>\n' +
                        '                                                    <p>' + content + '</p>\n' +
                        '                                                    <div class="input-group input-' + id + '" style="display: none">\n' +
                        '                                                         <input type="text" size="50" class="form-control content-reply" id="comment-' + id + '" name="content-reply">\n' +
                        '                                                         <span class="input-group-btn">\n' +
                        '                                                           <button class="btn btn-success reply-button" id="rep' + id + '" data-url="' + url + '">Reply\n' +
                        '                                                           </button>\n' +
                        '                                                         </span>\n' +
                        '                                                    </div>\n' +
                        '                                                    <div class="comment-replies-' + id + '">\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                            </div>'
                    $('.comments').append(comment);
                }
            });
        });
    });

$(document).ready(
    function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.reply-parent', function (e) {
            let id = $(this).attr('id');
            $('.input-' + id).toggle();
        });

        $(document).on('click', '.reply-button', function (e) {
            let href = $(this).attr('data-url');
            let parent_id = $(this).attr('id').substring(3);
            let content = $('#comment-' + parent_id).val();

            $.ajax({
                type: 'POST',
                url: href,
                data: {repContent: content, parent_id: parent_id},
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    let reply = '<div class="media">\n' +
                        '            <a href="javascript:;" class="pull-left">\n' +
                        '                 <img src="" alt="" class="media-object">\n' +
                        '            </a>\n' +
                        '            <div class="media-body">\n' +
                        '                <h4 class="media-heading">\n' +
                        '                     <strong>' + data.username + '</strong>\n' +
                        '                     <span>' + data.comment.created_at + '</span></h4>\n' +
                        '                   <p>' + content + '</p>\n' +
                        '            </div>\n' +
                        '        </div>'

                    $('.comment-replies-' + parent_id).append(reply);
                    $('.input-' + parent_id).css('display', 'none');
                }
            });
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

//select2
$(document).ready(function(){
    $(".select2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
});//document ready

//header scroll
window.onscroll = function () {
    myFunction()
};

var header = document.getElementById("header-scroll");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

