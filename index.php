<?php
header ('Location: controllers/user_controller.php');
//header(): es una funcion de php que se usa para enviar encabezados HTTP
//sin procesar al navegador (instrucciones se envian al navegador antes cualquier
//otro tipo como HTML y demas)  
//Se usa generalmente para redirecciones Ej. Location:
//Importante: Evita que el usuario recargue la página y reenvíe datos 
//accidentalmente (problema de *F5/Post-Redirect-Get*).
//Location: es un encabecado http que indica al navegador que debe CARGAR LA PAGINA
//Location: y ruta: esta en comillas por que no es codigo sino cadena de texto
?>