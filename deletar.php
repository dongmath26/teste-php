<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sqlstyle.css">
    <title>UPDATE-PAGE</title>
</head>
<body>
    <header><h2>ATUALIZAR PRODUTO</h2></header>
    <main>
        <form method="POST">
            <div>
                CÓDIGO:<input type="text" name="codigo_prod"><p></p>
                <button onclick=APAGAR_PRODUTO()>DELETAR PRODUTO</button>
                <button onclick=voltar()>VOLTAR</button>

                <script>
                        function APAGAR_PRODUTO(){
                            <?php
                                if(isset($_POST['codigo_prod'])){
                                    try{
                                        $con = new PDO("mysql:host=localhost;dbname=testephp", "root", "");
                                        
                                        $stmt = $con->prepare("DELETE FROM produtos WHERE idprod = :i");
                                        $stmt->bindValue(":i",$_POST['codigo_prod']);
                                        $stmt->execute();

                                        $sql = $con->prepare("DELETE FROM precos WHERE idpreco = :p");
                                        $sql->bindValue(":p",$_POST['codigo_prod']);
                                        $sql->execute();

                                    }catch (PDOException $ex){
                                        echo $ex->getMessage();
                                    }
                                }else{
                                    echo 'O DELETE NÃO FOI CONCLUÍDO';
                                }
                            ?>
                        }
                        function voltar(){
                            <?php 
                            if(isset($_POST['codigo_prod']) > 0){
                                header("Location: ../index.php");
                            }
                            ?>
                        }
                </script>
            </div>
        </form>
    </main>
</body>
</html>