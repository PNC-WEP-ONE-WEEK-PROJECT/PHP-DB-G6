create database facebook_g6db;

#1
 create table users (
    id int not null AUTO_INCREMENT primary key,
    name varchar (50) not null,
    gender char (1) not null,
    email varchar (100) not null,
    password int not null,
    locationaddress varchar(150) not null,
    dateofbirth date
);
#2
 create table posts (
    id int not null AUTO_INCREMENT primary key,
    title varchar(150) not null,
    description varchar(220) not null,
    userid int not null
);
#3 
 create table comments (
    id int not null AUTO_INCREMENT primary key,
    description varchar(200) not null,
    userid int not null,
    postid int not null
);
alter table posts add foreign key (userid) references users(id);
alter table comments add foreign key (userid) references users(id);
alter table comments add foreign key(postid) references posts (id);


insert into posts (description,userid) values 
("Hello everyone how are you doing?",36),
("Hello every on in here how are you to day?",36),
("Hello every on in here how are you to day?",36),
("Hello every on in here how are you to day?",36);
















