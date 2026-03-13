CREATE DATABASE IF NOT EXISTS  challenge_books;
use challenge_books;
create table library_books (
id int auto_increment  primary key ,
title varchar(150) not null ,
author varchar(100), 
published_year year ,
etat enum ( 'Available' , 'Borrowed' , 'Lost' ),
price decimal(10,2) );
