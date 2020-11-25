<?php

function uploadImage($nameOfField)
{
    set_error_handler("my_error_handler");

    try {
        $ftp_server =  FTPSERVER;
        $ftp_user_name = FTPUSER;
        $ftp_user_pass = FTPPASS;

        $ftp_port = "21";
        $msg = "";
        $status = 0;

        // set up basic connection
        $conn_id = ftp_connect($ftp_server, $ftp_port);

        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        // ftp passive cmd
        ftp_pasv($conn_id, true);

        // check connection
        if (($conn_id) || (!$login_result)) {
            $msg = "FTP connection has failed!". " Attempted to connect to $ftp_server for user $ftp_user_name";
            $status = 1;
        } else {
            $msg = "Connected to $ftp_server, for user $ftp_user_name";
            $status = 0;
        }

        $destination_file = "/htdocs/remote-image-storage/media/".$_FILES[$nameOfField]['name'];
        $source_file = $_FILES[$nameOfField]['tmp_name'];

        // upload the file
        $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

        // check upload status
        if (!$upload) {
            $msg = "FTP upload has failed!";
            $status = 1;
        } else {
            $msg = "Uploaded $source_file to $ftp_server as $destination_file";
            $status = 0;
        }

        // close the FTP stream
        ftp_close($conn_id);
    } catch (Exception $e) {
        // var_dump($e->getMessage());
        // die();
        $status = 0;
        $msg = $e->getMessage();
    }

    // return result
    $result = array(
        "message" => $msg,
        "status" => $status
    );

    return $result;
}
