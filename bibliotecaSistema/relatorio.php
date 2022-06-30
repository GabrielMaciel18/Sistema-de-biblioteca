<?php

require_once('config.php');
try{
    $stmte = $pdo->query("SELECT * FROM emprestimo");
    $executa = $stmte->execute();

    if(!empty($_GET['search']))
    {
        echo" Contem algo, pesquisar";
        $data = $_GET['search'];
        echo"<br>";
        $stmte = $pdo->query("SELECT * FROM emprestimo WHERE id LIKE '%$data%' or curso LIKE '%$data%' or nomeAluno LIKE '%$data%' or dataEmprestimo LIKE '%$data%' or tituloLivro LIKE '%$data%' or dataDevolucao LIKE '%$data%' or status LIKE '%$data%' ORDER BY id DESC");
 
    }
    else
    {
        echo" Não Contem algo, trazer todos os registro";
        $sql = "SELECT * FROM emprestimo ORDER BY id DESC";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css' rel='stylesheet'>
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <scipt src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    
    <title>Relatórios</title>

    <style>
    body  { background-color: rgb(49, 126, 202); color: rgb(49, 126, 202);}

    table {color: black;}

    .box-search{display: flex; justify-content: center; gap: 1%;}
</style>

</head>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript"></script>
      <style>
        body{ padding: 2px 10px }
    a:link {
      text-decoration: none;
      color: rgb(49, 126, 202);
    }

    a:visited {
      color: rgb(49, 126, 202);
    }

    .d-flex {
    text-align: center;
    margin: 18px;
    position: absolute;
    right: 160px;
    bottom: 10px;
    body{ background-color: rgb(49, 126, 202);}
    }
    
  </style>
<body>

<!-- -->

<div class="box-search">
<input type="search " class="form-control w-25" placeholder="Pesquisar" id="Pesquisar">
<br>
<button onclick="searchData()" class="btn btn-success">

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>

</button>

<!-- -->
<br>    
</div>

    <table border="3" id="table" class="table table-striped table-info" style="width:100%">
        <tr>
            <td>Curso</td>
            <td>Nome do aluno</td>
            <td>Data de empréstimo</td>
            <td>Título do livro</td>
            <td>Data de devolução</td>
            <td>Status</td>
            <td colspan="2" align="center">Opções</td>
        </tr>
       

</body>

<!-- -->
<script>
    var search = document.getElementById('Pesquisar'); 
       
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData(){

window.location = 'relatorio.php?search='+search.value;
        }
</script>
<!-- -->
<?php
    if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){   
?>
    <tr>
		
		<td><?=$reg->curso?></td>
        <td><?=$reg->nomeAluno?></td>
        <td><?=$reg->dataEmprestimo?></td>
        <td><?=$reg->tituloLivro?></td>
        <td><?=$reg->dataDevolucao?></td>
        <td><?=$reg->status?></td>
		<td><a href="editar_relatorio.php?id=<?=$reg->id?>">Editar</a></td>
        <td><a href="dar_baixa.php?id=<?=$reg->id?>">Dar Baixa</a></td>
    </tr>
<?php
       }
       print '</table>';
    }else{
           echo 'Erro ao inserir os dados';
    }
}catch(PDOException $e){
      echo $e->getMessage();
}
?>

<a href="index.php"><button type="button" class="btn btn-dark btn-lg">Voltar</button></a>