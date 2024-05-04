<?php
// Conecte-se ao banco de dados
$mysqli = new mysqli('localhost', 'usuario', 'senha', 'banco_de_dados');

// Verifique a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Pegue os dados do jogador
$pontuacao = $_POST['pontuacao'];
$nome = $_POST['nome'];

// Atualize a tabela
$sql = "INSERT INTO tabela_jogo (nome, pontuacao) VALUES ('$nome', '$pontuacao')";

if ($mysqli->query($sql) === TRUE) {
    echo "Registro inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
