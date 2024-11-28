function sublinhado(seletor, id_campo){
    //$(seletor).click(function(){
        check = $(seletor).prop("checked");
        if (check){
            $(id_campo).css("text-decoration","underline");
        }else{
            $(id_campo).css("text-decoration","none");
        };
    //});
}

function italico(seletor, id_campo){
    // $(seletor).click(function(){
        check = $(seletor).prop("checked");
        if (check){
            $(id_campo).css("font-style","oblique");
        }else{
            $(id_campo).css("font-style","normal");
        };
    // });
}

function negrito(seletor, id_campo){
    // $(seletor).click(function(){
        check = $(seletor).prop("checked");
        if (check){
            $(id_campo).css("font-weight","600");
        }else{
            $(id_campo).css("font-weight","300");
        };
    // });
}

function alteraCor(seletor,id_campo){
  $(id_campo).css('color',seletor.val());
}

function alteraTamFonte(seletor,id_campo){ 
  $(id_campo).css('font-size',seletor.val()+'pt');
}

function alteraFonte(seletor,id_campo){ 
  $(id_campo).css('font-family',seletor.val());
}

function alteraAlign(seletor,id_campo){ 
  align = seletor.val();
  switch(align) {
    case "J":
        al = "justify";
        break;
    case "L":
        al = "left";
        break;
    case "R":
        al = "right";
        break;
    case "C":
        al = "center";
        break;
    default:
        al = "left";
  }  
  $(id_campo).css('text-align', al);
}

function corSelect(){
	$(".editor input[type='color']").each(function(){
		$(this).css('background-color', $(this).prop('value'));
	});
}

function nomesEstilos(){
  if ($(document).width() < 572){
      $('.editor strong').text("N");
      $('.editor em').text("I");
      $('.editor u').text("S");
  } else {
      $('.editor strong').text("Negrito");
      $('.editor em').text("Itálico");
      $('.editor u').text("Sublinhado");
  }
}

function ajustaBotao(){
    if ($(document).width() < 389){
        $('.btn').addClass('btn-sm');
    } else {
        $('.btn').removeClass('btn-sm');
    }
}

function validaSenha(repeteSenha,idSenha){ 
    senha = document.getElementById(idSenha);
    if (repeteSenha.value !== senha.value) {
    repeteSenha.setCustomValidity('Repita a senha corretamente');
  } else {
    repeteSenha.setCustomValidity('');
  }
}

