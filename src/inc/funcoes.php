<?php

function randomString($length = 8)
/*
Gera uma string aleatória com o conprimento dado pelo parâmetro, ou 8 por padrão
Uso: randomString([$length]);

Exemplos: 
$str1 = randomString(); // retorna para a variável $str1 uma string aleatória de 8 caracteres
$str2 = randomString(10); // retorna para a variável $str2 uma string aleatória de 10 caracteres

*/
{
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'),['.','/']);
    $max = count($characters) - 1;
    $str = '';
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    return $str;
}

function optionNum($min,$max,$sel) {
/* 
Cria lista de <option>'s para preencher um <select>
Uso: optionNum(valor_minimo, valor_maximo, valor_selecionado)

Exemplo:	<select title="Titulo" name="select_name">
            	<?php optionNum(1, 5, 3); ?>
            </select>
Gera:
            <select title="Titulo" name="select_name">
            	<option value='1'>1</option>
            	<option value='2'>2</option>
            	<option value='3' selected>3</option>
            	<option value='4'>4</option>
            	<option value='5'>5</option>
            </select>
*/
            
    for ($i = $min; $i <= $max; $i++) {
        echo '<option value="'.$i.'"';
        if ($i == $sel) {
            echo " selected";
        }
        echo ">".$i."</option>
        ";
    }
}


function decodeFromUtf8($string) {
    return mb_convert_encoding($string, "ISO-8859-1", "UTF-8");
//     return utf8_decode($string);
}

function encodeToUtf8($string) {
    return mb_convert_encoding($string, "UTF-8", "ISO-8859-1");
//     return utf8_encode($string);
}

function hex2rgb($hex){
/*
Transforma cor hexadecimal para padrão RGB
Uso: hex2rgb(#[0-f][0-f][0-f][0-f][0-f][0-f])
Exemplo: hex2rgb(#0088cc)
*/

    $hex = str_replace("#", "", $hex);
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
    
    // retorna string "R,G,B"
    // $rgb = $r.",".$g.",".$b; 
    //retorna um array com os valores RGB
    $rgb = array($r, $g, $b);
    return $rgb; 
}