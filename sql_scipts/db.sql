-- CREATE TABLES

-- Person table
DROP TABLE IF EXISTS person;
CREATE TABLE person(  
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255)
);

-- Worktime table
DROP TABLE IF EXISTS worktime;
CREATE TABLE worktime(  
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    start_time DATETIME,
    end_time DATETIME,
    person_id INT FOREIGN KEY REFERENCES person(ID),
    task_description TEXT
);