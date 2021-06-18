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

CREATE TABLE IF NOT EXISTS admin(
	id INT ,
    PASSWORD_ VARCHAR(255) NOT NULL,
    CONSTRAINT admin_pk PRIMARY KEY (id)

);

CREATE TABLE IF NOT EXISTS questions(
	question_id INT DEFAULT 0,
    researcher_id INT NOT NULL ,
    ismcq INT DEFAULT 0 NOT NULL,
    to_reach INT NOT NULL,
    question VARCHAR(500) NOT NULL,
    resp_age INT,
    resp_gender VARCHAR(6),
    resp_social_statuc VARCHAR(6),
    resp_nationality VARCHAR(30),
    
     CONSTRAINT q_fk_researcher FOREIGN KEY(researcher_id) 
        REFERENCES researcher(researcher_id),
    CONSTRAINT q_pk PRIMARY KEY(question_id )


);
CREATE TABLE IF NOT EXISTS responce(
    respondent_id INT,    
	survey_id INT,
    question_id INT ,
    answer VARCHAR(1000)NOT NULL,
    nutral_ans INT DEFAULT 0 NOT NULL,
    garbage_ans INT DEFAULT 0 NOT NULL,
    respnceDate DATE NOT NULL DEFAULT  CURDATE(),
    CONSTRAINT pk_srv  PRIMARY KEY (survey_id),
	CONSTRAINT resp_fk_ques FOREIGN KEY (question_id)
    	REFERENCES questions(question_id),
    CONSTRAINT resp_fk_respondent FOREIGN KEY (respondent_id)
    	REFERENCES respondent(n_id)
    

);