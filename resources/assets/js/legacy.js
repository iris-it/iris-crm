/**
 * Loading of legacy libraries which are needed for this application
 * (a legacy lib is a lib which cannot be loaded dynamically)
 */


$(document).ready(function () {

    // show active tab on reload
    if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if (history.pushState) {
            history.pushState(null, null, '#' + $(e.target).attr('href').substr(1));
        } else {
            location.hash = '#' + $(e.target).attr('href').substr(1);
        }
    });

    // show active menu ( accept sub menu )
    $(".sidebar-menu a").each(function () {
        var href = $(this).attr('href');
        if (window.location.href.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
            $(this).closest('li').parent().closest('li').addClass('menu-open active');
            $(this).closest('li').parent().closest('li').parent().closest('li').addClass('menu-open active');
        }
    });

});

