CREATE TABLE KACRABT.RENDELES
(
  RENDELES_ID NUMBER(5)
, EMAIL VARCHAR2(50)
, IDOPONT DATE
, OSSZ_AR NUMBER(6) NOT NULL
, CONSTRAINT RENDELES_PK PRIMARY KEY
  (
    RENDELES_ID
  )
  ENABLE
);
ALTER TABLE KACRABT.RENDELES
ADD CONSTRAINT EMAIL_FK FOREIGN KEY
(
  EMAIL
)
REFERENCES KACRABT.FELHASZNALO
(
  EMAIL
)
ON DELETE CASCADE ENABLE;