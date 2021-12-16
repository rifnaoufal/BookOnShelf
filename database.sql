create table books
(
    id int auto_increment
        primary key,
    title varchar(100) not null,
    author varchar(100) not null
);

create table users
(
    id int auto_increment
        primary key,
    email varchar(250) not null,
    password varchar(250) not null,
    constraint users_email_uindex
        unique (email)
);

