<?php 
// Exibe erros
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

session_start();

include 'inc/funcoes.php';


$logado = 0;
$msg = '';

if (isset($_SESSION['erroLogin'])) { $msg = $_SESSION['erroLogin']; }
if (isset($_SESSION['loginOk'])) { $logado = $_SESSION['loginOk']; }
if (isset($_SESSION['userNome'])) { $user_nome = $_SESSION['userNome']; }
if (isset($_SESSION['userEmail'])) { $user_email = $_SESSION['userEmail']; }
if (isset($_SESSION['userId'])) { $id_usuario = $_SESSION['userId']; }
if (isset($_SESSION['userAtivo'])) { $user_ativo = $_SESSION['userAtivo']; }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" dir="ltr">
    <head>
        <?php include 'inc/head.php';?>
    	<script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
    </head>
    <body>
        
        <!--        <?php var_dump($_SESSION); ?>-->

<!-- Modal LOGIN  -->
<?php include 'inc/login.php'; // Modal LOGIN ?>

    <!-- MENU PRINCIPAL  -->            
    <?php include 'inc/menu.php'; // MENU PRINCIPAL ?>
    
    <?php //if (isset($_SESSION['erroLogin'])) { // AVISOS ?>
        <div class="container avisos">
            <?php echo $_SESSION['erroLogin']; unset($_SESSION['erroLogin']); ?>
        </div>
    <?php //} // END if (isset($_SESSION['erroLogin'])) ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
    <?php 
    echo ($logado) ? "<label>Logado como <b>{$user_nome}</b></label>" : "<label> </label>" ;
    ?>
            </div>
        </div>
    </div>
    
        
        

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="painelEditor">
            <!-- EDITOR -->
            <?php include 'inc/editor.php'; // EDITOR ?>
        </div>
    <?php if (!$logado) : ?>
        <div role="tabpanel" class="tab-pane" id="painelCadastro">
            <!-- CADASTRO -->
            <h1>Cadastro</h1>
            <?php //include 'inc/cadastro.php'; // CADASTRO ?>
        </div>
    <?php else: ?>
        <div role="tabpanel" class="tab-pane" id="painelPerfil">
            <!-- PERFIL -->
            <!-- <h1>Perfil</h1> -->
            <?php include 'inc/perfil.php'; // PERFIL ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="painelArquivos">
            <!-- ARQUIVOS -->
            <h1>Arquivos</h1>
            <?php //include 'inc/arquivos.php'; // ARQUIVOS ?>
        </div>
    <?php endif;?>
    </div>

    <!-- FOOTER -->
    <footer id="footer" class="container">
        <p>
            Desenvolvido por <a target="_blank" href="mailto:fernando.ribeiro357@gmail.com">Fernando Ribeiro</a><br />
            Utiliza a biblioteca <a target="_blank" href="http://www.fpdf.org/">FPDF</a>.
        </p>
    </footer>
    
    <!-- Scripts -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/funcoes.js" type="text/javascript"></script>    
	</body>
</html>