<?php


?>
            
            <div class="container editor">
                <div class="well">
                    <form id="formEditor" method="post" action="pdf.php" class="form-group" target="_blank">
                        <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                        <!-- CABEÇALHO -->
                        <fieldset>
                            <legend>Cabeçalho</legend>                            
                            <div class="row">
                                <div class="form-group col-md-3 col-xs-5">
                                    <!-- FONTE -->
                                    <select class="form-control" title="Fonte do cabeçalho" name="fonte_cabecalho">
                                        <option style="font-family: 'times'" value="Times" <?= ($_SESSION['fonte_cabecalho']=="Times") ? "selected" : ""; ?>>Times</option>
                                        <option style="font-family: 'courier'" value="Courier" <?= ($_SESSION['fonte_cabecalho']=="Courier") ? "selected" : ""; ?>>Courier</option> 
                                        <option style="font-family: 'helvetica'" value="Helvetica" <?= ($_SESSION['fonte_cabecalho']=="Helvetica") ? "selected" : ""; ?>>Helvetica</option>
                                        <option style="font-family: 'arial'" value="Arial" <?= ($_SESSION['fonte_cabecalho']=="Arial") ? "selected" : ""; ?>>Arial</option>
                                    </select>
                                </div>
                                <div class="form-group num col-md-1 col-xs-2">
                                    <!-- TAMANHO DA FONTE -->
                                    <select title="Tamanho da fonte do cabeçalho" class="form-control" name="tam_fonte_cabecalho">
                                    <?php 
                                    if ($_SESSION['tam_fonte_cabecalho'] == "") {
                                        $tam_fonte_cabecalho = 8; 
                                    } else { 
                                        $tam_fonte_cabecalho = $_SESSION['tam_fonte_cabecalho']; 
                                    }
                                    optionNum(5, 40, $tam_fonte_cabecalho);
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-xs-5">
                                    <!-- ALINHAMENTO DO TEXTO -->
                                    <select title="Alinhamento do cabeçalho" class="form-control" name="align_cabecalho">
                                        <option value="L" <?= ($_SESSION['align_cabecalho']=="L") ? "selected" : ""; ?>>Esquerda</option>
                                        <option value="R" <?= ($_SESSION['align_cabecalho']=="R") ? "selected" : ""; ?>>Direita</option>
                                        <option value="C" <?= ($_SESSION['align_cabecalho']=="C") ? "selected" : ""; ?>>Centro</option>
                                        <option value="J" <?= ($_SESSION['align_cabecalho']=="J") ? "selected" : ""; ?>>Justificado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <!-- COR E ESTILO DO TEXTO -->
                                    <div class="checkbox">
                                        <label title="Cor do cabeçalho" class="cor">
                                            <input type="color" name="cor_cabecalho" value="<?= $_SESSION['cor_cabecalho'];?>"><span> Cor</span>
                                        </label>
                                        <label title="Negrito" class="col-xs-3">
                                            <input type="checkbox"  name="b_cabecalho" value="B" <?= ($_SESSION['b_cabecalho']=="B") ? "checked" : ""; ?>>
                                            <strong> Negrito </strong>
                                        </label>
                                        <label title="Itálico" class="col-xs-3">
                                            <input type="checkbox" name="i_cabecalho" value="I" <?= ($_SESSION['i_cabecalho']=="I") ? "checked" : ""; ?>>
                                            <em> Itálico </em>
                                        </label>
                                        <label title="Sublinhado" class="col-xs-3">
                                            <input type="checkbox" name="u_cabecalho" value="U" <?= ($_SESSION['u_cabecalho']=="U") ? "checked" : ""; ?>>
                                             <u>Sublinhado</u>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div title="Cabeçalho" class="col-xs-12">
                                    <input type="text" name="cabecalho" id="cabecalho" value="<?= encodeToUtf8($_SESSION['cabecalho']);?>">
                                </div>                                
                            </div>
                        </fieldset>
                        <!-- TÍTULO -->
                        <fieldset>
                            <legend>Título</legend>                            
                            <div class="row">
                                <div class="form-group col-md-3 col-xs-5">
                                    <!-- FONTE -->
                                    <select class="form-control" title="Fonte do título" name="fonte_titulo">
                                        <option style="font-family: 'times'" value="Times" <?= ($_SESSION['fonte_titulo']=="Times") ? "selected" : ""; ?>>Times</option>
                                        <option style="font-family: 'courier'" value="Courier" <?= ($_SESSION['fonte_titulo']=="Courier") ? "selected" : ""; ?>>Courier</option>
                                        <option style="font-family: 'helvetica'" value="Helvetica" <?= ($_SESSION['fonte_titulo']=="Helvetica") ? "selected" : ""; ?>>Helvetica</option>
                                        <option style="font-family: 'arial'" value="Arial" <?= ($_SESSION['fonte_titulo']=="Arial") ? "selected" : ""; ?>>Arial</option>
                                    </select>
                                </div>
                                <div class="form-group num col-md-1 col-xs-2">
                                    <!-- TAMANHO DA FONTE -->
                                    <select title="Tamanho da fonte do título" class="form-control" name="tam_fonte_titulo">
                                    <?php 
                                    if ($_SESSION['tam_fonte_titulo'] == "") {
                                        $tam_fonte_titulo = 14; 
                                    } else { 
                                        $tam_fonte_titulo = $_SESSION['tam_fonte_titulo']; 
                                    }
                                    optionNum(5, 40, $tam_fonte_titulo); 
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-xs-5">
                                    <!-- ALINHAMENTO DO TÍTULO -->
                                    <select title="Alinhamento do título" class="form-control" name="align_titulo">
                                        <option value="L" <?= ($_SESSION['align_titulo']=="L") ? "selected" : ""; ?>>Esquerda</option>
                                        <option value="R" <?= ($_SESSION['align_titulo']=="R") ? "selected" : ""; ?>>Direita</option>
                                        <option value="C" <?= ($_SESSION['align_titulo']=="C") ? "selected" : ""; ?>>Centro</option>
                                        <option value="J" <?= ($_SESSION['align_titulo']=="J") ? "selected" : ""; ?>>Justificado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <!-- COR E ESTILO DO TEXTO -->
                                    <div class="checkbox">
                                        <label title="Cor do título" class="cor">
                                            <input type="color" name="cor_titulo" value="<?= $_SESSION['cor_titulo'];?>"><span> Cor</span>
                                        </label>
                                        <label title="Negrito" class="col-xs-3">
                                            <input type="checkbox"  name="b_titulo" value="B" <?= ($_SESSION['b_titulo']=="B") ? "checked" : ""; ?>>
                                            <strong> Negrito </strong>
                                        </label>
                                        <label title="Itálico" class="col-xs-3">
                                            <input type="checkbox" name="i_titulo" value="I" <?= ($_SESSION['i_titulo']=="I") ? "checked" : ""; ?>>
                                            <em> Itálico </em>
                                        </label>
                                        <label title="Sublinhado" class="col-xs-3">
                                            <input type="checkbox" name="u_titulo" value="U" <?= ($_SESSION['u_titulo']=="U") ? "checked" : ""; ?>>
                                            <u>Sublinhado</u>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div title="Título" class="col-xs-12">
                                    <input type="text" name="titulo" id="titulo" value="<?= encodeToUtf8($_SESSION['titulo']);?>">
                                </div>
                            </div>
                        </fieldset>
                        <!-- TEXTO -->
                        <fieldset>
                            <legend>Texto</legend>
                            <div class="row">
                                <div class="form-group col-md-3 col-xs-5">
                                    <!-- FONTE -->
                                    <select class="form-control" title="Fonte do texto" name="fonte_texto">
                                        <option style="font-family: 'times'" value="Times" <?= ($_SESSION['fonte_texto']=="Times") ? "selected" : "";?>>Times</option>
                                        <option style="font-family: 'courier'" value="Courier" <?= ($_SESSION['fonte_texto']=="Courier") ? "selected" : "";?>>Courier</option>
                                        <option style="font-family: 'helvetica'" value="Helvetica" <?= ($_SESSION['fonte_texto']=="Helvetica") ? "selected" : "";?>>Helvetica</option>
                                        <option style="font-family: 'arial'" value="Arial" <?= ($_SESSION['fonte_texto']=="Arial") ? "selected" : "";?>>Arial</option>
                                    </select>
                                </div>
                                <div class="form-group num col-md-1 col-xs-2">
                                    <!-- TAMANHO DA FONTE -->
                                    <select title="Tamanho da fonte do texto" class="form-control" name="tam_fonte_texto">
                                    <?php
                                    if ($_SESSION['tam_fonte_texto'] == "") {
                                        $tam_fonte_texto = 12; 
                                    } else { 
                                        $tam_fonte_texto = $_SESSION['tam_fonte_texto']; 
                                    }
                                    optionNum(5, 40, $tam_fonte_texto);
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-xs-5">
                                    <!-- ALINHAMENTO DO TEXTO -->
                                    <select title="Alinhamento do texto" class="form-control" name="align_texto">
                                        <option value="L" <?= ($_SESSION['align_texto']=="L") ? "selected" : ""; ?>>Esquerda</option>
                                        <option value="R" <?= ($_SESSION['align_texto']=="R") ? "selected" : ""; ?>>Direita</option>
                                        <option value="C" <?= ($_SESSION['align_texto']=="C") ? "selected" : ""; ?>>Centro</option>
                                        <option value="J" <?= ($_SESSION['align_texto']=="J") ? "selected" : ""; ?>>Justificado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <!-- COR E ESTILO DO TEXTO -->
                                    <div class="checkbox">
                                        <label title="Cor do texto" class="cor">
                                            <input type="color" name="cor_texto" value="<?= $_SESSION['cor_texto'];?>"><span> Cor</span>
                                        </label>
                                        <label title="Negrito" class="col-xs-3">
                                            <input type="checkbox"  name="b_texto" value="B" <?= ($_SESSION['b_texto']=="B") ? "checked" : ""; ?>>
                                            <strong> Negrito </strong>
                                        </label>
                                        <label title="Itálico" class="col-xs-3">
                                            <input type="checkbox" name="i_texto" value="I" <?= ($_SESSION['i_texto']=="I") ? "checked" : ""; ?>>
                                            <em> Itálico </em>
                                        </label>
                                        <label title="Sublinhado" class="col-xs-3">
                                            <input type="checkbox" name="u_texto" value="U" <?= ($_SESSION['u_texto']=="U") ? "checked" : ""; ?>>
                                            <u>Sublinhado</u>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="texto" 
                                              rows="10" cols="50" 
                                              id="texto" 
                                              title="Texto"><?= encodeToUtf8($_SESSION['texto']); ?></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <!-- RODAPÉ -->
                        <fieldset>
                            <legend>Rodapé</legend>
                            <!-- <legend class="legend">Rodapé</legend> -->
                            <!-- <span class="legend">Rodapé</span> -->
                            <div class="row">
                                <div class="form-group col-md-3 col-xs-5">
                                    <!-- FONTE -->
                                    <select class="form-control" title="Fonte do rodapé" name="fonte_rodape">
                                        <option style="font-family: 'times'" value="Times" <?= ($_SESSION['fonte_rodape']=="Times") ? "selected" : "";?>>Times</option>
                                        <option style="font-family: 'courier'" value="Courier" <?= ($_SESSION['fonte_rodape']=="Courier") ? "selected" : "";?>>Courier</option>
                                        <option style="font-family: 'helvetica'" value="Helvetica" <?= ($_SESSION['fonte_rodape']=="Helvetica") ? "selected" : "";?>>Helvetica</option>
                                        <option style="font-family: 'arial'" value="Arial" <?= ($_SESSION['fonte_rodape']=="Arial") ? "selected" : "";?>>Arial</option>
                                    </select>
                                </div>
                                <div class="form-group num col-md-1 col-xs-2">
                                    <!-- TAMANHO DA FONTE -->
                                    <select title="Tamanho da fonte do rodapé" class="form-control" name="tam_fonte_rodape">
                                    <?php 
                                    if ($_SESSION['tam_fonte_rodape'] == "") {
                                        $tam_fonte_rodape = 8; 
                                    } else { 
                                        $tam_fonte_rodape = $_SESSION['tam_fonte_rodape']; 
                                    }
                                    optionNum(5, 40, $tam_fonte_rodape); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-xs-5">
                                    <!-- ALINHAMENTO DO TEXTO -->
                                    <select title="Alinhamento do rodapé" class="form-control" name="align_rodape">
                                        <option value="L" <?= ($_SESSION['align_rodape']=="L") ? "selected" : "";?>>Esquerda</option>
                                        <option value="R" <?= ($_SESSION['align_rodape']=="R") ? "selected" : "";?>>Direita</option>
                                        <option value="C" <?= ($_SESSION['align_rodape']=="C") ? "selected" : "";?>>Centro</option>
                                        <option value="J" <?= ($_SESSION['align_rodape']=="J") ? "selected" : "";?>>Justificado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <!-- COR E ESTILO DO TEXTO -->
                                    <div class="checkbox">
                                        <label title="Cor do rodapé" class="cor">
                                            <input type="color" name="cor_rodape" value="<?= $_SESSION['cor_rodape'];?>"><span> Cor</span>
                                        </label>
                                        <label title="Negrito" class="col-xs-3">
                                            <input type="checkbox"  name="b_rodape" value="B" <?= ($_SESSION['b_rodape']=="B") ? "checked" : ""; ?>>
                                            <strong> Negrito </strong>
                                        </label>
                                        <label title="Itálico" class="col-xs-3">
                                            <input type="checkbox" name="i_rodape" value="I" <?= ($_SESSION['i_rodape']=="I") ? "checked" : ""; ?>>
                                            <em> Itálico </em>
                                        </label>
                                        <label title="Sublinhado" class="col-xs-3">
                                            <input type="checkbox" name="u_rodape" value="U" <?= ($_SESSION['u_rodape']=="U") ? "checked" : ""; ?>>
                                            <u>Sublinhado</u>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div title="Rodapé" class="col-xs-12">
                                    <input type="text" name="rodape" id="rodape" value="<?= encodeToUtf8($_SESSION['rodape']); ?>">
                                </div>
                                <div class="col-xs-12">
                                    <span title="Exibir número de páginas">
                                        <input type="checkbox" name="pag_rodape" value="P" <?= ($_SESSION['pag_rodape']=="P") ? "checked" : ""; ?>> <small>Exibir n.<sup>o</sup> de páginas</small>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                        <!-- BOTÕES -->
                        <div id="botoes" class="row">
                            <div class="col-md-12">
                                <button class="btn btn-raised btn-danger" type="reset" name="limpar" title="Limpar">
                                    <i class="glyphicon glyphicon-remove-sign"></i>
                                    Limpar
                                </button>
                                <button class="pull-right btn btn-raised btn-success" type="submit" name="gerar_pdf" title="Gerar PDF">
                                    <i class="glyphicon glyphicon-new-window"></i>
                                    Gerar PDF
                                </button>
                            </div>
                        </div>
                    </form>                                
                </div>
            </div><!-- .container -->
           <!-- FIM EDITOR -->