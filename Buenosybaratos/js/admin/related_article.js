
function set_article_featured(id) {
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
        jQuery('#related_file_value_' + id).attr('value', attachment.url);
        jQuery('#article_view_featured_' + id + ' img').remove();
        jQuery('#article_view_featured_' + id).append('<img src="' + attachment.url + '" width="30" height="30">');
        jQuery('.related_featured_hidden_area_' + id).html('<input type="hidden" name="post_meta[related_file][]" value="' + attachment.url + '">');
    });

    mediaUploader.open();
}
