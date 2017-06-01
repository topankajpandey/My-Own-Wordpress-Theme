function set_top_product(id) {
    var mediaUploader;
    if (mediaUploader) {
        mediaUploader.open();
        return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        }, multiple: false});

    mediaUploader.on('select', function () {
        var attachment = mediaUploader.state().get('selection').first().toJSON();
        jQuery('#top_product_view_featured_' + id + ' img').remove();
        jQuery('#top_product_view_featured_' + id).append('<img src="' + attachment.url + '" width="30" height="30">');
        jQuery('.top_product_hidden_area_' + id).html('<input type="hidden" name="post_meta[top_product_file][]" value="' + attachment.url + '">');
    });

    mediaUploader.open();
}
