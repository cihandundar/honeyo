function flyAlertClose(){
    $('.cms_fly-alert').fadeOut();
}
$(document).on('click', '.cms_fly-alert .close-btn', function(){
    flyAlertClose();
});
$(document).on('click', '.cms_fly-alert', function(event){
    if (!$(event.target).closest('.cms_fly-alert .content').length) {
        flyAlertClose();
    }
});
