<?php

//faz a conexão com as outras páginas
include_once './database.php';
include_once './usuario.php';

session_start();

//isset verifica se tem algo escrito nos campos 
if (isset($_POST['usuario'])) {
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
  
    //faz uma consulta no banco de dados para retornar dados do usuario
    $consulta = mysqli_query($conexao, "select cod, nome, login, senha from usuario where login = '". $usuario ."'");
    // irá fazer um array com indices sendo as colunas da tabela 
    $dados = mysqli_fetch_assoc($consulta);
    
    //user para armazenar os dados da pessoa que quer entrar
    $user = null;
    
        // se tiverem dados, entao sera criado um novo objeto da classe Usuario apenas para essa sessao
        if($dados != null){
            $user = new Usuario ($dados["cod"],$dados["nome"],$dados["login"],$dados["senha"]);

        }
        
        //irá validar dados de login do usuário, se estiver certo iniciará uma sessao
        if($user != null && $user->validaUsuarioSenha($usuario, $senha)){
            
            $_SESSION['user'] = $user;
                 
            
        }else{
            //definindo que a sessão terá essa mensagem e voltará a página
            $_SESSION['msg'] = "Usuário ou senha incorretos!";
            header("Location: index.php");
            exit;
            
        }
 //se não tiver logado no sistema (ou seja, se nao tiver 'nome') volta para página inical
} else if (!isset ($_SESSION['nome'])){
    header("Location: index.php");
    exir;
   
    
    //agora é o código html da página menu
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Menu</title> 
        <link rel="stylesheet" type="text/css" href="login.css"/>
    </head>
    <body>
        
        <!-- vai pegar o resultado do php e exibir na tela   -->
        <h1> Usuário logado: <?php echo $_SESSION['user']->nome ?> </h1>
     
        <div class = "menu">
        <!-- irá refernciar home e sair como um link para menu e logout  -->  
            <a href="menu.php"> Home </a>
            <a href="listar.php"> Listar </a>
            <a href="cadastrar.php"> Cadastrar </a>
            <a href="logout.php"> Sair </a>
        </div>
    </body>
    
       
    
</html>
