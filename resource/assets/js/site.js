var appUnion = {
    ajaxCachePage: [],

    // fastLink
    fastLink: function(url, div) {
        if (url == '#')
            return false;
        $.ajax({
            url: url,
            async: true,
            timeout: 10000,
            type: 'POST',
            dataType: 'html',
            data: {method: 'ajax'},
            success: function (data) {
                history.pushState({data: url, type: 'url'}, 'page', url);
                appUnion.ajaxCachePage.push({'url': url, 'content': data});
                //appUnion.rewriteContent(div, data);
            },
            error: function (data) {
                console.log(data);
                toastr["error"](data.status, data.statusText);
            }
        })
    },

    rewriteContent: function(container, data) {
        $(container).html(data);
        $('title').html('Union RolePlay | ' + $('.union__content_border_title').html());
    },

    historyNavigation: function(url, container) {
        $(appUnion.ajaxCachePage).each(function (k) {
            if (appUnion.ajaxCachePage[k].url == url) {
                $(container).html(appUnion.ajaxCachePage[k].content);
            }
        });
    }
};
$(function() {
    /*
        Toastr Options
     */
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right"
    };

    /*
        SlimScroll Aside
     */
    $('.aside-bar-ul').slimScroll().css('height', '100%');
    $('.slimScrollDiv').css('height', '100%');

    /*
        History write FastLink
     */
    history.replaceState({data: location.pathname, type: 'url'}, 'page', location.pathname); //history replace
    appUnion.ajaxCachePage.push({'url': location.pathname, 'content': $('.union__content').html()}); //add hash page

    /*
        Toggle Aside Ul
     */
    $(document).on('click', '.aside-bar ul li a', function() {
        if(!$('.aside-bar').hasClass('full'))
            return false;
        var dataId = $(this).data('toggleUl');
        $(this).toggleClass('open');
        $('[data-toggle-ul-s = '+dataId+' ]').slideToggle().removeClass('slideLeft');
        if(!$(this).hasClass('open')) {
            setTimeout(function() {
                $('[data-toggle-ul-s = ' + dataId + ' ]').attr('style', '');
            }, 500);
        }
    });

    /*
        Change aside size
     */
    $(document).on('click', '.toggle-aside', function() {
        var block = $('.aside-bar');
        if(block.hasClass('full')) {
            $('[data-toggle-ul-s]').attr('style', '').addClass('slideLeft');
            $('.slimScrollDiv').css('overflow', 'visible');
            $('.aside-bar-ul').css('overflow', 'visible');
            block.removeClass('full').addClass('small');
            $('body').addClass('full');
        } else {
            $('.slimScrollDiv').css('overflow', 'hidden');
            $('.aside-bar-ul').css('overflow', 'hidden');
            block.removeClass('small').addClass('full');
            $('body').removeClass('full');
        }
    });

    /*
        Bootstrap function
     */
    $('.dropdown-toggle').dropdown('toggle');


    /*
        Bind Click FastLink
     */
    $(document).on('click', 'a', function() {
        var object = $(this), url = $(this).attr('href');
        if(!object.hasClass('no-turbo')) {
            appUnion.fastLink(url, '.union__content');
            return false;
        }
    });

    /*
        Bind Back FastLink
     */
    window.addEventListener('popstate', function(e){
        appUnion.historyNavigation(window.history.state.data, '.test');
    }, false);
});