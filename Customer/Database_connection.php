<?php
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="hera_florist";
$conn= mysqli_connect($SERVERNAME,$USERNAME,$PASSWORD,$DB);
if(!$conn)
{
echo 'Not connected';
}
if(!mysqli_select_db($conn,'hera_florist'))
{
echo 'Database not selected';
}
?>