/* database name is social_media */

CREATE TABLE PROFILE (
    pname VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    contact VARCHAR(10),
    city VARCHAR(255),
    statename VARCHAR(255),
    country VARCHAR(255),
    education VARCHAR(255),
    skills VARCHAR(255),
    interests VARCHAR(255),
    pword VARCHAR(32),
    rating INT,
    PRIMARY KEY(username, email)
);

CREATE TABLE RATING (
    username_1 VARCHAR(255),
    username_2 VARCHAR(255),
    PRIMARY KEY(username_1, username_2),
    FOREIGN KEY (username_1) REFERENCES PROFILE(username),
    FOREIGN KEY (username_2) REFERENCES PROFILE(username)
);