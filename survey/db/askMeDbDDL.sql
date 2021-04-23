CREATE DATABASE IF NOT EXISTS ask_me_db;
CREATE TABLE respondent(
    n_id INT,
    name VARCHAR(255) NOT NULL,
    PASSWORD_ VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(6) NOT NULL,
    social_status VARCHAR(6) NOT NULL,
	nationality VARCHAR(30) NOT NULL,
    nutral_count INT NOT NULL DEFAULT 0,
    garbage_count INT NOT NULL DEFAULT 0,
    balance INT NOT NULL DEFAULT 0,
    CONSTRAINT pk_resp  PRIMARY KEY (n_id)

);

CREATE TABLE IF NOT EXISTS researcher(
    researcher_id INT,
    name VARCHAR(255) NOT NULL,
    PASSWORD_ VARCHAR(255) NOT NULL,
    company VARCHAR(255) ,
    email VARCHAR(255),
    balance INT NOT NULL DEFAULT 0,
    CONSTRAINT pk_resp  PRIMARY KEY (researcher_id)

);
CREATE TABLE IF NOT EXISTS survey(
    respondent_id INT NOT NULL,    
    researcher_id INT NOT NULL,
	survey_id INT,
    question VARCHAR(500) NOT NULL,
    answer VARCHAR(1000)NOT NULL,
    nutral_ans INT DEFAULT 0 NOT NULL,
    garbage_ans INT DEFAULT 0 NOT NULL,
    is_mcq INT DEFAULT 0 NOT NULL,
    respnceDate DATE NOT NULL DEFAULT  CURDATE(),
    CONSTRAINT pk_srv  PRIMARY KEY (survey_id),
    CONSTRAINT fk_researcher FOREIGN KEY(researcher_id) 
            REFERENCES researcher(researcher_id),
    CONSTRAINT fk_respondent FOREIGN KEY(respondent_id) 
            REFERENCES respondent(n_id)

);
CREATE TABLE IF NOT EXISTS admin(
	id INT ,
    PASSWORD_ VARCHAR(255) NOT NULL,
    CONSTRAINT admin_pk PRIMARY KEY (id)

);