jQuery(document).ready(function ($) {
    $('.tab').click(function () {
        var tabId = $(this).data('tab');
        $('.tab').removeClass('active');
        $(this).addClass('active');
        $('.tab-panel').removeClass('active');
        $('#' + tabId).addClass('active');
    });
});
