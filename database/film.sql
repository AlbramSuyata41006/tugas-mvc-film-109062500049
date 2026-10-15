CREATE DATABASE IF NOT EXISTS db_film
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE db_film;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_film VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    tahun_rilis INT NOT NULL,
    durasi INT NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO film (kode_film, judul, sutradara, genre, tahun_rilis, durasi, rating) VALUES
('FLM-001', 'The Shawshank Redemption', 'Frank Darabont', 'Drama', 1994, 142, 9.3),
('FLM-002', 'The Dark Knight', 'Christopher Nolan', 'Action, Crime, Drama', 2008, 152, 9.0),
('FLM-003', 'Pulp Fiction', 'Quentin Tarantino', 'Crime, Drama', 1994, 154, 8.9),
('FLM-004', 'Fight Club', 'David Fincher', 'Drama', 1999, 139, 8.8),
('FLM-005', 'The Truman Show', 'Peter Weir', 'Comedy, Drama, Sci-Fi', 1998, 103, 8.2);