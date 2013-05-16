/* attributum_id auto_increment */

CREATE SEQUENCE attributum_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER attributum_auto_increment
BEFORE INSERT ON attributum
FOR EACH ROW
BEGIN
	:NEW.attributum_id := attributum_seq.NEXTVAL;
END;
/


/* cimke_id auto_increment */

CREATE SEQUENCE cimke_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER cimke_auto_increment
BEFORE INSERT ON cimke
FOR EACH ROW
BEGIN
	:NEW.cimke_id := cimke_seq.NEXTVAL;
END;
/

/* kategoria_id auto_increment */

CREATE SEQUENCE kategoria_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER kategoria_auto_increment
BEFORE INSERT ON kategoria
FOR EACH ROW
BEGIN
	:NEW.kategoria_id := kategoria_seq.NEXTVAL;
END;
/

/* rendeles_id auto_increment */

CREATE SEQUENCE rendeles_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER rendeles_auto_increment
BEFORE INSERT ON rendeles
FOR EACH ROW
BEGIN
	:NEW.rendeles_id := rendeles_seq.NEXTVAL;
END;
/

/* termek_id auto_increment */

CREATE SEQUENCE termek_seq
START WITH 1
INCREMENT BY 1
NOMAXVALUE;

CREATE OR REPLACE TRIGGER termek_auto_increment
BEFORE INSERT ON termek
FOR EACH ROW
BEGIN
	:NEW.termek_id := termek_seq.NEXTVAL;
END;
/