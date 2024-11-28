    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header col-xs-10">
                <a href="<?= $_SERVER['PHP_SELF']; ?>">
                    <img class="brand" alt="Logomarca" src="img/logo.png">
                    <span class="navbar-brand">&nbsp;Editor de Texto</span>
                </a>
            </div>
            <a  class="menu-hamburger" href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a>
        </div> <!-- class="container" -->
    </nav>
        <div class="collapse" id="collapseMenu">
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#" id="botaoEditor" data-toggle="tab" data-target="#painelEditor">
                            <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Editor
                        </a>
                    </li>
                <?php if(!$logado): ?>
                    <li>
                        <a id="botaoEntrar" href="#"
                           data-toggle="modal" 
                           data-target="#loginModal">
                           <i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Entrar
                        </a>
                    </li>
                    <li class="botao_cadastro">
                        <a id="botaoCadastro" href="#" 
                           data-target="#painelCadastro"
                           data-toggle="tab">
                            <i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Cadastro
                       </a>
                    </li>
                <?php else: ?>
                <!-- Menu do usuário -->                    
                    <li>
                        <a href="#" id="botaoPerfil" data-toggle="tab" data-target="#painelPerfil">
                            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Pefil
                        </a>
                    </li>
                    <li>
                        <button  id="botaoSalvar" class="btn btn-link btn-xs" form="formEditor" formaction="act/salvar_texto.php" type="submit" name="botaoSalvar">
                            <i class="glyphicon glyphicon-cloud-upload"></i>&nbsp;&nbsp;Salvar
                        </button>
                    </li>
                    <li>
                        <a href="#" id="botaoArquivos" data-toggle="tab" data-target="#painelArquivos">
                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Arquivos
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a id="botaoSair" href="act/sair.php">
                            <i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Sair
                        </a>
                    </li>                    
                <!-- FIM MENU USUÁRIO -->    
                <?php endif;?>
                </ul> <!-- class="nav navbar-nav navbar-right" -->
            </div> <!-- class="container" -->
        </div>
    <!-- FIM MENU PRINCIPAL -->    