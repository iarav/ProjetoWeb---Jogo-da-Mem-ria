<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $DBName = "JogoMemoria";
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$DBName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlTableUser = "CREATE TABLE IF NOT EXISTS Usuario(
            id int not null AUTO_INCREMENT, 
            username char(20) not null,
            nome_completo varchar(100) not null,
            data_nascimento date not null,
            cpf char(14) not null,
            telefone char(14) not null, 
            email varchar(50) not null,
            senha varchar(30) not null,
            primary key(id),
            unique(username)
        )";
        $sqlTablePart = "CREATE TABLE IF NOT EXISTS PartidaJogo(
            id int not null AUTO_INCREMENT,
            id_jogador int not null,
            dimensao char(3) not null,
            modalidade char(20) not null,
            tempo_partida time not null,
            resultado char(15) not null,
            horario_partida time not null,
            primary key(id),
            foreign key(id_jogador) references Usuario(id)
        )";

        $conn->exec($sqlTableUser);
        $conn->exec($sqlTablePart);

        echo '<p>Tabelas Usuario e PartidaJogo criadas com sucesso!</p>';

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>