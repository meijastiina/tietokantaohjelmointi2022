CREATE TABLE work_time(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    starttime DATETIME,
    endtime DATETIME,
    person_id int,
    CONSTRAINT `fk_person`
    FOREIGN KEY (person_id) REFERENCES person(id)
);
