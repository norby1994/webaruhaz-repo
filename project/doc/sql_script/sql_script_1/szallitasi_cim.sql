CREATE TABLE KACRABT.SZALLITASI_CIM
(
  RENDELES_ID NUMBER(5)
, IR_SZAM NUMBER(4) NOT NULL
, VAROS VARCHAR2(30)
, UTCA VARCHAR2(20)
, HAZSZAM NUMBER(3) NOT NULL
, CONSTRAINT RENDELES_SZALL_PK PRIMARY KEY
  (
    RENDELES_ID
  )
  ENABLE
);
ALTER TABLE KACRABT.SZALLITASI_CIM
ADD CONSTRAINT RENDELES_ID FOREIGN KEY
(
  RENDELES_ID
)
REFERENCES KACRABT.RENDELES
(
  RENDELES_ID
)
ON DELETE CASCADE ENABLE;