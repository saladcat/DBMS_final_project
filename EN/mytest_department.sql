CREATE TABLE mytest.department
(
    id int(20) PRIMARY KEY NOT NULL,
    name varchar(20) NOT NULL,
    class varchar(20) NOT NULL,
    grade varchar(20) NOT NULL
);
CREATE UNIQUE INDEX department_id_uindex ON mytest.department (id);
INSERT INTO mytest.department (id, name, class, grade) VALUES (1, 'cs', 'cs1', '1');
INSERT INTO mytest.department (id, name, class, grade) VALUES (2, 'ee', 'ee1', '1');
INSERT INTO mytest.department (id, name, class, grade) VALUES (3, 'eecs', 'eecs', '1');
CREATE TABLE mytest.event
(
    id int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    team_limit int(20) NOT NULL,
    max_team_members int(20) NOT NULL,
    min_team_members int(20) NOT NULL,
    year int(4) NOT NULL,
    comment varchar(50),
    is_delete tinyint(1) DEFAULT '0'
);
CREATE UNIQUE INDEX event_id_uindex ON mytest.event (id);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (1, 'Q2', 9999, 9999, 0, 2018, 'æ— ', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (2, 'footballaa', 3, 3, 1, 2016, 'aaaa', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (3, 'pingpangss', 3, 3, 1, 2015, 'sssss', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (4, '123', 1, 1, 1, 2, 'sad', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (5, 'AA', 2, 5, 3, 1, '4', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (6, 'AA', 2, 5, 3, 1, '4', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (7, 'QQ', 2, 4, 3, 1, '5', 1);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (8, 'Q', 2, 4, 3, 1, 'sjkaldlkasjskdl', 0);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (9, 'empty', 9999, 9999, 0, 2018, 'æ— ', 0);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (10, 'QQ', 115, 88, 123, 123, 'XXX', 0);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (11, 'qq', 123, 123123, 123, 123, '123', 0);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (12, 'ss', 2, 4, 3, 1, '5', 0);
INSERT INTO mytest.event (id, name, team_limit, max_team_members, min_team_members, year, comment, is_delete) VALUES (13, 'A', 5, 9, 78, 12, '8', 0);
CREATE TABLE mytest.`match`
(
    id int(20) PRIMARY KEY NOT NULL,
    event_id int(20) NOT NULL,
    team_id int(20) NOT NULL,
    match_order int(20) NOT NULL,
    score int(20) NOT NULL,
    is_valid int(1) NOT NULL,
    datetime datetime(6) NOT NULL
);
CREATE UNIQUE INDEX match_event_id_uindex ON mytest.`match` (id);
CREATE INDEX match_event_event_id_fk ON mytest.`match` (event_id);
CREATE INDEX match_event_team_team_id_fk ON mytest.`match` (team_id);
INSERT INTO mytest.`match` (id, event_id, team_id, match_order, score, is_valid, datetime) VALUES (1, 1, 1, 1, 40, 1, '2018-04-13 06:06:55.546000');
INSERT INTO mytest.`match` (id, event_id, team_id, match_order, score, is_valid, datetime) VALUES (2, 2, 2, 2, 50, 1, '2018-04-13 07:02:29.414000');
INSERT INTO mytest.`match` (id, event_id, team_id, match_order, score, is_valid, datetime) VALUES (3, 3, 3, 3, 60, 1, '2018-04-13 07:02:43.212000');
CREATE TABLE mytest.registration
(
    id int(20) PRIMARY KEY NOT NULL,
    event_id int(20) NOT NULL,
    team_id int(20) NOT NULL,
    time datetime(6) NOT NULL
);
CREATE UNIQUE INDEX registration_id_uindex ON mytest.registration (id);
CREATE INDEX registration_event_id_fk ON mytest.registration (event_id);
CREATE INDEX registration_team_team_id_fk ON mytest.registration (team_id);
INSERT INTO mytest.registration (id, event_id, team_id, time) VALUES (1, 1, 1, '2018-04-13 07:03:33.844000');
INSERT INTO mytest.registration (id, event_id, team_id, time) VALUES (2, 2, 2, '2018-04-13 07:03:42.767000');
INSERT INTO mytest.registration (id, event_id, team_id, time) VALUES (3, 3, 3, '2018-04-13 07:03:50.289000');
CREATE TABLE mytest.team
(
    team_id int(20) NOT NULL,
    user_id int(20) NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (team_id, user_id)
);
INSERT INTO mytest.team (team_id, user_id) VALUES (1, 3223);
INSERT INTO mytest.team (team_id, user_id) VALUES (1, 640143);
INSERT INTO mytest.team (team_id, user_id) VALUES (2, 123);
INSERT INTO mytest.team (team_id, user_id) VALUES (3, 321);
CREATE TABLE mytest.team_name
(
    team_id int(20) PRIMARY KEY NOT NULL,
    team_name varchar(20)
);
INSERT INTO mytest.team_name (team_id, team_name) VALUES (1, 'cn1');
INSERT INTO mytest.team_name (team_id, team_name) VALUES (2, 'cn2');
INSERT INTO mytest.team_name (team_id, team_name) VALUES (3, 'cn3');
CREATE TABLE mytest.user
(
    user_id int(20) PRIMARY KEY NOT NULL,
    user_name varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    department_id varchar(20) NOT NULL,
    gender int(1) NOT NULL,
    phone_number varchar(20) NOT NULL,
    password int(11) NOT NULL
);
CREATE UNIQUE INDEX user_user_id_uindex ON mytest.user (user_id);
CREATE INDEX user_department_id_fk ON mytest.user (department_id);
INSERT INTO mytest.user (user_id, user_name, email, department_id, gender, phone_number, password) VALUES (640143, 'zsy', 'djytyang@gmail.com', '1', 1, '13072339523', 0);
INSERT INTO mytest.user (user_id, user_name, email, department_id, gender, phone_number, password) VALUES (123, 'ysz', 'dsjak@gmail.com', '2', 0, '321312', 0);
INSERT INTO mytest.user (user_id, user_name, email, department_id, gender, phone_number, password) VALUES (321, 'jdk', 'djsaj@gmail.com', '3', 1, '23421', 0);
INSERT INTO mytest.user (user_id, user_name, email, department_id, gender, phone_number, password) VALUES (3223, 'dsa', 'ds', 'dsad', 1, '123', 123);