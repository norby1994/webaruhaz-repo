/*NetShop internetes �ruh�z - adatb�zis l�trehoz�s 
  Csapattagok: 
	Vereb�lyi Csaba
	Vereb�lyi Bertalan
	Kasziba Cintia
  K�sz�tette:
	Kasziba Cintia*/

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
  
  CREATE TABLE KACRABT.ADMIN
(
  EMAIL VARCHAR2(50) 
  , JELSZO VARCHAR2(100)
  , ADMIN_NEV VARCHAR2(40)
  , SZUL_IDO DATE
  , NEM NUMBER check (NEM in('0','1'))
  , TELEFON NUMBER(11) NOT NULL
  , REG_DATUM TIMESTAMP
  , CONSTRAINT ADMIN_PK PRIMARY KEY
    (
      EMAIL
    )
    ENABLE
  );
  
  
  CREATE TABLE KACRABT.LAKCIM
(
  EMAIL VARCHAR2(50) 
  , IR_SZAM NUMBER(4) NOT NULL
  , VAROS VARCHAR2(30)
  , UTCA VARCHAR2(20)
  , HAZSZAM NUMBER(3) NOT NULL
  , CONSTRAINT LAKCIM_PK PRIMARY KEY
    (
      EMAIL
    )
    ENABLE
  );
  ALTER TABLE KACRABT.LAKCIM
  ADD CONSTRAINT EMAIL FOREIGN KEY
  (
    EMAIL
  )
  REFERENCES KACRABT.FELHASZNALO
  (
    EMAIL
  )
  ON DELETE CASCADE ENABLE;
  
 CREATE TABLE KACRABT.ATTRIBUTUM
(
  ATTRIBUTUM_ID NUMBER(5)
, ATTRIBUTUM_NEV VARCHAR2(20)
, ATTRIBUTUM_TIPUS VARCHAR2(10)
, CONSTRAINT ATTRIBUTUM_PK PRIMARY KEY
  (
    ATTRIBUTUM_ID
  )
  ENABLE
);


CREATE TABLE KACRABT.ATTRIBUTUM_ERTEK
(
  ATTRIBUTUM_ID NUMBER(5)
, ERTEK VARCHAR2(20)
, CONSTRAINT ATTRIBUTUM_ERTEK_PK PRIMARY KEY
  (
  ATTRIBUTUM_ID
  , ERTEK
  )
  ENABLE
);

ALTER TABLE KACRABT.ATTRIBUTUM_ERTEK
ADD CONSTRAINT ATTRIBUTUM_ERTEK FOREIGN KEY
(
  ATTRIBUTUM_ID
)
REFERENCES KACRABT.ATTRIBUTUM
(
  ATTRIBUTUM_ID
)
ON DELETE CASCADE ENABLE;


CREATE TABLE KACRABT.CIMKE
(
  CIMKE_ID NUMBER(5)
, CIMKE_NEV VARCHAR2(20)
, CONSTRAINT CIMKE_PK PRIMARY KEY
  (
    CIMKE_ID
  )
  ENABLE
);

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


CREATE TABLE KACRABT.KATEGORIA
(
  KATEGORIA_ID NUMBER(5)
, KATEGORIA_NEV VARCHAR2(20)
, ATTRIBUTUM_ID NUMBER(5) NOT NULL
, CONSTRAINT KATEGORIA_PK PRIMARY KEY
  (
    KATEGORIA_ID
  )
, CONSTRAINT KATEGORIA_FK FOREIGN KEY
(
	ATTRIBUTUM_ID
)
REFERENCES KACRABT.ATTRIBUTUM
(
	ATTRIBUTUM_ID
)
);




CREATE TABLE KACRABT.TERMEK
(
  TERMEK_ID NUMBER(5)
, KATEGORIA_ID NUMBER(5) NOT NULL
, TERMEK_NEV VARCHAR2(40)
, ROVID_LEIRAS VARCHAR(100)
, HOSSZU_LEIRAS VARCHAR(400)
, AR NUMBER(6) NOT NULL
, DARAB_SZAM NUMBER(3) NOT NULL
, CIMKE_ID NUMBER(5) NOT NULL
, CONSTRAINT TERMEK_ID_PK PRIMARY KEY
  (
  TERMEK_ID
  )
, CONSTRAINT CIMKE_ID_FK FOREIGN KEY
(
	CIMKE_ID
)
REFERENCES KACRABT.CIMKE
(
	CIMKE_ID
)
);

ALTER TABLE KACRABT.TERMEK
ADD CONSTRAINT KATEGORIA_ID FOREIGN KEY
(
  KATEGORIA_ID
)
REFERENCES KACRABT.KATEGORIA
(
  KATEGORIA_ID
)
ON DELETE CASCADE ENABLE;



CREATE TABLE KACRABT.RENDELES_RESZLETEI
(
  RENDELES_ID NUMBER(5)
, TERMEK_ID NUMBER(5)
, ATTRIBUTUMOK VARCHAR2(500)
, DARAB_SZAM NUMBER(3) NOT NULL
, TERMEK_AR NUMBER(6) NOT NULL
, CONSTRAINT RENDELES_RESZLETEI_PK PRIMARY KEY
  (
    RENDELES_ID
  , TERMEK_ID
  )
, CONSTRAINT TERMEK_ID_FK FOREIGN KEY
(
	TERMEK_ID
)
REFERENCES KACRABT.TERMEK
(
	TERMEK_ID
)
);


ALTER TABLE KACRABT.RENDELES_RESZLETEI
ADD CONSTRAINT RENDELES_RESZ_ID FOREIGN KEY
(
  RENDELES_ID
)
REFERENCES KACRABT.RENDELES
(
  RENDELES_ID
)
ON DELETE CASCADE ENABLE;




  
  
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
 
 
  
  
 
 
  
  
  