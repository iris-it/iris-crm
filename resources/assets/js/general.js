/**
 * Loading of legacy libraries which are needed for this application
 * (a legacy lib is a lib which cannot be loaded dynamically)
 */
const $ = require('jquery');


// show active tab on reload
export function activeTab() {
    if (location.hash !== '') {
        $(`a[href="${location.hash}"]`).tab('show');
    }
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if (history.pushState) {
            history.pushState(null, null, `#${$(e.target).attr('href').substr(1)}`);
        } else {
            location.hash = `#${$(e.target).attr('href').substr(1)}`;
        }
    });
}

// show active menu ( accept sub menu )
export function activeMenu() {
    $(".sidebar-menu a").each(function () {
        let href = $(this).attr('href');
        if (window.location.href.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
            $(this).closest('li').parent().closest('li').addClass('menu-open active');
            $(this).closest('li').parent().closest('li').parent().closest('li').addClass('menu-open active');
        }
    });
}

export function ajaxCSRF() {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
}

export function laravelLinksAsForm() {
    let laravel = {
        initialize: function () {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function () {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function (e) {
            let link = $(this);
            let httpMethod = link.data('method').toUpperCase();
            let form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, ['PUT', 'DELETE', 'POST']) === -1) {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if (link.data('confirm')) {
                if (!laravel.verifyConfirm(link)) {
                    return false;
                }
            }

            form = laravel.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function (link) {
            return window.confirm(link.data('confirm'));
        },

        createForm: function (link) {
            let form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            let token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            let hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();
}


