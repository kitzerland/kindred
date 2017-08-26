<?php
$this->view("./includes/header");

if(isset($view))
    $this->view($view);

$this->view("./includes/footer");
?>

