<?php    

// fazendo a conexão com as páginas que possuem os dados
include_once './database.php';
include_once './usuario.php';


session_start();

//essa parte é importante para o usuário não conseguir acessar a página sem estar autenticado
if (!isset($_SESSION['user'])){
    $_SESSION['msg'] = "É necessário logar antes de acessar a página de menu!!";
    header ("Location: index.php");
    exit;
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
        <div class= "content">
            <table>
                <thead>
                    <!-- cria uma linha na tabela -->
                    <tr>
                        <!-- cria células de dados em uma linha, formando 3 colunas nesse caso  -->
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Login</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    //procura os dados da tabela(reotrna todas as linhas). obs: não é a mesma variavel que esta em menu
                    $consulta = mysqli_query($conexao, "select cod, nome, login, senha from usuario");
                    $i=1;
                    // a cada loop o array vai mostrar uma linha diferente
                    while ($dados = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){                       
                        ?>
                    <!-- aqui muda a class dinamicamente com o php, podendo ser par ou impar, impactando na cor da linha") -->
                    <tr class= "<?php echo $i++%2==0?"par":"impar" ?>">
                        <!-- colocando uma linha de dados na tabela -->
                        <td><?php echo $dados['cod']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['login']; ?></td>
                    </tr>

                    <?php } ?>

                </tbody>
            </table>


        </div>

    
    </body>
</html>