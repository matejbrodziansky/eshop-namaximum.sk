<?php

function pre_r($data, $data_two = null)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';

    if (isset($data_two) && !empty($data_two)) {

        echo '<br>';
        echo '<hr>';

        echo '<pre>';
        print_r($data_two);
        echo '</pre>';
    }
    
    exit;
}
