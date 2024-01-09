CREATE DATABASE wicki ;

USE wicki ;

CREATE TABLE admin (
    admin_id INT PRIMARY KEY,
    admin_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100) ,
    
);

CREATE TABLE author (
    author_id INT PRIMARY KEY,
    author_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100) ,
);


CREATE TABLE category (
    category_id INT PRIMARY KEY,
    category_name VARCHAR(50),
    creation_date DATE
);

CREATE TABLE tag (
    tag_name VARCHAR(50) PRIMARY KEY
);

CREATE TABLE article (
    article_id INT PRIMARY KEY,
    article_name VARCHAR(50),
    creation_date DATE,
    content TEXT,*
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(category_id),
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES author(author_id)
);


CREATE TABLE article_tag (
    article_id INT,
    FOREIGN KEY (article_id) REFERENCES article(article_id),
    tag_name VARCHAR(50),
    FOREIGN KEY (tag_name) REFERENCES tag(tag_name)
);

