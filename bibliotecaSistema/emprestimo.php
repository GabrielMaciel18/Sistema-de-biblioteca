<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Empréstimo</title>
</head>
<body>
    <div align="center">
    <form name="formEmprestimo" method="POST" action="emprestimo.php">
        <br>
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
        </div>
        </select>
        <div class="mx-auto" style="width: 200px;">
            <br>
        <div align="center" class="mb-3">
            <label for="nomeAluno" style="color: white" class="form-label">Nome</label>
            <input type="text" name="nomeAluno" class="form-control" id="nomeAluno" placeholder="Nome do Aluno" required>
        </div>
        <div align="center" class="mb-3">
            <label for="dataEmprestimo" style="color: white" class="form-label">Data de Empréstimo</label>
            <input type="date" name="dataEmprestimo" class="form-control" id="dataEmprestimo" placeholder="Data de Solicitação" required>
        </div>
        <div align="center" class="mb-3">
            <label for="tituloLivro" style="color: white" class="form-label">Título</label>
            <input type="text" name="tituloLivro" class="form-control" id="tituloLivro" placeholder="Título do Livro" required>
        </div>
        <div align="center" class="mb-5">
            <label for="dataDevolucao" style="color: white" class="form-label">Data de Devolução</label>
            <input type="date" name="dataDevolucao" class="form-control" id="dataDevolucao" placeholder="Prazo de Devolução"required>
        </div>
        <div align="center">
    <a href="index.php"><button type="button" class="btn btn-primary btn-lg">Voltar</button></a>
    <button name= "Enviar" class="btn btn-success btn-lg" class= "submit">Enviar</button>
</div>
    </form>
</body> 
</html>
<?php 
    require_once('config.php');
        if(isset($_POST['Enviar'])){
            $curso=$_POST['curso'];
            $nomeAluno=$_POST['nomeAluno'];
            $dataEmprestimo=$_POST['dataEmprestimo'];
            $tituloLivro=$_POST['tituloLivro'];
            $dataDevolucao=$_POST['dataDevolucao'];

        try{
            $stmte = $pdo->prepare("INSERT INTO emprestimo(curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao) VALUES(?, ?, ?, ?, ?)");
            $stmte -> bindParam(1, $curso, PDO::PARAM_STR);
            $stmte -> bindParam(2, $nomeAluno, PDO::PARAM_STR);
            $stmte -> bindParam(3, $dataEmprestimo, PDO::PARAM_STR);
            $stmte -> bindParam(4, $tituloLivro, PDO::PARAM_STR);
            $stmte -> bindParam(5, $dataDevolucao, PDO::PARAM_STR);
            $executa = $stmte->execute();

            if($executa){
                echo 'Dados inseridos com sucesso';
                header('location: relatorio.php');
            }else{
                echo "Erro ao inserir dados";
            }

        }catch(PDOException $e){
            echo $e->GetMessage();
        }
        
        }
    

?>