$(document).ready(function(){
    corSelect();
    nomesEstilos();
    ajustaBotao();
   // alteraAlign($(this),'#texto');

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        e.target; // newly activated tab
        e.relatedTarget; // previous active tab
    });

    $(".collapse a[class!='dropdown-toggle']").on('click',function () {
      $('.navbar-collapse').removeClass('in');
    });

    $('#loginModal').on('shown.bs.modal', function () {
      $('#emailLogin').focus();
      $('body').removeAttr('style');
      $('#loginModal').css('padding-right','0');
    });
    
    $('#btn_editor').click(function(){
      $('li.botao_cadastro').removeClass('active');
      $('.navbar-right li').removeClass('active');
    });

    $(".editor input[type='color']").on("change reset", function() {
      corSelect();
    });
    
    $('.editor *[title]').tooltip();
    $('.has-tooltip').tooltip();

    $('.menu-hamburger').click(function(){
      $('#collapseMenu').collapse('toggle');
    });

    $('.navbar-right > li > [id^="botao"]').click(function(){
      $('#collapseMenu').collapse('toggle');
    });
    
    // MODIFICAÇÕES DE ESTILO DO CABEÇALHO
    alteraFonte($('[name="fonte_cabecalho"]'),'#cabecalho');
    $('[name="fonte_cabecalho"]').change(function(){ 
        alteraFonte($(this),'#cabecalho');
    });
    alteraTamFonte($('[name="tam_fonte_cabecalho"]'),'#cabecalho');
    $('[name="tam_fonte_cabecalho"]').change(function(){
        alteraTamFonte($(this),'#cabecalho');
    });
    alteraAlign($('[name="align_cabecalho"]'),'#cabecalho');
    $('[name="align_cabecalho"]').change(function(){
        alteraAlign($(this),'#cabecalho');
    });
    alteraCor($('[name="cor_cabecalho"]'),'#cabecalho');
    $('[name="cor_cabecalho"]').change(function(){
        alteraCor($(this),'#cabecalho');        
    });
    negrito($('[name="b_cabecalho"]'),'#cabecalho');
    $('[name="b_cabecalho"]').click(function(){
        negrito($(this),'#cabecalho');
    });
    italico($('[name="i_cabecalho"]'),'#cabecalho');
    $('[name="i_cabecalho"]').click(function(){
        italico($(this),'#cabecalho');
    });
    sublinhado($('[name="u_cabecalho"]'),'#cabecalho');
    $('[name="u_cabecalho"]').click(function(){
        sublinhado($(this),'#cabecalho');
    });

    // MODIFICAÇÕES DE ESTILO DO TÍTULO
    alteraFonte($('[name="fonte_titulo"]'),'#titulo');
    $('[name="fonte_titulo"]').change(function(){ 
        alteraFonte($(this),'#titulo');
    });
    alteraTamFonte($('[name="tam_fonte_titulo"]'),'#titulo');
    $('[name="tam_fonte_titulo"]').change(function(){
        alteraTamFonte($(this),'#titulo');
    });
    alteraAlign($('[name="align_titulo"]'),'#titulo');
    $('[name="align_titulo"]').change(function(){
        alteraAlign($(this),'#titulo');
    });
    alteraCor($('[name="cor_titulo"]'),'#titulo');
    $('[name="cor_titulo"]').change(function(){
        alteraCor($(this),'#titulo');        
    });
    negrito($('[name="b_titulo"]'),'#titulo');
    $('[name="b_titulo"]').click(function(){
        negrito($(this),'#titulo');
    });
    italico($('[name="i_titulo"]'),'#titulo');
    $('[name="i_titulo"]').click(function(){
        italico($(this),'#titulo');
    });
    sublinhado($('[name="u_titulo"]'),'#titulo');
    $('[name="u_titulo"]').click(function(){
        sublinhado($(this),'#titulo');
    });
    
    // MODIFICAÇÕES DE ESTILO DO TEXTO
    alteraFonte($('[name="fonte_texto"]'),'#texto');
    $('[name="fonte_texto"]').change(function(){ 
        alteraFonte($(this),'#texto');
    });
    alteraTamFonte($('[name="tam_fonte_texto"]'),'#texto');
    $('[name="tam_fonte_texto"]').change(function(){
        alteraTamFonte($(this),'#texto');
    });
    alteraAlign($('[name="align_texto"]'),'#texto');
    $('[name="align_texto"]').change(function(){
        alteraAlign($(this),'#texto');
    });    
    alteraCor($('[name="cor_texto"]'),'#texto');
    $('[name="cor_texto"]').change(function(){
        alteraCor($(this),'#texto');        
    });
    negrito($('[name="b_texto"]'),'#texto');
    $('[name="b_texto"]').click(function(){
        negrito($(this),'#texto');
    });
    italico($('[name="i_texto"]'),'#texto');
    $('[name="i_texto"]').click(function(){
        italico($(this),'#texto');
    });
    sublinhado($('[name="u_texto"]'),'#texto');
    $('[name="u_texto"]').click(function(){
        sublinhado($(this),'#texto');
    });

    
    // MODIFICAÇÕES DE ESTILO DO RODAPÉ
    alteraFonte($('[name="fonte_rodape"]'),'#rodape');
    $('[name="fonte_rodape"]').change(function(){ 
        alteraFonte($(this),'#rodape');
    });
    alteraTamFonte($('[name="tam_fonte_rodape"]'),'#rodape');
    $('[name="tam_fonte_rodape"]').change(function(){
        alteraTamFonte($(this),'#rodape');
    });
    alteraAlign($('[name="align_rodape"]'),'#rodape');
    $('[name="align_rodape"]').change(function(){
        alteraAlign($(this),'#rodape');
    });
    alteraCor($('[name="cor_rodape"]'),'#rodape');
    $('[name="cor_rodape"]').change(function(){
        alteraCor($(this),'#rodape');        
    });
    negrito($('[name="b_rodape"]'),'#rodape');
    $('[name="b_rodape"]').click(function(){
        negrito($(this),'#rodape');
    });
    italico($('[name="i_rodape"]'),'#rodape');
    $('[name="i_rodape"]').click(function(){
        italico($(this),'#rodape');
    });
    sublinhado($('[name="u_rodape"]'),'#rodape');
    $('[name="u_rodape"]').click(function(){
        sublinhado($(this),'#rodape');
    });
    
});


$(window).resize(function(){
    nomesEstilos();
    ajustaBotao();
});