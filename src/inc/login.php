<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="login" method="post" action="act/logar.php">
                    <div class="form-group">
                        <label for="emailLogin">E-mail</label>
                        <input type="email" class="form-control" name="emailLogin" id="emailLogin">
                    </div>
                    <div class="form-group">
                        <label for="senhaLogin">Senha</label>
                        <input type="password" class="form-control" name="senhaLogin" id="senhaLogin">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="login" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </div>
</div>
<!--FIM MODAL LOGIN-->
