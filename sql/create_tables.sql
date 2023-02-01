-- Establish entities of the schema


CREATE TABLE IF NOT EXISTS ADMIN (
    admin_id        INT             NOT NULL auto_increment, 
    username        VARCHAR(50)     NOT NULL,
    password        VARCHAR(50)     NOT NULL,

    PRIMARY KEY(admin_id)
);

CREATE TABLE IF NOT EXISTS USERS (
    user_id         INT             NOT NULL auto_increment,
    username        VARCHAR(50)     NOT NULL,
    password        VARCHAR(50)     NOT NULL, 
    full_name       VARCHAR(100)    NOT NULL, 
    contact_num     INT             NOT NULL,

    PRIMARY KEY(user_id) 
);

CREATE TABLE IF NOT EXISTS CATEGORY (
    category_id     INT             NOT NULL auto_increment, 
    category_name   VARCHAR(100)    NOT NULL,   

    PRIMARY KEY (category_id)
);

CREATE TABLE IF NOT EXISTS NEWS (
    news_id         INT             NOT NULL auto_increment,
    title           VARCHAR(255)    NOT NULL, 
    description     LONGTEXT        NOT NULL,
    date_posted     VARCHAR(100)    NOT NULL,
    -- category_id     INT             NOT NULL, 
    category_name   VARCHAR(100)    NOT NULL, 

    PRIMARY KEY (news_id)

    -- CONSTRAINT NewsCategory_id_FK FOREIGN KEY (category_id) REFERENCES CATEGORY(category_id)
    -- CONSTRAINT NewsCategory_name_FK FOREIGN KEY (category_name) REFERENCES CATEGORY(category_name)
);

CREATE TABLE IF NOT EXISTS REPORTS (
    report_id       INT             NOT NULL auto_increment,
    title           VARCHAR(255)    NOT NULL,
    report_category VARCHAR(100)    NOT NULL, 
    description     LONGTEXT        NOT NULL,
    date_posted     VARCHAR(100)    NOT NULL,
    status          VARCHAR(100)    NOT NULL,
    reported_by     VARCHAR(100)    NOT NULL,
    rep_byContact   INT             NOT NULL,

    PRIMARY KEY (report_id)
);


-- Dump values 
INSERT INTO USERS (username, password, full_name, contact_num) 
	VALUES('username', 'password', 'full_name', 1111111);