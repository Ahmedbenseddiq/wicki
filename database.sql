CREATE DATABASE wicki ;

USE wicki ;

CREATE TABLE admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100) 
    
);

CREATE TABLE author (
    author_id INT PRIMARY KEY AUTO_INCREMENT,
    author_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100) 
);


CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50),
    creation_date DATE
);

CREATE TABLE tag (
    tag_id INT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(50) 
);

CREATE TABLE article (
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    article_name VARCHAR(50),
    creation_date DATE,
    content TEXT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(category_id),
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES author(author_id)
);


CREATE TABLE article_tag (
    article_id INT,
    FOREIGN KEY (article_id) REFERENCES article(article_id),
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tag(tag_id)
);

