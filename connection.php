
<?php
$hostname = "aws.connect.psdb.cloud";
$dbName = "dating";
$username = "0qr5ddvfa0071nowj5lx";
$password = "pscale_pw_fOMRxqAwwnXJunTVEnoJHi4fD1kLfZU6uL5XNINIiJO";
$ssl ='/etc/ssl/cert.pem';

$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$conn->real_connect($hostname, $username, $password, $dbName);

if ($conn->connect_error) {
    echo 'not connected to the database';
} else {
    echo "Connected successfully";
}