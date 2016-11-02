<?php
session_start();
$status = $this->session->userdata('name');
echo $status;
?>
