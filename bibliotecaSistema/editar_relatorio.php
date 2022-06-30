<?php 
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $curso = $reg->curso;
    $nomeAluno = $reg->nomeAluno;
    $dataEmprestimo = $reg->dataEmprestimo;
    $tituloLivro = $reg->tituloLivro;
    $dataDevolucao = $reg->dataDevolucao;
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Editar Relatório</title>
</head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<link href="" rel="stylesheet" media="screen">
<div align="center">
    <form method="post" action="">
       
    <label for="curso" name="curso" align="center" style="color: white" class="form-label">Curso</label>
        <div class="mx-auto" style="width: 200px;">
        <div align="center" class="form-label" class="mb-3">
        <select class="form-control" name="curso" value="<?=$curso?>"required>
            <option name="1 - Enf" value="1 - Enf">1° Enfermagem</option>
            <option name="2 - Enf" value="2 - Enf">2° Enfermagem</option>
            <option name="3 - Enf" value="3 - Enf">3° Enfermagem</option>
            <option name="1 - Hosp" value="1 - Hosp">1° Hospedagem</option>
            <option name="2 - Hosp" value="2 - Hosp">2° Hospedagem</option>
            <option name="3 - Hosp" value="3 - Hosp">3° Hospedagem</option>
            <option name="1 - Info" value="1 - Info">1° Informática</option>
            <option name="2 - Info" value="2 - Info">2° Informática</option>
            <option name="3 - Info" value="3 - Info">3° Informática</option>
            <option name="1 - Model" value="1 - Model">1° Modelagem</option>
            <option name="2 - Model" value="2 - Model">2° Modelagem</option>
            <option name="3 - Model" value="3 - Model">3° Modelagem</option>
        </select>
<br>
        <input name="id" type="hidden" value="<?=$id?> required">
        <div class="mx-auto" style="width: 200px;">
        <div align="center" class="mb-3">
             <label for="nomeAluno" style="color: white" class="form-label">Nome</label>
        <input type="text" name="nomeAluno" class="form-control" id="nomeAluno" placeholder="Nome do Aluno" value="<?=$nomeAluno?>" required>
        </div>

        <input name="id" type="hidden" value="<?=$id?> required">
        <div class="mx-auto" style="width: 200px;">
        <div align="center" class="mb-3">
             <label for="dataEmprestimo" style="color: white" class="form-label">Data de Empréstimo</label>
        <input type="date" name="dataEmprestimo" class="form-control" id="dataEmprestimo" placeholder="Data de Solicitação" value="<?=$dataEmprestimo?>" required>
        </div>

        <input name="id" type="hidden" value="<?=$id?> required">
        <div class="mx-auto" style="width: 200px;">
        <div align="center" class="mb-3">
             <label for="tituloLivro" style="color: white" class="form-label">Título do Livro</label>
        <input type="text" name="tituloLivro" class="form-control" id="tituloLivro" placeholder="Título do Livro" value="<?=$tituloLivro?>" required>
        </div>

        <input name="id" type="hidden" value="<?=$id?> required">
        <div class="mx-auto" style="width: 200px;">
        <div align="center" class="mb-3">
             <label for="dataDevolucao" style="color: white" class="form-label">Data de Devolução</label>
        <input type="date" name="dataDevolucao" class="form-control" id="dataDevolucao" placeholder="Prazo de Devolução" value="<?=$dataDevolucao?>" required>
        </div>

        <a href="relatorio.php"><button type="button" class="btn btn-primary">Voltar</button></a>

  <button name= "enviar" class="btn btn-success" class= "submit"> 
      Enviar
</button>
    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $curso = $_POST['curso'];
    $nomeAluno = $_POST['nomeAluno'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $tituloLivro = $_POST['tituloLivro'];
    $dataDevolucao = $_POST['dataDevolucao'];

    $sql = "UPDATE emprestimo SET curso = :curso, nomeAluno = :nomeAluno, dataEmprestimo = :dataEmprestimo, tituloLivro = :tituloLivro, dataDevolucao = :dataDevolucao WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':curso', $_POST['curso'], PDO::PARAM_INT);
    $sth->bindParam(':nomeAluno', $_POST['nomeAluno'], PDO::PARAM_INT);
    $sth->bindParam(':dataEmprestimo', $_POST['dataEmprestimo'], PDO::PARAM_INT);
    $sth->bindParam(':tituloLivro', $_POST['tituloLivro'], PDO::PARAM_INT);
    $sth->bindParam(':dataDevolucao', $_POST['dataDevolucao'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>