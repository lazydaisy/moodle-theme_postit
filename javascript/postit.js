require(['core/first'], function() {
    require(['jquery', 'theme_bootstrapbase/bootstrap', 'core/log'], function($, bootstrap, log) {
        log.debug('Theme JavaScript initialised');
        $(document).ready(function(){
            $('.carousel').carousel({
                interval: 3000
            });
        });
    });
});