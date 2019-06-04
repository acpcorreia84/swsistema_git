<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 25/05/2017
 * Time: 06:40
 */

    require_once 'inc/class.upload.php-master/src/class.upload.php';

    $handle = new Upload($_FILES['file']);
    $handle->allowed = 'image/*';

    if($handle->uploaded) {
        $handle->file_new_name_body = 'new name';
        $handle->image_convert = 'jpg';
        $handle->image_resize = true;
        $handle->image_x = 400;
        $handle->image_y = 800;
        $handle->image_ratio = true;
        $handle->image_ratio_crop = true;
        $handle->image_ratio_fill = true;

        $handle->Process('media/comprovantes');

        $handle->file_new_name_body = 'new name_p';
        $handle->image_convert = 'jpg';
        $handle->image_resize = true;
        $handle->image_x = 50;
        $handle->image_y = 50;
        $handle->image_ratio = true;
        $handle->image_ratio_crop = true;
        $handle->image_ratio_fill = true;

        $handle->Process('media/comprovantes');

        $handle->clean();
        if($handle->processed) {
            echo 'Image uploaded';
        } else {
            echo 'error';
        }
    }

?>