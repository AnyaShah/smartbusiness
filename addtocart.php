<?php
SESSION_start();
$pid=$_GET['pid'];
$qty=$_GET['qty'];
$_SESSION['cart'][$pid]=array('id' => $pid, 'qty' => $qty);
echo "<script>window.location.href='cart.php'</script>";
?>
