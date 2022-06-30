<?php 
    require_once('config.php');
    $id=$_GET['id'];
    
    $sth = $pdo->prepare("SELECT id, status from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); 
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $status = $reg->status;
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="" rel="stylesheet" media="screen">

<div class= "container">
<div class="card">
    
<body>
<div align="center">
    <form method="post" action="">
        <h2>
        <br>
        <select class="btn btn-primary btn-lg" align="center" name="status" value="<?=$status?>">
            <option name="Pendente" class="btn btn-danger btn-lg" value="P">Pendente</option>
            <option name="Devolvido" class="btn btn-success btn-lg" value="D">Devolvido</option>  
        </select>
        <br>
        <input name="id" type="hidden" value="<?=$id?> required"> <br>

        <a href="relatorio.php"><button type="button" class="btn btn-primary btn-lg">Voltar</button></a>
        <button name="enviar" class="btn btn-success btn-lg" id="enviar" class="submit">Enviar</button>
        <br><br>
    </form>
</div>
</body>
<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    

    $sql = "UPDATE emprestimo SET status = :status WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':status', $_POST['status'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>