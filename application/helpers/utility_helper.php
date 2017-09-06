<?php
function assets_url($url = ""){
    $url = "public/assets".$url;
    return base_url($url);
}
