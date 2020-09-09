<?php
header('Content-type: image/png');
$fileId = (int)$_GET['id'];
include 'C:/OSPanel/images/' . $fileId . '.png';

