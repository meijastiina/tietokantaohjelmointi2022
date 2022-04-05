-- CREATE TABLES

-- Person table
DROP TABLE IF EXISTS person;
CREATE TABLE person(  
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(150),
    lastname VARCHAR(150),
    username VARCHAR(150) UNIQUE,
    password VARCHAR(150)
);

-- Worktime table
DROP TABLE IF EXISTS worktime;
CREATE TABLE worktime(  
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    start_time DATETIME,
    end_time DATETIME,
    task_description TEXT,
    person_id INT NOT NULL,
    
    CONSTRAINT `fk_person`
    FOREIGN KEY (person_id) REFERENCES person(id)
);