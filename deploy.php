<?php

$ftp_conn = ftp_ssl_connect(getenv("FTP_HOST"), getenv("FTP_PORT"));
$login_result = ftp_login($ftp_conn, getenv("FTP_USERNAME"), getenv("FTP_PASSWORD"));

if ($login_result) {
    ftp_pasv($ftp_conn, true);
    $transfer_result = ftp_put($ftp_conn, "/vendor.tar.gz", __DIR__ . "/vendor.tar.gz", FTP_BINARY);
    if ($transfer_result) {
        echo "Vendor transferred successfully";
    } else {
        echo "Error transfering vendor folder";
    }
} else {
    echo "\nCannot login\n";
}