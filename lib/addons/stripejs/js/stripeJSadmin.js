/* 
 * From: http://wordpress.stackexchange.com/questions/18122/toggle-admin-metabox-based-upon-chosen-page-template
 */

(function($){
$(function() {

    $('#page_template,#post_template').change(function() {
        var toggle = false;
        if ($(this).val() == 'payment-success.php') {
            toggle = true;
            $('#default-image-failure').hide();            
            $('#default-image-success').show();
        } else if($(this).val() == 'payment-failed.php') {
            toggle = true;
            $('#default-image-success').hide();
            $('#default-image-failure').show();
        } else {
            $('#default-image-success').hide();
            $('#default-image-failure').hide();            
        }
        $('#stripejs_image_meta').toggle(toggle);
    }).change();

});
})(jQuery);

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires=" + date.toUTCString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}
