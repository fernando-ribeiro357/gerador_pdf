<?php require('fpdf/fpdf.php');
define('FPDF_FONTPATH','fpdf/font');
include 'inc/funcoes.php';

session_start();

// Exibe erros
//	ini_set('display_errors',1);
//	ini_set('display_startup_erros',1);
//	error_reporting(E_ALL);

//$_POST = array_map('', $_POST);
//$POST = $_POST;

global $cabecalho;
global $rodape;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['titulo'])) {
		$titulo = "";
	} else {		
		$titulo = $_SESSION['titulo'] = decodeFromUtf8($_POST['titulo']);
	}	
	if (empty($_POST['texto'])) {
     $texto = "";
    } else {     
   	 $texto = $_SESSION['texto'] = decodeFromUtf8($_POST['texto']);    
    }    
}

class PDF extends FPDF
{
    // Page header
    function Header(){
        $cabecalho = $_SESSION['cabecalho'] = decodeFromUtf8($_POST['cabecalho']);       
        //Fonte, tamanho e alinhamento
        $fonte_cab = $_SESSION['fonte_cabecalho'] = $_POST['fonte_cabecalho'];
        $tam_fonte_cab = $_SESSION['tam_fonte_cabecalho'] = $_POST['tam_fonte_cabecalho'];
        $align_cab = $_SESSION['align_cabecalho'] = $_POST['align_cabecalho'];
        
        //cor do cabeçalho
        $_SESSION['cor_cabecalho'] = $_POST['cor_cabecalho'];
        $cor_cab = hex2rgb($_POST['cor_cabecalho']);
        $this->SetTextColor($cor_cab[0],$cor_cab[1],$cor_cab[2]);
        
        // Negrito, itálico e sublinhado
        $b_cab = $i_cab = $u_cab = "";
        if (isset($_POST['b_cabecalho'])){$b_cab = $_SESSION['b_cabecalho'] = $_POST['b_cabecalho'];}
        if (isset($_POST['i_cabecalho'])){$i_cab = $_SESSION['i_cabecalho'] = $_POST['i_cabecalho'];}
        if (isset($_POST['u_cabecalho'])){$u_cab = $_SESSION['u_cabecalho'] = $_POST['u_cabecalho'];}
        $tipo_cab = $b_cab.$i_cab.$u_cab;
        // Fonte do Cabeçalho	
        $this->SetFont($fonte_cab,$tipo_cab,$tam_fonte_cab);
        // Cabeçalho
        $this->Cell(0,6,$cabecalho,0,1,$align_cab);
        // Line break
        $this->Ln();
    }

    // Page footer
    function Footer(){
        $rodape = $_SESSION['rodape'] = decodeFromUtf8($_POST['rodape']);
                
        //Fonte, tamanho e alinhamento
        $fonte_rod = $_SESSION['fonte_rodape'] = $_POST['fonte_rodape'];
        $tam_fonte_rod = $_SESSION['tam_fonte_rodape'] = $_POST['tam_fonte_rodape'];
        $align_rod = $_SESSION['align_rodape'] = $_POST['align_rodape'];
        
        //cor do rodapé
        $_SESSION['cor_rodape'] = $_POST['cor_rodape'];
        $cor_rod = hex2rgb($_POST['cor_rodape']); 
        $this->SetTextColor($cor_rod[0],$cor_rod[1],$cor_rod[2]);
        
        // Negrito, itálico e sublinhado
        $b_rod = $i_rod = $u_rod = "";
        if (isset($_POST['b_rodape'])){$b_rod = $_SESSION['b_rodape'] = $_POST['b_rodape'];}
        if (isset($_POST['i_rodape'])){$i_rod = $_SESSION['i_rodape'] = $_POST['i_rodape'];}
        if (isset($_POST['u_rodape'])){$u_rod = $_SESSION['u_rodape'] = $_POST['u_rodape'];}
        $tipo_rod = $b_rod.$i_rod.$u_rod;
        // Fonte do Rodapé	
        $this->SetFont($fonte_rod,$tipo_rod,$tam_fonte_rod);
        // Rodapé
        if (isset($_POST['pag_rodape']) && $_POST['pag_rodape'] == "P"){
            $_SESSION['pag_rodape'] = $_POST['pag_rodape'];
            $rodape = $rodape.$this->PageNo().'/{nb}';
        }
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Page number
        $this->Cell(0,10,$rodape,0,0,$align_rod);
    }
}

// $arquivo = $titulo.".pdf";
// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetTitle(encodeToUtf8($titulo),1);
$pdf->AliasNbPages();
$pdf->AddPage();

//Título
//Fonte, tamanho e alinhamento
$tam_fonte_tit = $_SESSION['tam_fonte_titulo'] = $_POST['tam_fonte_titulo']; //Tamanho do fonte do TÍTULO
$fonte_tit = $_SESSION['fonte_titulo'] = $_POST['fonte_titulo']; // Fonte do título
$align_tit = $_SESSION['align_titulo'] = $_POST['align_titulo']; // Alinhamento do Título

// Negrito, Itálico e Sublinhado
$b_tit = $i_tit = $u_tit = "";
if (isset($_POST['b_titulo'])){$b_tit = $_SESSION['b_titulo'] = $_POST['b_titulo'];}
if (isset($_POST['i_titulo'])){$i_tit = $_SESSION['i_titulo'] = $_POST['i_titulo'];}
if (isset($_POST['u_titulo'])){$u_tit = $_SESSION['u_titulo'] = $_POST['u_titulo'];}
$tipo_tit = $b_tit.$i_tit.$u_tit;

//cor do título
$_SESSION['cor_titulo'] = $_POST['cor_titulo'];
$cor_tit = hex2rgb($_POST['cor_titulo']); 
$pdf->SetTextColor($cor_tit[0],$cor_tit[1],$cor_tit[2]);
$pdf->SetFont($fonte_tit,$tipo_tit,$tam_fonte_tit);

if ($titulo == "") {
	$arquivo = "documento.pdf";    
} else {
	$arquivo = $titulo.".pdf";
    $pdf->Cell(0,10,$titulo,0,1,$align_tit,0); //Título
    $pdf->Ln();
}

//Texto
//Fonte, tamanho e alinhamento
$tam_fonte_text = $_SESSION['tam_fonte_texto'] = $_POST['tam_fonte_texto']; //Tamanho da fonte
$fonte_text = $_SESSION['fonte_texto'] = $_POST['fonte_texto']; //Fonte do texto
$align_text = $_SESSION['align_texto'] = $_POST['align_texto']; //Alinhamento do texto

// Negrito, Itálico e Sublinhado
$b_text = $i_text = $u_text = "";
if (isset($_POST['b_texto'])){$b_text = $_SESSION['b_texto'] = $_POST['b_texto'];}
if (isset($_POST['i_texto'])){$i_text = $_SESSION['i_texto'] = $_POST['i_texto'];}
if (isset($_POST['u_texto'])){$u_text = $_SESSION['u_texto'] = $_POST['u_texto'];}
$tipo_text = $b_text.$i_text.$u_text;

//cor do texto
$_SESSION['cor_texto'] = $_POST['cor_texto'];
$cor_text = hex2rgb($_POST['cor_texto']); 
$pdf->SetTextColor($cor_text[0],$cor_text[1],$cor_text[2]);
$pdf->SetFont($fonte_text,$tipo_text,$tam_fonte_text);
$pdf->MultiCell(0,8,$texto,0,$align_text,0);
//ob_clean();
//ob_start();
$pdf->Output($arquivo,'I');
?>