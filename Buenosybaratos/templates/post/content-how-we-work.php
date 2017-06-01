<?php

global $post;
$how_we_work = get_post_meta($post->ID, 'how_we_work', true);

echo '<h2 class="bg blue">';
echo (!empty(get_theme_mod("how_we_work")))?get_theme_mod("how_we_work"):'How we work';
echo '</h2>';
if(!empty($how_we_work)){
    echo '<p>'.$how_we_work.'</p>';
}else{
    $no_record_found =  (!empty(get_theme_mod("no_record_found")))?get_theme_mod("no_record_found"):'No record available.';
    echo '<p>'.$no_record_found.'</p>';
} 
