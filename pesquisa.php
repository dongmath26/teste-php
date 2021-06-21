<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sqlstyle.css">
    <title>Teste-De-PHP</title>
</head>

<body>
    
    <header>PESQUISA</header>
    <hr>
<!----------------------------------------------------------------------->
    <div> <!--filtro de nome-->
        <form method="post">
            <div id="filtro-por-nome">
                <h2>PESQUISAR POR NOME</h2>
                    <input type="text" name="nome-do-produto">
                    <input type="submit" value="pesquisar">
                <hr>

                    <div id="resultado-nome">
                        <table>
                        <?php

                        //PAREI AQUI!!! A TABELA COM O RESULTADO AINDA NÃO ESTÁ APARECENDO

                            if(isset($_POST['nome-do-produto'])){
                                $con = new PDO("mysql:host=localhost;dbname=testephp", "root", "");
                                $rs = $con->prepare('SELECT nome FROM produtos WHERE nome LIKE ":n" ORDER BY nome');
                                $rs->bindValue(":n",$_POST['nome-do-produto']);
                                    if($rs->execute()){
                                        if($rs->rowCount() > 0){
                                            while($row = $rs->fetch(PDO::FETCH_OBJ)){ ?>
                                               <tr> 
                                                    <th> <?php echo $row->nome ?> </th>
                                               </tr>
                                            <?php } 
                                        }
                                    }?>
                            <?php } ?>
                        </table>
                    </div> <!--fim resultado - filtro de nome-->

            </div>
<!--------------------------------------------------------------->
            <div id="filtro-por-cor"> <!--filtro de cor-->
                <h2>PESQUISAR POR COR</h2>
                    <select name="color">
                        <option value="NDA">-</option>
                        <option value="AZ">AZUL</option>
                        <option value="AM">AMARELO</option>
                        <option value="VE">VERMELHO</option>
                        <option value="OT">OUTRAS CORES</option>
                    </select>
                <hr>
            </div>
            <div id="filtro-por-preco">
                <h2>PESQUISAR POR PREÇO</h2>
                    <input type="text" name="numb-preco">
                        <select name="tipo-compara">
                            <option value="NDA">-</option>
                            <option value="MA">MAIOR QUE</option>
                            <option value="ME">MENOR QUE</option>
                            <option value="IG">IGUAL A</option>
                        </select>
                <hr>
            </div>
        </form>

        <form method="get">

        </form>
    </div>
    <hr>

 
</body>
</html>

<?php



?>