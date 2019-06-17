<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "series_time";
    
    $con = mysqli_connect($servidor, $usuario, $senha, $db);
    
    function inseri_user()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $apelido = $_POST["apelido"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $img = $_POST["img"];
        
        if(empty($img))
        {
           $img = "https://image.flaticon.com/icons/png/512/1146/1146273.png"; 
        }
        
        $query = "INSERT into user VALUES('', '$nome', '$apelido', '$email', '$senha', '$img')";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            return 2;
        }
        else
        {
            return 0;
        }
    }

    function inseri_serie()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $produtora = $_POST["produtora"];
        $ano = $_POST["ano_lancamento"];
        $img = $_POST["img"];
        $img_fund = $_POST["img_fund"];
        $descricao = $_POST["descricao"];
        $qtd_temp = $_POST["qtd_temp"];
        $categoria = $_POST["categoria"];
        $status = $_POST["status"];
        $id = $_POST["id_usuario"];
        
        $query = "INSERT into series VALUES('','$nome', '$produtora', '$ano', '$img', '$img_fund', '$descricao', '$qtd_temp', '$status', '$id', 'NOW()')";
        
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            $query = "SELECT LAST_INSERT_ID()";
        
            $result = mysqli_query($con, $query);
            
            $a = "";
            
            while($item = mysqli_fetch_row($result))
            {
                $a = $item;
            }
        
            foreach($categoria as $item)
            {
                $query = "INSERT into serie_categoria VALUES('', '$item', '$a[0]')";
                $result = mysqli_query($con, $query);
            }
            
            $_SESSION["id_serie"] = $a[0];
            
            return 2;
        }
        else
        {
            return 0;
        }
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
    
    function logout()
    {   
        session_unset();
        
        return  true;
    }
    
    function select_qtd_temp($id)
    {
        global $con;
        
        $query = "SELECT * FROM series WHERE id=$id";
        
        $result = mysqli_query($con, $query);

        $rst = "Não funcionou";
        
        while ($row = mysqli_fetch_assoc($result)) {
            $rst = $row;
        }
        
        return $rst;
    }
    
    function inseri_episodios()
    {
        global $con;
        
        $temp = $_POST["temp"];
        $id_serie = $_POST["id_serie"];
        
        $i = 1;
        
        foreach ($temp as $key => $item) {
            $value = $key + 1;
            if($item == "koenokatachi")
            {
                $i = $i + 1;
            }
            else
            {
                $query = "INSERT into episodio VALUES('', '$id_serie', '$i', '$value', '$item')";
                mysqli_query($con, $query);
            }
        }
        
        unset($_SESSION['id_serie']);
        
        return 2;
    }
    
    function select_view_series()
    {
        global $con;

        $query = "SELECT * FROM series ORDER BY date DESC";
        
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $key => $item)
        {
            $rst[] = (object)$item;
            $rst[$key]->categoria = get_categoria($rst[$key]->id);
        }
        
        return $rst;
    }
    
    function get_categoria($id)
    {
        global $con;
        
        $query = "SELECT * FROM serie_categoria WHERE id_serie=$id";
        $result = mysqli_query($con, $query);
        
        $rst_cat = array();
        foreach($result as $item)
        {
            $rst_cat[] = $item["id_cat"];
        }
        
        $rst = "";
        foreach($rst_cat as $item)
        {
            $query = "SELECT * FROM categoria WHERE id=$item";
            $result = mysqli_query($con, $query);
            foreach($result as $value)
            {
                $rst .= ",".$value["nome"];
            }
        }
        
        return $rst;
    }
    
    function select_all_categorias()
    {
        global $con;
        
        $query = "SELECT * FROM categoria";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function select_serie($id)
    {
        global $con;
         
        $query = "SELECT * FROM series WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        foreach($result as $item)
        {
            $rst = (object)$item;
            $rst->status = get_status($rst->id_status);
            $rst->categoria = get_categoria($rst->id);
        }
        
        return $rst;
    }
    
    function get_status($id)
    {
        global $con;
        
        $query = "SELECT * FROM status_serie WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst = $item;
        }
        
        return (object)$rst;
    }
    
    function select_eps($id, $temp)
    {
        global $con;
        
        $query = "SELECT * FROM episodio WHERE id_serie=$id AND temporada=$temp";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function assistido($id_serie, $id_ep)
    {
        global $con;
        
        $id_usuario = $_SESSION["user"]["id"];
        $date = date("Y-m-d H:i:s");
        $query = "INSERT into controle_assistido VALUES('','$id_usuario', '$id_serie', '$id_ep', '1', '$date')";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            header('Location: view_serie.php');
        }
    }
    
    function nao_assistido($id)
    {
        global $con;
        
        $query = "DELETE FROM controle_assistido WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            header('Location: view_serie.php');
        }
    }
    
    function select_assistido($id_serie)
    {
        global $con;
        
        $query = "SELECT * FROM controle_assistido WHERE id_series=$id_serie";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function select_all_series_cat($id_serie)
    {
        global $con;
        
        $query = "SELECT * FROM serie_categoria WHERE id_cat=$id_serie";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $key => $item)
        {
            $id = $item["id_serie"];
            
            $query = "SELECT * FROM series WHERE id=$id";
            $result_serie = mysqli_query($con, $query);
            
            foreach($result_serie as $value)
            {
                $rst[$key] = (object)$value;
            }
        }
        
        return $rst;
    }
    
    function get_cat($id)
    {
        global $con;
        
        $query = "SELECT * FROM categoria WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        $rst = "";
        foreach($result as $item)
        {
            $rst = (object)$item;
        }
        
        return $rst;
    }
    
    function edita_user()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $apelido = $_POST["apelido"];
        $email = $_POST["email"];
        $senha = !empty($_POST["senha"]) ? md5($_POST["senha"]) : $_SESSION["user"]["senha"];
        $img = !empty($_POST["img"]) ? $_POST["img"] : $_SESSION["user"]["img"];
        $id = $_SESSION["user"]["id"];
        
        $query = "UPDATE user SET nome='$nome',apelido='$apelido',email='$email',senha='$senha',img='$img' WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            $query = "SELECT * FROM user WHERE id=$id";
            $result = mysqli_query($con, $query);
            
            $rst = "";
            foreach($result as $item)
            {
                $rst = $item;
            }
            
            $_SESSION["user"] = $rst;
            return 2;
        }
        else
        {
            return 0;
        }
    }
    
    function edita_serie()
    {
        global $con;
        
        $nome = $_POST["nome"];
        $produtora = $_POST["produtora"];
        $ano = $_POST["ano_lancamento"];
        $descricao = $_POST["descricao"];
        $img = !empty($_POST["img"]) ? $_POST["img"] : $_POST["img_ant"];
        $img_fund = !empty($_POST["img_fund"]) ? $_POST["img_fund"] : $_POST["img_fund_ant"];
        $qtd_temp = $_POST["qtd_temp"];
        $categoria = $_POST["categoria"];
        $status = $_POST["status"];
        $id = $_POST["id_serie"];
        
        $query = "UPDATE series SET nome='$nome', produtira='$produtora', ano_lancamento='$ano', img='$img', img_fund='$img_fund',descricao='$descricao', qtd_temp=$qtd_temp, id_status=$status, data=NOW() WHERE id=$id";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            return 2;
        }
        else
        {
            return 0;
        }
    }
    
    function select_serie_user($id)
    {
        global $con;
        
        $query = "SELECT * FROM controle_assistido WHERE id_user=$id ORDER BY  data_assistido DESC";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach ($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        $rst1 = array();
        $i = -1;
        foreach ($rst as $item)
        {
            if(empty($rst1) || $item->id_series != $rst1[$i]->id_series)
            {
                $i++;
                $rst1[] = $item;
            }
        }

        foreach ($rst1 as $key => $value) {
            $query = "SELECT * FROM series WHERE id=$value->id_series";
            $result =  mysqli_query($con, $query);
            foreach ($result as $item)
            {
                $rst1[$key]->serie = (object)$item;
            }
        }
        
        return $rst1;
    }
    
    function select_serie_user_cria($id)
    {
        global $con;
        
        $query = "SELECT * FROM series WHERE id_user=$id";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function select_ep_serie($id)
    {
        global $con;
        
        $query = "SELECT * FROM episodio WHERE id_serie=$id";
        $result = mysqli_query($con, $query);
        
        $rst = array();
        foreach($result as $item)
        {
            $rst[] = (object)$item;
        }
        
        return $rst;
    }
    
    function verifica_mobile()
    {
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        $windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
            $dispositivo = 1;
        }
        else
        {
            $dispositivo = 0;
        }
        
        return $dispositivo;
    }

?>

