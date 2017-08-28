<?php
$this->view("admin/includes/header");

if(isset($view))
    $this->view($view);

$this->view("admin/includes/footer");
?>

