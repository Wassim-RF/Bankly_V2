CREATE TABLE IF NOT EXISTS utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(32) UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(8)
);

--@block
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(32) UNIQUE,
    email VARCHAR(50) UNIQUE,
    phone_number VARCHAR(10) UNIQUE,
    creation_date DATE,
    adresse VARCHAR(100),
    cin VARCHAR(10) UNIQUE,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
);

--@block
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_number INT(14) UNIQUE,
    account_type ENUM('Checking' , 'Savings' , 'Business'),
    solde DECIMAL(12,2),
    account_statue ENUM('Actif' , 'Inactif' , 'Blocked'),
    creation_date DATE,
    utilisateur_id INT,
    client_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id),
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

--@block
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_type ENUM('Credit' , 'Debit'),
    amout DECIMAL(12,2),
    transaction_date DATE,
    account_id INT,
    FOREIGN KEY (account_id) REFERENCES accounts(id)
);