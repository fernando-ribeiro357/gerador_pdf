<?php 
$post = array_map("htmlspecialchars", $_POST);
extract($post);
echo "<hr>";
echo "Nome: {$nomeCadastro}<br />";
echo "Login: {$loginCadastro}<br />";
echo "E-mail: {$emailCadastro}<br />";
