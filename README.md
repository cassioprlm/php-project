# php-project


**É necessário criar a tabela usuarios e a tabela pacientes no mariadb:**

- Criação da Database(phpweb) e a tabela Usuarios
    ```
    CREATE DATABASE phpweb;
        USE phpweb;
       CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
       senha VARCHAR(255) NOT NULL
       );
    ```    
- Pacientes
  ```
  CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INT,
    peso DECIMAL(7, 2),
    altura DECIMAL(5, 2),
    email VARCHAR(255) NOT NULL,
    imc DECIMAL(7,2)
  );
  ```
