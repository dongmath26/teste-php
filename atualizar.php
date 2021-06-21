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
                PREÇO:<input type="text" name="preco_prod"><p></p>
                <button onclick=UPDATE_PRECO()>ALTERAR PREÇO</button>
                <button onclick=voltar()>VOLTAR</button>

                <script>
                        function UPDATE_PRECO(){
                            <?php
                                if(isset($_POST['codigo_prod'])){
                                    try{
                                        $con = new PDO("mysql:host=localhost;dbname=testephp", "root", "");
                                        
                                        $stmt = $con->prepare("UPDATE precos SET preco = :pr WHERE idpreco = :idp");
                                        $stmt->bindValue(":pr",$_POST['codigo_prod']);
                                        $stmt->bindValue(":idp",$_POST['preco_prod']);
                                        $stmt->execute();
                                    }catch (PDOException $ex){
                                        echo $ex->getMessage();
                                    }
                                }else{
                                    echo 'NADA FOI FEITO';
                                }
                            ?>
                        }
                        function voltar(){
                            <?php 
                            if(isset($_POST['preco_prod']) > 0){
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