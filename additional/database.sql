create database wiki;
use wiki;
create table wikis(
    wiki_id int primary KEY AUTO_INCREMENT,
    titre varchar(255),
    contenu text,
    image longblob,
    wiki_date datetime
    );

create table users(
    user_id int primary key AUTO_INCREMENT,
    nom varchar(255),
    prenom varchar(255),
    email varchar(255),
    pass varchar(255),
    role varchar(255),
    image longblob
    );
create table categories(
    cat_id int primary key AUTO_INCREMENT,
    cat_name varchar(255)
    );
create table tags(
    tag_id int primary key AUTO_INCREMENT,
    tag_name varchar(255)
);

ALTER TABLE wikis ADD COLUMN user_id INT,ADD FOREIGN KEY (user_id) REFERENCES users(user_id);


ALTER TABLE wikis ADD COLUMN cat_id INT,ADD FOREIGN KEY (cat_id) REFERENCES categories(cat_id);


CREATE TABLE wiki_tags (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);
alter table wikis add column status int DEFAULT 0;
INSERT INTO categories (cat_name) 
    VALUES 
        ('Arts and Entertainment'),
        ('Science and Technology'),
        ('Geography and Travel'),
        ('History'),
        ('Education and Learning');

alter table users modify column role varchar(50) DEFAULT 'auteur';

    
