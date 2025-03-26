<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Página inicial</title>
    </head>
    <body>
        
        <h1>Tela de Login do Sistema</h1>
        <form action="menu.php"  method="POST">
            <fieldset>
                <legend>Dados de Usuário</legend>
                <table>
                    <tbody>
                        
                        
                        <!-- vai ferificar se tem algum resultado para mensagem 
                        no php (meun.php) e exibir vermelha e depois encerrar a sessão, para
                        que a pessoa consiga iniciar uma nova sessão sem a 
                        mensagem salva-->
                        <?php if (isset($_SESSION['msg'])) { ?>
                            <tr> <td colspan="2" style="color: red;">
                                <?php echo $_SESSION['msg']; ?></td></tr>
                                <?php
                                session_destroy();
                                } ?>
                                
                        <tr>
                            <td>Usuário:</td>
                            <td><input type="text" name="usuario"/></td>
                        </tr>
                        <tr>
                            <td>Senha:</td>
                            <td><input type="password" name="senha"></td>                           
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Entrar"/></td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                
            
            
            
           </fieldset>
        </form>