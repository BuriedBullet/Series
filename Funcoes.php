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
    
    /*
     * 
     * 
     *Parallax MdBootstrap 
     * 
     * 
     *      
     */
    
    function inseri_user()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $apelido = $_POST["apelido"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        
        $query = "INSERT into user VALUES('', '$nome', '$apelido', '$email', '$senha', '1')";
        $result = mysqli_query($con, $query);
        
        return $result;
    }
    
    function user_acesso()
    {
        global $con;
        
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        
        $query = "SELECT * FROM user";
        
        $result = mysqli_query($con, $query);
        
        while($item = mysqli_fetch_array($result))
        {
            echo '<pre>';
            print_r($item);
            echo '</pre>';
            exit;
        }
        
        return $result;
    }

?>

