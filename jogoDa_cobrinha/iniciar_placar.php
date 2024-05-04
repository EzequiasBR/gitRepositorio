<?php
include 'gestor.php';

$gestor = new Gestor();

$melhores_jogadores = $gestor->EXE_QUERY("SELECT * FROM jogadores");

echo json_encode($melhores_jogadores);
