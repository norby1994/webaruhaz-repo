CREATE TABLE KACRABT.FELHASZNALO
(
  EMAIL VARCHAR2(50) 
  , JELSZO VARCHAR2(100)
  , FELHASZNALO_NEV VARCHAR2(40)
  , SZUL_IDO DATE
  , NEM NUMBER check (NEM in('0','1'))
  , TELEFON NUMBER(11) NOT NULL
  , EGYENLEG NUMBER(6) NOT NULL
  , REG_DATUM TIMESTAMP
  , TORZSVASARLO CHAR check (TORZSVASARLO in('Y','N'))

  , CONSTRAINT FELHASZNALO_PK PRIMARY KEY
    (
      EMAIL
    )
    ENABLE
  );