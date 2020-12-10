jQuery(document).ready(function () {

    var error = jQuery('.error');
    var updated = jQuery('.updated');

    jQuery('#activate_license').click(function () {
        var data = {
            action: 'inkthemes_activate_license',
            auth_data: jQuery('#inkthemes_setting_form').serialize(),
        };
        jQuery.post(ajaxurl, data, function (response) {
            //console.log(response);
            var ob = jQuery.parseJSON(response);

            if (ob.error) {
                error.fadeIn();
                error.text(ob.error);
            } else {
                error.fadeOut();
                updated.fadeIn();
                updated.html('<p>' + ob.activated + '</p>');
            }
            //console.log(ob);
        });
        return false;
    });

    jQuery('#reset_license').click(function () {
        var data = {
            action: 'inkthemes_reset_license',
            delete: true,
        };
        jQuery.post(ajaxurl, data, function (response) {
            if (response) {
                //console.log(response);
                updated.fadeIn();
                updated.html('<p>' + response+ '</p>');
                jQuery('#inkthemes_license_key').val('');
            }
        });
    });
});