<?php
// informações do banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ames';

// iniciando a conexão com o bd
$pdo = new pdo("mysql:host=$host;dbname=$dbname", $username, $password);

// dados para serem inseridos
$username = 'victor';
$grupo = 2;
$id_comunidade = 3;

// sentença sql
$sql_insert = 'INSERT INTO users (username,grupo,id_comunidade) VALUES (?,?,?);';

// preparando os dados para serem inseridos
$statement = $pdo -> prepare($sql_insert);
$statement -> bindValue(1, $username); // 1 é a coluna na tabela e o valor a ser inserido (?)
$statement -> bindValue(2, $grupo);
$statement -> bindValue(3, $id_comunidade);

/* --- pode-se usar da forma abaixo também, por paramentros nomeados
$sql_insert = 'INSERT INTO users (username,grupo,id_comunidade) VALUES (:name,:grupo,:comunidade);';

$statement = $pdo -> prepare($sql_insert);
$statement -> bindValue(:name, $username); 
$statement -> bindValue(:grupo, $grupo);
$statement -> bindValue(:comunidade, $id_comunidade);
*/

if ($statement->execute()) {
     echo "Usuário inserido com sucesso!";
} else {
     echo "Erro ao inserir usuário.";
}