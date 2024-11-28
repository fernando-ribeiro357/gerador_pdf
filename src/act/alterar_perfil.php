<?php 

session_start();
require '../db/db.php';
include '../inc/funcoes.php';

$post = array_map("htmlspecialchars", $_POST);
extract($post);

if ($perfilSenha != $perfilSenha1) {
  $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-warning'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Repita a senha corretamente alterá-la.
                            </div>";
            header('Location: ../');
} else {
    // echo "<h1>Alterar Perfil</h1><hr>";
    // echo "Id: {$perfilId}<br>";
    // echo "Nome: {$perfilNome}<br>";
    // echo "E-mail: {$perfilEmail}<br>";
    // echo "Senha: {$perfilSenha}<br>";
    // echo "Senha1: {$perfilSenha1}<br>";

    if (isset($perfilSenha) && isset($perfilSenha1) && $perfilSenha != '') :
        $salt = randomString();
        $senha = crypt($perfilSenha,"$6$".$salt);
    else:
        $senha = $_SESSION['userSenha'];
        $salt = $_SESSION['userSalt'];
    endif;
    
    
    
    
    try{
        $stmt = $pdo->prepare('UPDATE master SET nome = :nome, email = :email, senha = :senha, salt = :salt WHERE id = :id');
        $stmt->bindValue(':nome', $perfilNome);
        $stmt->bindValue(':email', $perfilEmail);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':salt', $salt);
        $stmt->bindValue(':id', $perfilId);

        // $exec = $stmt->execute(array(':id'   => $perfilId, ':nome' => $perfilNome, ':email' => $perfilEmail, ':senha' => $senha, ':salt' => $salt));
        $exec = $stmt->execute();
            
          if($exec){          
              // echo 'Perfil atualizado com sucesso!<hr>';
              $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-success'>
                                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                          <strong>Perfil atualizado com sucesso!</strong>
                                        </div>";
              header('Location: ../');
            $_SESSION['userNome'] = $perfilNome;
            $_SESSION['userEmail'] = $perfilEmail;
           } else {
              // echo 'Erro ao tentar atualizar.<hr>';
              $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                          <strong>Erro ao tentar atualizar seu perfil!</strong><br>Tente novamente mais tarde.</a>.
                                        </div>";
              header('Location: ../');
           }
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>