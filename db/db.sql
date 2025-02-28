CREATE DATABASE admusrmain;
USE admusrmain;

create table users (
    id int NOT NULL AUTO_INCREMENT,
    fullname varchar(255),
    email varchar(255) NOT NULL UNIQUE,
    password_hash varchar(255),
    active ENUM('0','1') NOT NULL,
    CONSTRAINT pk_user PRIMARY KEY (id)
);

create table addresses (
    id int NOT NULL AUTO_INCREMENT,
    zipcode varchar(9),
    state varchar(255),
    city varchar(255),
    street varchar(255),
    number varchar(255),
    user_id int NOT NULL,
    CONSTRAINT pk_addresses PRIMARY KEY (id),
    CONSTRAINT fk_user_addresses FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
