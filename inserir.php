<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sqlstyle.css">
    <title>INSERT-PAGE</title>
</head>
<body>
    <header><h2>INSERINDO PRODUTO</h2></header>
    <main>
        <form method="POST">
            <div>
                PRODUTO:<input type="text" name="nome_prod"><p></p>
                PREÇO:<input type="text" name="preco_prod"><p></p>
                COR:<input type="text" name="cor_prod"><p></p>
                <button onclick="gravar()">GRAVAR</button>
                <button onclick="voltar()">VOLTAR</button>

                <script>
                    function voltar(){
                        <?php if(isset($ide) > 0){
                            header("Location: ../index.php");
                        }
                         ?>
                    }

                    function gravar(){
                        <?php

                            if(isset($_POST['nome_prod'])){
                                try {
                                    $pdo = new PDO('mysql:host=localhost;dbname=testephp', "root", "");
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $ide = rand(1,99999);
                                
                                    $stmt = $pdo->prepare("INSERT INTO produtos VALUES(:id,:n,:c)");
                                    $query = $pdo->prepare("INSERT INTO precos VALUES(:idp,:p)");
                                
                                    $stmt->bindValue(":id", $ide);
                                    $stmt->bindValue(":n", $_POST['nome_prod']);
                                    $stmt->bindValue(":c", $_POST['cor_prod']);
                                
                                    $query->bindValue(":idp", $ide);
                                    $query->bindValue(":p", $_POST['preco_prod']);
                                
                                    $stmt->execute();
                                    $query->execute();
                                    
                                    header("Location: ../index.php ");

                                    echo $stmt->rowCount();
                                } catch(PDOException $e) {
                                    echo 'Error: ' . $e->getMessage();
                                }
                            } else {
                                echo 'NÃO FOI POSSÍVEL GRAVAR OS DADOS';
                            }

                        ?>
                    }
                </script>
            </div>
        </form>
    </main>
</body>
</html>