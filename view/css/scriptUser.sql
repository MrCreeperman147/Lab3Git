CREATE TABLE T_User
(
    --PRIMARY KEY
    No INT AUTO_INCREMENT NOT NULL, 

    -- FIELDS
    nom VARCHAR(50) NOT NULL, 
    prenom VARCHAR(50) NOT NULL, 
	email VARCHAR(150) NOT NULL, 
    pw VARCHAR(100) NOT NULL, 
	adr VARCHAR(200) NOT NULL,
	city VARCHAR(50) NOT NULL,
	province VARCHAR(30) NOT NULL,
	tel INT NOT NULL,

	CONSTRAINT PK_User PRIMARY KEY (No)
)DEFAULT CHARSET=utf8;
