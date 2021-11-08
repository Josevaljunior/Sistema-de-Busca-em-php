<?php
include_once('conexao.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busca</title>
</head>
<body>
    <h1>Lista de Veiculos</h1>
   <form action="">
       <input type="text" name="busca" placeholder="Pesquise aqui...">
       <button type="subimit">pesquisar</button>
   </form>
   <br>
   <table border="1" width="600px">
       <tr>
           <th>Veiculo</th>
           <th>Modelo</th>
           <th>Fabricante</th>
       </tr>
       <?php
       if(!isset($_GET['busca'])){
       ?>
       <tr>
           <td colspan="3"> Digite algo em pesquisar...</td>
       </tr>
       <?php
       }else{
        $pesquisa = $mysqli->real_escape_string($_GET['busca']);
        $sql_code = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
        $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar o banco de dados". $mysqli->connect_error);
    }
       ?>
       <?php
       if($sql_query->num_rows == 0){
       ?>
       <tr>
           <td colspan="3">Nenhum resultado encontrado...</td>
       </tr>
       <?php
       }else{
        while($dados = $sql_query->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $dados['veiculo'] ?></td>
                <td><?php echo $dados['modelo'] ?></td>
                <td><?php echo $dados['fabricante']?></td>
            </tr>
            <?php
        }
        }
       ?>
       
   </table>
</body>
</html>