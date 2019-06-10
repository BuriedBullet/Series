<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "series_time";
    
    $con = mysqli_connect($servidor, $usuario, $senha, $db);
    
    function select_aa()
    {
        global $con;
        
        return $con;
    }
    
    function inseri_user()
    {
        global $con;
        
        echo "<pre>";
        print_r($_FILES['img']);
        echo "</pre>";
        exit;
        
        
        
    }

?>

