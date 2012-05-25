CREATE DATABASE mvc_mailform DEFAULT CHARACTER SET utf8;
USE mvc_mailform;
CREATE TABLE messages (
    id      INT PRIMARY KEY AUTO_INCREMENT,
    name    VARCHAR(255) NOT NULL,
    gender  CHAR(1) NOT NULL,
    zip     CHAR(8) NOT NULL,
    message TEXT NOT NULL,
    updated TIMESTAMP NOT NULL,
    created TIMESTAMP NOT NULL
);

