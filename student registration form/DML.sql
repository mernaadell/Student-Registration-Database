show databases;
use student;
CREATE TABLE if not exists Department (
    dept_id int,
    name varchar(255),
    Description varchar(255),
    PRIMARY KEY (dept_id)
    
);
CREATE TABLE if not exists user (
    user_id int auto_increment,
    email varchar(255) unique not null,
    password varchar(255) not null,
    registration_date timestamp default current_timestamp,
    department_id int,
    username varchar(255) unique not null,
    PRIMARY KEY (user_id),
    FOREIGN KEY (department_id) REFERENCES Department(dept_id)
);
CREATE TABLE if not exists Course (
    course_id int,
    course_name varchar(255),
    course_description varchar(255),
    instructor_name varchar(255),
    credit_hours    varchar(255),
    department_id int,
    PRIMARY KEY (course_id),
    foreign key(department_id) references Department(dept_id)
);
select course_id from Course;
INSERT INTO department (dept_id,name,Description)
 VALUES (1,"compu","Faculty of Engineering");
INSERT INTO department (dept_id,name,Description)
 VALUES (2,"communication","Faculty of Engineering");
INSERT INTO department (dept_id,name,Description)
 VALUES (3,"civil","Faculty of Engineering");
INSERT INTO department (dept_id,name,Description)
 VALUES (4,"electrical","Faculty of Engineering");
INSERT INTO department (dept_id,name,Description)
 VALUES (5,"computer system","Faculty of Engineering");
INSERT INTO course (course_description,course_id,course_name,credit_hours,department_id,instructor_name)
 VALUES ("math","100","math1",3,1,"Hassan");
INSERT INTO course (course_description,course_id,course_name,credit_hours,department_id,instructor_name)
 VALUES ("programming0","101","programming",3,1,"Merna");
INSERT INTO course (course_description,course_id,course_name,credit_hours,department_id,instructor_name)
 VALUES ("programming1","102","programming",3,1,"Merna");
INSERT INTO course (course_description,course_id,course_name,credit_hours,department_id,instructor_name)
 VALUES ("digital","105","communication",3,2,"Alaa");
