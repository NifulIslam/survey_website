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
ALTER TABLE questions MODIFY question_id int NOT NULL AUTO_INCREMENT ;
ALTER TABLE responce MODIFY survey_id int NOT NULL AUTO_INCREMENT ;
