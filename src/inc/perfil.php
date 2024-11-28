<?php
if ($logado): ?>
            <div class="container perfil">
                <div class="well">
                    <form id="formPerfil" method="post" action="act/alterar_perfil.php" class="form-group">                        
                        <fieldset>
                            <legend>Perfil</legend>
                            <div class="row">
                                <div class="col-xs-2 col-md-1">
                                    <label>ID</label>
                                    <input class="col-xs-12" type="text" name="perfilId" id="perfilId" value="<?= $user_id;?>" readonly/>
                                </div>
                                <div class="col-xs-10 col-md-5">
                                    <label for="perfilNome">Nome</label>
                                    <input class="col-xs-12" type="text" name="perfilNome" id="perfilNome" value="<?= $user_nome;?>" />
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="perfilEmail">E-mail</label>
                                    <input class="col-xs-12" type="email" name="perfilEmail" id="perfilEmail" value="<?= $user_email;?>" />
                                </div>
                            </div>
                            <fieldset>
                                <legend class="trigger">Alterar Senha<span class="caret"></span></legend>
                                <div id="alterarSenha" class="collapse">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i title="Exibir senhas" id="exibeSenhas" class="pull-right glyphicon glyphicon-eye-open has-tooltip"></i>
                                        </div>
                                    </div>
                                    <div class="row">                                
                                        <div class="col-xs-12 col-md-6">
                                        <label for="perfilSenha">Nova senha</label>
                                            <input class="senha col-xs-12" type="password" name="perfilSenha" id="perfilSenha" />
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                        <label for="perfilSenha1">Repetir senha</label>
                                            <input class="senha col-xs-12" type="password" name="perfilSenha1" id="perfilSenha1" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </fieldset>
                        <!-- BOTÕES -->
                        <div id="botoes" class="row">
                            <div class="col-md-12">
                                <button class="btn btn-raised btn-danger" type="reset" name="Cancelar" title="Cancelar">
                                    <i class="glyphicon glyphicon-remove-sign"></i>
                                    Cancelar
                                </button>
                                <button class="pull-right btn btn-raised btn-success" type="submit" name="alterar_perfil" title="Alterar Perfil">
                                    <i class="glyphicon glyphicon-check"></i>
                                    Alterar Perfil
                                </button>
                            </div>
                        </div>
                    </form>                                
                </div><!--  .well -->
            </div><!-- .container -->
            <script>
            $('#exibeSenhas').click(function(){
                if($('.senha').attr('type') == "password"){
                    $('.senha').attr('type','text');
                    $('#exibeSenhas').removeClass('glyphicon-eye-open');
                    $('#exibeSenhas').addClass('glyphicon-eye-close');
                    // $('#exibeSenhas').attr('title','Ocultar senhas');
                    $('#exibeSenhas').attr('data-original-title','Ocultar senhas');
                } else {
                    $('.senha').attr('type','password');
                    $('#exibeSenhas').removeClass('glyphicon-eye-close');
                    $('#exibeSenhas').addClass('glyphicon-eye-open');
                    // $('#exibeSenhas').attr('title','Exibir senhas');
                    $('#exibeSenhas').attr('data-original-title','Exibir senhas');
                }
            });
            
            $('#perfilSenha1').change(function(){
                validaSenha(this,'perfilSenha');
            });
            $(".trigger").click(function(){
              $("#alterarSenha").collapse("toggle");
            });
            </script>

           <!-- FIM EDITOR -->           
<?php else: 

$_SESSION['erroLogin'] = "<div class='alert alert-dismissible alert-danger'>
                                 <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                 <strong>Você precisa estar logado para editar o seu perfil!</strong>
                              </div>";
    header('Location: ../');

endif; ?>