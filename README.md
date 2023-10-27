# php-project

- É necessário criar a tabela usuarios e a tabela pacientes:

  ```
  CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INT,
    peso DECIMAL(7, 2),
    altura DECIMAL(5, 2),
    email VARCHAR(255) NOT NULL,
    imc DECIMAL(7,2);
);



  ```
