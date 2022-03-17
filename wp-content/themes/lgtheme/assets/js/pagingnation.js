

var items = $(".list-wrapper .blog-box");
    var numItems = items.length;
    var perPage = 6;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

    $(document).ready(function(){
        if(localStorage.getItem("element") == 'blog_menu')
        {
            $('.blog_menu').addClass('active');
            localStorage.setItem("element", "");
        }

        $('.blog_inner_menu').click(function(e) {
            localStorage.setItem("element", "blog_menu");
        });
       
    });