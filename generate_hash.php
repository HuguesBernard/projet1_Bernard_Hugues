<?php
// generate_hash.php

$superadminPassword = password_hash('12345678', PASSWORD_DEFAULT);
echo $superadminPassword;
?>
