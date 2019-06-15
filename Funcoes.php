<?php

    session_start();

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "series_time";
    
    $con = mysqli_connect($servidor, $usuario, $senha, $db);
    
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

    public function inseri_serie()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $produtora = $_POST["produtora"];
        $ano = $_POST["ano_lancamento"];
        $img = $_POST["img"];
        $img_fund = $_POST["img_fund"];
        $descricao = $_POST["descricao"];
        $qtd_temp = $_POST["qtd_temp"]
        $categoria = $_POST["categoria"];
        
        $query = "INSERT into serie VALUESD('','')";
    }
    
    function user_acesso()
    {
        global $con;
        
        $email = $_POST["email"];
        $senhas = md5($_POST["senha"]);
    
        $query = "SELECT * FROM user WHERE (apelido = '$email' OR email = '$email') AND senha = '$senhas'";

        $result = mysqli_query($con, $query);

        $rst = array();
        while($item = mysqli_fetch_assoc($result))
        {
            $rst = $item;
        }
        
        if($rst)
        {
            $_SESSION["user"] = $rst;
            return 2;
        }
        else
        {
            $_SESSION["user"] = "";
            return 0;
        }
        
    }
    
    function select_categoria()
    {
        global $con;
        
        $query = "SELECT * FROM categoria";
        
        $result = mysqli_query($con, $query);
        
        $rst = array();
        while($item = mysqli_fetch_assoc($result))
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function select_status()
    {
        global $con;
        
        $query = "SELECT * FROM status_serie";
        
        $result = mysqli_query($con, $query);
        
        $rst = array();
        while($item = mysqli_fetch_assoc($result))
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }

?>

