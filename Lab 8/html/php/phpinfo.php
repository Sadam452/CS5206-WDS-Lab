<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'Why you no have mysqli!!!';
} else {
    echo 'Day is saved!';
}
?>
