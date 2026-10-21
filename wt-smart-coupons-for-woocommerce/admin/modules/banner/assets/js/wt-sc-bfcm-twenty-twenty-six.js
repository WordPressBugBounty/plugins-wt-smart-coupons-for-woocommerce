(function ($) {
    'use strict';

    $(function () {
        const wt_sc_bfcm_twenty_twenty_six_banner = {
            init: function () { 
                const data_obj = {
                    _wpnonce: wt_sc_bfcm_twenty_twenty_six_banner_js_params.nonce,
                    action: wt_sc_bfcm_twenty_twenty_six_banner_js_params.action,
                    wt_sc_bfcm_twenty_twenty_six_banner_action_type: '',
                };

                /** The View plugins button opens the link normally; only the close button hides the banner permanently. */
                $(document).on('click', '.wt-sc-bfcm-banner-2026 .notice-dismiss', function(e) {
                    e.preventDefault();
                    data_obj['wt_sc_bfcm_twenty_twenty_six_banner_action_type'] = 2; /** Closed by user. */
                    
                    $.ajax({
                        url: wt_sc_bfcm_twenty_twenty_six_banner_js_params.ajax_url,
                        data: data_obj,
                        type: 'POST',
                    });
                });
            }
        };
        wt_sc_bfcm_twenty_twenty_six_banner.init();
    });

})(jQuery);