<?php
/*
   $titulo de la página etiqueta <title> en <head>
   $estilo nombre de la hoja de estilo, fichero css
   $tituloCSS nombre del estilo css
   $textoh1 texto a incluir dentro de la etiqueta <h1> al comienzo de la página
*/
function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
{
  print "<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <title>$titulo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href='$estilo' rel='stylesheet' type='text/css' title='$tituloCSS' />
  </head>
  <body>
    <h1>$textoh1</h1>\n";
}
?>
