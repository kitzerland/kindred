<?php
$this->view("auth/includes/header");

if(isset($view))
    $this->view($view);

$this->view("auth/includes/footer");
?>

