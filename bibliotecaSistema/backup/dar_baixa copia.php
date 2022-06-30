<?php 
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, status from emprestimo WHERE id = :id");
    $sth->bindParam(':id', $id, PDO::PARAM_STR); 
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $status = $reg->status;
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/jaj.css" rel="stylesheet">
</head>
<body>
    

<link href="" rel="stylesheet" media="screen">

<div class= "container">
 <div class="card">
    

   <div align="center">
     <form method="post" action="dar_baixa.php">
         <h2>

          <select name="status" value="<?=$status?>" required>
              <option name="D" value="D">Devolvido</option>
               <option name="P" value="P">Pendente</option>
          </select>   
        <input name="id" type="hidden" value="<?=$id?> required"> <br>
</h2>

<button>   <a href="relatorio.php">Voltar</a>   </button>

<button name= "enviar" class= "submit"> Enviar </button>
    </form>
    
        </div>
    </div>
</div>

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

</body>
</html>