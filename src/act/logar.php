<?php 
	session_start();
    $LOGIN = array_map("htmlspecialchars", $_POST);
    // extract($LOGIN);

    require '../db/db.php';
    include '../inc/funcoes.php';
    
    try{
       $stmte = $pdo->prepare("SELECT senha,salt,email FROM master WHERE email = :email");
       $stmte->bindParam(':email', $LOGIN['emailLogin'] , PDO::PARAM_STR);
       $executa = $stmte->execute();
 		
      if($executa){
          $dados = $stmte->fetch(PDO::FETCH_ASSOC);          
          $salt = $dados['salt'];          
          $senha = $dados['senha'];          
          $hash = crypt($LOGIN['senhaLogin'],"$6$".$salt);
          if ($senha === $hash) {
          	$st2 = $pdo->prepare("SELECT * FROM master WHERE senha = :hash");
      			$st2->bindParam(':hash', $hash , PDO::PARAM_STR);
      			$exec2 = $st2->execute();
      			if ($exec2) {
      				$user = $st2->fetch(PDO::FETCH_ASSOC);
      				// echo "<pre>";
      				// var_dump($user);
      				// echo "</pre>";
      				
      				if ($user['ativo']) {
      					$_SESSION['userNome'] = $user['nome'];
      					$_SESSION['userEmail'] = $user['email'];
      					$_SESSION['userId'] = $user['id'];
      					$_SESSION['userAtivo'] = $user['ativo'];
      					$_SESSION['userSenha'] = $user['senha'];
      					$_SESSION['userSalt'] = $user['salt'];
      					// echo "<br>Login válido! \":^)<br>";
      					$_SESSION['loginOk'] = 1;
      					unset($_SESSION['erroLogin']);
                // $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-success'>
                //                             <button type='button' class='close' data-dismiss='alert'>&times;</button>
                //                             Bem vindo <strong>{$user['nome']}</strong>!
                //                           </div>";
      					header('Location: ../');
      				} else {
      					// echo "<br>Login NÃO válido!\":^(<br>";
      		          	$_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                  <strong>Seu cadastro ainda não está ativo.</strong><br>Entre em contado com o <a href='#' class='alert-link'>Administrador</a> e solicite a ativação.
                                                </div>";
      		          	header('Location: ../');		
      				}
      			}
          	
          } else {
          	// echo "<br>Login NÃO válido!\":^(<br>";
            $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Você digitou o login ou senha incorretamente!</strong><br>Por favor verifique seus dados antes de tentar entrar novamente.
                                          </div>";
          	header('Location: ../');
          }
       }
       else{
          // echo 'Erro ao ler os dados';
          $_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                      <strong>Erro ao ler os dados!</strong><br>Tente novamente mais tarde.</a>.
                                    </div>";
          header('Location: ../');
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }

// TESTE
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
