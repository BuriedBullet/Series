<?php 
session_start();
include 'Funcoes.php';

$rst = logout();

if($rst)
{
    header('Location: index.php');
}
?>