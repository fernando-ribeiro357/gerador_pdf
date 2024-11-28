<?php session_start();
// Exibe erros
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require '../db/db.php';
include '../inc/funcoes.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />      
    </head>
    <body>
<?php
$POST = array_map("htmlspecialchars", $_POST);
$TEXTO = array_map("decodeFromUtf8", $POST);
$botao = array_shift($TEXTO);
// print_r($TEXTO);
$KEYS = array_keys($TEXTO);
// print_r($KEYS);
// $set = "{$KEYS[0]}";
// $val = ":{$KEYS[0]}";
echo "<pre>";


// $n = 0;
foreach ($KEYS as $key) {
  if (isset($POST["{$key}"])) {
     ${$key} = $POST["{$key}"];
   } else {
     ${$key} = "";
   }
   // echo "$"."{$key}, <br>";
   // $n++;
}

    

$str = 'id_usuario,fonte_cabecalho,tam_fonte_cabecalho,align_cabecalho,cor_cabecalho,b_cabecalho,i_cabecalho,u_cabecalho,cabecalho,fonte_titulo,tam_fonte_titulo,align_titulo,cor_titulo,b_titulo,i_titulo,u_titulo,titulo,fonte_texto,tam_fonte_texto,align_texto,cor_texto,b_texto,i_texto,u_texto,texto,fonte_rodape,tam_fonte_rodape,align_rodape,cor_rodape,b_rodape,i_rodape,u_rodape,rodape,pag_rodape';
$INDEX = str_getcsv($str, ",");

foreach ($INDEX as $index) {
    if (isset($POST["{$index}"])) {
      ${$index} = $POST["{$index}"];
    } else {
      ${$index} = "";
    }
    echo "$"."{$index} = ";
    var_dump(${$index});
    // echo "<br>";
}


    // INSERT INTO tabela (c1, c2, c3) VALUES (:c1, :c2, :c3)
    $query = "INSERT INTO textos (id_usuario, fonte_cabecalho, tam_fonte_cabecalho, align_cabecalho, cor_cabecalho, b_cabecalho, i_cabecalho, u_cabecalho, cabecalho, fonte_titulo, tam_fonte_titulo, align_titulo, cor_titulo, b_titulo, i_titulo, u_titulo, titulo, fonte_texto, tam_fonte_texto, align_texto, cor_texto, b_texto, i_texto, u_texto, texto, fonte_rodape, tam_fonte_rodape, align_rodape, cor_rodape, b_rodape, i_rodape, u_rodape, rodape, pag_rodape) 
              VALUES ($id_usuario, '$fonte_cabecalho', '$tam_fonte_cabecalho', '$align_cabecalho', '$cor_cabecalho', '$b_cabecalho', '$i_cabecalho', '$u_cabecalho', '$cabecalho', '$fonte_titulo', '$tam_fonte_titulo', '$align_titulo', '$cor_titulo', '$b_titulo', '$i_titulo', '$u_titulo', '$titulo', '$fonte_texto', '$tam_fonte_texto', '$align_texto', '$cor_texto', '$b_texto', '$i_texto', '$u_texto', '$texto', '$fonte_rodape', '$tam_fonte_rodape', '$align_rodape', '$cor_rodape', '$b_rodape', '$i_rodape', '$u_rodape', '$rodape', '$pag_rodape')";

    
// try {
    $stmt = $pdo->prepare($query);

    // $stmt->bindParam(':id_usuario', $id_usuario);
    // $stmt->bindParam(':fonte_cabecalho', $fonte_cabecalho);
    // $stmt->bindParam(':tam_fonte_cabecalho', $tam_fonte_cabecalho);
    // $stmt->bindParam(':align_cabecalho', $align_cabecalho);
    // $stmt->bindParam(':cor_cabecalho', $cor_cabecalho);
    // $stmt->bindParam(':b_cabecalho', $b_cabecalho);
    // $stmt->bindParam(':i_cabecalho', $i_cabecalho);
    // $stmt->bindParam(':u_cabecalho', $u_cabecalho);
    // $stmt->bindParam(':cabecalho', $cabecalho);
    // $stmt->bindParam(':fonte_titulo', $fonte_titulo);
    // $stmt->bindParam(':tam_fonte_titulo', $tam_fonte_titulo);
    // $stmt->bindParam(':align_titulo', $align_titulo);
    // $stmt->bindParam(':cor_titulo', $cor_titulo);
    // $stmt->bindParam(':b_titulo', $b_titulo);
    // $stmt->bindParam(':i_titulo', $i_titulo);
    // $stmt->bindParam(':u_titulo', $u_titulo);
    // $stmt->bindParam(':titulo', $titulo);
    // $stmt->bindParam(':fonte_texto', $fonte_texto);
    // $stmt->bindParam(':tam_fonte_texto', $tam_fonte_texto);
    // $stmt->bindParam(':align_texto', $align_texto);
    // $stmt->bindParam(':cor_texto', $cor_texto);
    // $stmt->bindParam(':b_texto', $b_texto);
    // $stmt->bindParam(':i_texto', $i_texto);
    // $stmt->bindParam(':u_texto', $u_texto);
    // $stmt->bindParam(':texto', $texto);
    // $stmt->bindParam(':fonte_rodape', $fonte_rodape);
    // $stmt->bindParam(':tam_fonte_rodape', $tam_fonte_rodape);
    // $stmt->bindParam(':align_rodape', $align_rodape);
    // $stmt->bindParam(':cor_rodape', $cor_rodape);
    // $stmt->bindParam(':b_rodape', $b_rodape);
    // $stmt->bindParam(':i_rodape', $i_rodape);
    // $stmt->bindParam(':u_rodape', $u_rodape);
    // $stmt->bindParam(':rodape', $rodape);
    // $stmt->bindParam(':pag_rodape', $pag_rodape);

    $exec = $stmt->execute();
    if($exec){          
      echo '<strong>Texto salvo com sucesso!</strong><hr>';
      $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-success'>
                                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                  <strong>Texto salvo com sucesso!</strong>
                                </div>";
      // header('Location: ../');            
    } else {
      echo '<strong>Erro ao tentar salvar o texto!</strong><hr>';
      $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                  <strong>Erro ao tentar salvar o texto!</strong><br>Tente novamente mais tarde.
                                </div>";
      // header('Location: ../');
    }    
// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
            
    
    
	
    echo "<pre>";
    echo "EXEC: ";
    var_dump($exec);
    echo "<hr>STMT:";
    var_dump($stmt);
    // echo "<hr>KEYS:";
    // print_r($KEYS);
    echo "<hr>INDEX:";
    print_r($INDEX);
    echo "<hr>QUERY: {$query}";
    echo "</pre>";

    ?>
  </body></html>