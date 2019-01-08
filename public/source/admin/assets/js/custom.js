//show more post or user
$(document).ready(
    function () {
        $("#example1>thead>tr>th").removeClass("sorting");
        $('#example1').dataTable( {
            bSort: false,
        } );
        let showChar = 200;
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";

        $('.more').each(function () {
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

//reject post or user
$(document).ready(
    function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".show_input").click(function (e) {
            //get from charecter 6 -> id
            var id = $(this).attr('id').substring(6);
            // $('.hidd').hide();
            $("#show" + id).toggle("slow");
        });

        //send
        $(".send").click(function (e) {
            var id = $(this).attr('id').substring(2);
            var href = ($(this).attr('data-url'));
            var reason = $('#rea' + id).val();
            if(reason.trim().length > 0) {
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {reason: reason, id: id, test: 123},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                });

                $("#text-show" + id).html(reason);
                $("#text-show" + id).before(' <span class="bg-red right badge badge-danger badge-status reject-font">Rejected</span> ');
                $('.hidd').hide();
                $('.active-' + id).hide();
                $('.reject-' + id).hide();
            } else {
                alert('reason can not empty!');
                $("#show" + id).hide();
            }
        });

    });

//active now
$(document).ready(
    function () {
        $(".active-now").click(function (e) {
            var id = $(this).attr('id').substring(11);
            var href = ($(this).attr('data-url'));
            console.log(href);
            $.ajax({
                type: 'POST',
                url: href,
                success: function () {
                }
            });

            $("#text-show" + id).append(' <span class="bg-green right badge badge-success badge-status reject-font">Activing</span>');
            $('#active-now-' + id).hide();
            $('.reason-' + id).hide();
            $('#reject-' + id).hide();
        });
    });

//delete user or post

    $(document).on('click', '.del-button', function (e) {
        if (confirm('Are you sure!')) {
            let id = $(this).attr('id');
            $('#row-' + id).remove();
            let url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: 'DELETE',  // user.destroy
                success: function (result) {
                    console.log(result);
                }
            });
        }
    });

    //delete respond
    $(document).on('click', '.del-button-respond', function (e) {
        if (confirm('Are you sure!')) {
            let id = $(this).attr('id');
            $('#row-' + id).remove();
            let url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type: 'post',  // user.destroy
                success: function (result) {
                    console.log(result);
                }
            });
        }
    });
