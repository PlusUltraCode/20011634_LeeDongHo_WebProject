<h1> Web Project 2024-06-08</h1>

<h2>20011634 Lee Dong Ho</h2>


<h3> Very Very Important </h3>

<h1> You First make database !!!</h1>

CREATE DATABASE IF NOT EXISTS fitness_db;

USE fitness_db;

CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS workouts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    likes INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    workout_id INT,
    content TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (workout_id) REFERENCES workouts(id)
);

INSERT IGNORE INTO workouts (title, description, likes) VALUES ('1', 'bench press', 0);
INSERT IGNORE INTO workouts (title, description, likes) VALUES ('2', 'squat exercise', 0);
INSERT IGNORE INTO workouts (title, description, likes) VALUES ('3', 'deadlift exercise', 0);


<h3>And then you will be show fitness Web Page</h3>


