
<?php
$hostname = "aws.connect.psdb.cloud";
$dbName = "dating";
$username = "jhsxst7i9iyock4kwun4";
$password = 'pscale_pw_BhhpIUqlS5cnE9BZGOD6zc3AuToGjgj5MDhCy242yUn';
$ssl ='/etc/ssl/cert.pem';

$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$conn->real_connect($hostname, $username, $password, $dbName);

if ($conn->connect_error) {
    echo 'not connected to the database';
} else {
    echo "Connected successfully";
}