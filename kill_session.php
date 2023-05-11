<?php
session_start();
if ($_SESSION['username'] != 'ZafeiropoulouA') {
    session_destroy();
}
header('Location: maintance.html');
exit;
?>
