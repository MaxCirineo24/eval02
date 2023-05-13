<?php
function Conectar(){
    $xc = mysqli_connect("localhost","root","","Eval02");
    return $xc;
    die();
}

function Desconectar($xc){
    mysqli_close($xc);
}
?>