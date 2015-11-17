var appUnion = {
    ajaxCachePage: [],

    /* быстрые ссылки (выключено) */
    fastLink: function(url, div)
    {
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
                //history.pushState({data: url, type: 'url'}, 'page', url);
                //appUnion.ajaxCachePage.push({'url': url, 'content': data});
                //appUnion.rewriteContent(div, data);
            },
            error: function (data) {
                console.log(data);
                toastr["error"](data.status, data.statusText);
            }
        })
    },

    /* перезаписать содержимое (выключено) */
    rewriteContent: function(container, data)
    {
        $(container).html(data);
        $('title').html('Union RolePlay | ' + $('.union__content_border_title').html());
    },

    /* обработчик кнопки назад (выключено) */
    historyNavigation: function(url, container)
    {
        $(appUnion.ajaxCachePage).each(function (k) {
            if (appUnion.ajaxCachePage[k].url == url) {
                $(container).html(appUnion.ajaxCachePage[k].content);
            }
        });
    },

    /* смена статуса ссылки */
    linkActive: function()
    {
        var linkPage = location.pathname, linkUrl;
        $('a').each(function() {
            linkUrl = $(this);
            if (linkUrl.attr('href') == linkPage) {
                linkUrl.addClass('active');
            }
        });
    },

    /* случайное изображение для фона главной */
    randomBackground: function()
    {
        var bgList = [
            '/resource/assets/img/bg1.jpg',
            '/resource/assets/img/bg2.jpg'
        ];
        $('.content-main-slider-block').css({
            'background': 'url('+bgList[appUnion.random(0, 1)]+')',
            'background-size': 'cover'
        });
    },

    /* запись данных в localStorage */
    createUserInfo: function()
    {
        //var os = navigator.userAgent.indexOf("Windows NT 10.0") != -1 ? 'Windows 10' : '';
        var data = {
            mobileBool: (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase())),
            browser: navigator.appCodeName,
            os: navigator.userAgent,
            pageSize: $(document).width()+'x'+$(document).height(),
            screenSize: screen.width+'x'+screen.height,
            position: $(document).width() > $(document).height(),
            agent: navigator.userAgent
        };
        localStorage['unionData'] = JSON.stringify(data);
        appUnion.createCookie('unionData', JSON.stringify(data), {
            path: '/'
        });
        if (data.position && data.mobileBool) {
            if (!localStorage['mobilePosition']) {
                var acc = confirm('Сайт в режиме портрета может отображаться неккоректно. Для корректной работы разверните устройство по вертикале. Продолжить?');
                if (!acc) {
                    document.location.href = 'https://google.com';
                } else {
                    localStorage['mobilePosition'] = true;
                }
            }
        }
    },

    /* метод рандома */
    random: function(min, max)
    {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    },

    /* метод создания куки */
    createCookie: function setCookie(name, value, options)
    {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }
};
$(function() {

    /* вызов метода смены статуса ссылки */
    appUnion.linkActive();

    /* вызов метода случайного изображения для фона */
    appUnion.randomBackground();

    /* вызов метода записи данных в localStorage */
    appUnion.createUserInfo();

    /* опции уведомлений toastr */
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right"
    };

    var asideBlock = $('.aside-bar'),
        asideBlockUl = $('.aside-bar-ul');

    /* скрул моб. версии асайда */
    if (asideBlock.hasClass('small')) {
        asideBlockUl.slimScroll().css({'height': '100%', 'overflow': 'visible'});
        $('.slimScrollDiv').css({'height': '100%', 'overflow': 'visible'});
    } else {
        asideBlockUl.slimScroll().css({'height': '100%'});
        $('.slimScrollDiv').css({'height': '100%'});
    }

    /* смена режимов ul асайда */
    $(document).on('click', '.aside-bar ul li a', function() {
        if (asideBlock.hasClass('full')) {
            var dataId = $(this).data('toggleUl');
            $(this).toggleClass('open');
            $('[data-toggle-ul-s = '+dataId+' ]').slideToggle().removeClass('slideLeft');
            if (!$(this).hasClass('open')) {
                setTimeout(function() {
                    $('[data-toggle-ul-s = ' + dataId + ' ]').attr('style', '');
                }, 500);
            }
        } else if ($(this).attr('href') == '#') {
            return false;
        }
    });

    /* смена размера асайда */
    $(document).on('click', '.toggle-aside', function() {
        if (asideBlock.hasClass('full')) {
            $('[data-toggle-ul-s]').attr('style', '').addClass('slideLeft');
            $('.slimScrollDiv').css('overflow', 'visible');
            asideBlockUl.css('overflow', 'visible');
            asideBlock.removeClass('full').addClass('small');
            $('body').addClass('full');
        } else {
            $('.slimScrollDiv').css('overflow', 'hidden');
            asideBlockUl.css('overflow', 'hidden');
            asideBlock.removeClass('small').addClass('full');
            $('body').removeClass('full');
        }
        $('.toggle-ul').removeClass('open');
    });

    /* функции бутстрапа */
    $('.dropdown-toggle').dropdown('toggle');


    /* бинд клика для быстрых ссылок */
    /*$(document).on('click', 'a', function() {
        var object = $(this), url = $(this).attr('href');
        if(!object.hasClass('no-turbo')) {
            appUnion.fastLink(url, '.union__content');
            return false;
        }
    });*/

    /* бинд кнопки назад для быстрых ссылок */
    /*window.addEventListener('popstate', function(e){
        appUnion.historyNavigation(window.history.state.data, '.test');
    }, false);*/

    /* перезапись стейта истории (выключено) */
    //history.replaceState({data: location.pathname, type: 'url'}, 'page', location.pathname); //history replace
    //appUnion.ajaxCachePage.push({'url': location.pathname, 'content': $('.union__content').html()}); //add hash page
});