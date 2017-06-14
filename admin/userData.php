<?php

include '../common/home.php';

$id = $_GET['id'];

$where = "where id = $id";

$userDateli = select($link, 'bbs_user', '*', $where);

display('userDateli.html', compact('userDateli'));

?>