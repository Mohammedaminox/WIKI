CREATE DATABASE wiki;
CREATE TABLE categories (
    category_id int PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL
);
CREATE TABLE tags (
    tag_id int PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255) NOT NULL
);
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','auteur')
);
CREATE TABLE wikis (
    wiki_id int PRIMARY KEY AUTO_INCREMENT,
    wiki_title VARCHAR(255) NOT NULL,
    wiki_content TEXT NOT NULL,
    is_deleted BOOLEAN DEFAULT 0,
    category_id INT,
    user_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE wiki_tags (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);