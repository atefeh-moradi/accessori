<?php
session_start();
session_destroy();
echo "<script>location = '../signIn.php' </script>";
?>