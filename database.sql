-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS wifi_management;
USE wifi_management;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    status ENUM('active','blocked') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ZONES TABLE
CREATE TABLE IF NOT EXISTS zones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    latitude DECIMAL(10,6) NOT NULL,
    longitude DECIMAL(10,6) NOT NULL
);

-- WIFI ACCESS POINTS TABLE
CREATE TABLE IF NOT EXISTS access_points (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    zone_id INT,
    latitude DECIMAL(10,6) NOT NULL,
    longitude DECIMAL(10,6) NOT NULL,
    FOREIGN KEY (zone_id) REFERENCES zones(id) ON DELETE CASCADE
);

-- BANDWIDTH LOGS TABLE
CREATE TABLE IF NOT EXISTS bandwidth_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    used_mb INT,
    log_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- SAMPLE ZONES (AUTO LOAD)
INSERT INTO zones (name, latitude, longitude) VALUES
('Library', -1.2490, 29.9890),
('Hostel', -1.2500, 29.9900),
('Admin Block', -1.2485, 29.9885);

-- SAMPLE ACCESS POINTS
INSERT INTO access_points (name, zone_id, latitude, longitude) VALUES
('AP-LIB-01', 1, -1.2491, 29.9891),
('AP-HOST-01', 2, -1.2501, 29.9901),
('AP-ADM-01', 3, -1.2486, 29.9886);
