<?php

$folders = ['uploads', 'results']; // Specify both directories

foreach($folders as $folder) {
    $files = glob($folder . '/*');

    foreach($files as $file) {
        if(is_file($file)){
            unlink($file);
        }
    }
}

header("Location:http://localhost/CAT201/display.php");
?>