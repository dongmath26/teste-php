<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Teste-De-PHP</title>
</head>

<body>
    
    <header> TESTE DE PHP </header>

    <main>

        <table>
            <tr>
                <th>CÓDIGO</th>
                <th>PRODUTO</th>
                <th>PREÇO</th>
                <th>COR</th>
            </tr>
        <?php
            $con = new PDO("mysql:host=localhost;dbname=testephp", "root", "");
            $rs = $con->prepare('SELECT p.idprod AS id, p.nome AS nome, pr.preco AS preco, p.cor AS cor FROM produtos p INNER JOIN precos pr WHERE pr.idpreco = p.idprod AND p.nome != "" ');
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($row = $rs->fetch(PDO::FETCH_OBJ)){ ?>
                        <tr> 
                            <th> <?php echo $row->id ?> </th>
                            <th> <?php echo $row->nome ?> </th>
                            <th> <?php echo $row->preco ?> </th>
                            <th> <?php echo $row->cor ?> </th>
                        </tr>
                        <?php } 
                    }
                }?>
                </table>
    </main>

    <hr>

    <div>
            <button onclick="IR_PARA_SQL_INSERT()">INSERIR PRODUTO</button>
            <button onclick="IR_PARA_SQL_UPDATE()">ATUALIZAR PREÇO</button>
            <button onclick="IR_PARA_SQL_DELETE()">DELETAR PRODUTO</button>
            <button onclick="IR_PARA_SEARCH_FILTRO()">PESQUISA FILTRADA</button>
        <script>
            function IR_PARA_SQL_INSERT() {
                window.location.href = "sql/inserir.php";
            }
            function IR_PARA_SQL_DELETE(){
                window.location.href = "sql/deletar.php";
            }
            function IR_PARA_SQL_UPDATE(){
                window.location.href = "sql/atualizar.php";
            }
            function IR_PARA_SEARCH_FILTRO() {
                window.location.href = "sql/pesquisa.php";
            }

        </script>
    
    </div>

</body>
</html>