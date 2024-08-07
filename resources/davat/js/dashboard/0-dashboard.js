window.davat = {};
$(document).on('statio:global:renderResponse', function (event, base, context) {
    metarget();
    davat.clipboard();
    base.each(function () {
        davat.select2($('.select2-select', this));
        davat.avatar($('.input-avatar', this));
        davat.dropdown($('.dropdown', this));
        davat.numberFormat($('[data-numberformat]', this));
        $('[data-autosubmit]', this).trigger('submit');
        davat.tagFilter($('[data-tagFilter]', this));
        $('[data-paymental]', this).on('jresp', JResp.opener)
        $('.magnific-popup', this).magnificPopup({
            type:'image',
            zoom: {
                enabled: true
            }
        });
        davat.liveCheck('data-samplsta', '/dashboard/live/samples-status-check', 'samples');
        davat.liveCheck('data-workersta', '/dashboard/live/workers-status-check', 'workers');
        davat.mobileLink.call(this);
        if($(this).has('[data-tabs]').length){
            window.tabs = new Tabby('[data-tabs]');
        }
        $('[data-tabs] a[role=tab]', this).on('click', function(){
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href[1]) {
                history.pushState(null, null, $(this).attr('href'));

            }
        })
    });
});
