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

    // toastr options
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right"
    };

    // slim scroll
    $('.aside-bar-ul').slimScroll();
    $('.slimScrollDiv').css('height', '100%');
    $('.aside-bar-ul').css('height', '100%');

    // fast link
    history.replaceState({data: location.pathname, type: 'url'}, 'page', location.pathname); //history replace
    appUnion.ajaxCachePage.push({'url': location.pathname, 'content': $('.union__content').html()}); //add hash page

    // aside ul
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

    // toggle aside size
    $(document).on('click', '.toggle-aside', function() {
        var block = $('.aside-bar');
        if(block.hasClass('full')) {
            $('[data-toggle-ul-s]').attr('style', '');
            $('[data-toggle-ul-s]').addClass('slideLeft');
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

    // bootstrap dropdown init
    $('.dropdown-toggle').dropdown('toggle');

    $(document).on('click', 'a', function() {
        var object = $(this), url = $(this).attr('href');
        if(!object.hasClass('no-turbo')) {
            appUnion.fastLink(url, '.union__content');
            return false;
        }
    });

    window.addEventListener('popstate', function(e){
        appUnion.historyNavigation(window.history.state.data, '.test');
    }, false);

    // scroll Aside (disable)
    /*$('.aside-bar').bind('touchstart', function() {
         $(this).bind('touchmove', function(e) {
             $('.aside-bar')[0].scrollTop = $('.aside-bar')[0].scrollTop + ($('.aside-bar')[0].scrollTop - e.originalEvent.changedTouches[0].clientY);
             console.log($('.aside-bar')[0].scrollTop - e.originalEvent.changedTouches[0].clientY);
             console.log(e.originalEvent.changedTouches[0].clientY);
         });
     });
    */

    // controll aside scroll (disable)
    /*$(document).on('click', '.aside-bar-controller span:eq(0)', function() {
     $('.aside-bar').css('padding-top', '0px');
     });
     $(document).on('click', '.aside-bar-controller span:eq(1)', function() {
     var block = $('.aside-bar ul'), padding = parseInt(block.css('padding-top')) + (block.width()/3);
     $('.aside-bar').css('padding-bottom', padding+'px');
     });
     */
});