<?php
require 'bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS task (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        description VARCHAR(100) NOT NULL,
        status BOOLEAN NOT NULL,
        PRIMARY KEY (id)
    );
    CREATE TABLE IF NOT EXISTS admin (
        id INT NOT NULL AUTO_INCREMENT,
        login VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
    );
    
    INSERT INTO admin
        (id, login, password)
    VALUES
        (1, 'admin', '123'),
        (2, '1', '1');
EOS;

try {
    $createTable = $dbConnection->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}