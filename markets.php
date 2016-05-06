<?php
if(@$_POST['CN']=="on") {
    setcookie('CN','1');
}
else {
    setcookie('CN','0');
}
if(@$_POST['US']=="on") {
    setcookie('US','1');
}
else {
    setcookie('US','0');
}
header("Location: index.php"); 
exit;
?>