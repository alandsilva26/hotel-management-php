<?php

function dnd($content)
{
    var_dump($content);
    die();
}

function my_error_handler($error_no, $error_msg)
{
    // echo "Opps, something went wrong:";
    // echo "Error number: [$error_no]";
    // echo "Error Description: [$error_msg]";
    throw new Exception($error_no." ". $error_msg);
}
