<?php
global $post;

$important_specs = get_post_meta($post->ID, 'important_specs', true);
$serialize_imp_spec = maybe_unserialize($important_specs);

?>
<h2 class="bg green"><?php echo (!empty(get_theme_mod("important_specs")))?get_theme_mod("important_specs"):'Important specs';?></h2>
<table>
    <tbody>
        <?php
        if (!empty($serialize_imp_spec)) {
            $speccounter = 0;
            foreach ($serialize_imp_spec as $spec_key => $spec_value) {
                ?><tr>
                    <th><?php echo (!empty($spec_key)) ? $spec_key : 'NA'; ?>:</th>
                    <td><?php echo (!empty($spec_value)) ? $spec_value : 'NA'; ?></td>
                </tr><?php
            }
        }else{
            $no_record_found =  (!empty(get_theme_mod("no_record_found")))?get_theme_mod("no_record_found"):'No record available.';
            echo '<tr><td align="center">'.$no_record_found.'</td></tr>';
        }
        ?>
    </tbody>
</table>
