
            <div class="container cadastro">
                <div class="well">                    
                    <form id="formCadastro" method="post" action="act/cadastrar.php">
                        <legend>Solicitar Cadastro</legend>
                        <div class="form-group">
                            <label for="nomeCadastro">Nome</label>
                            <input type="text" class="form-control" id="nomeCadastro" name="nomeCadastro">
                        </div>
                        <div class="form-group">
                            <label for="loginCadastro">Login</label>
                            <input type="text" class="form-control" id="loginCadastro" name="loginCadastro">
                        </div>
                        <div class="form-group">
                            <label for="emailCadastro">E-mail</label>
                            <input type="email" class="form-control" id="emailCadastro" name="emailCadastro">
                        </div>
                        <div class="buttom-group">
                            <button type="reset" class="btn btn-default">Cancelar</button>
                            <button type="submit" form="formCadastro" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>     
            <!-- FIM CADASTRO -->