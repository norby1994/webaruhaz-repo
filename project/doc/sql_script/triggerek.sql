/* NetShop internetes �ruh�z -triggerek integrit�si megszor�t�s s�r�l�se ellen
   Csapattagok:
		Vereb�lyi Csaba
		Vereb�lyi Bertalan
		Kasziba Cintia
	K�sz�tette:
		Kasziba Cintia*/


/*UPDATE KATEGORIA_ID */
 
 CREATE OR REPLACE TRIGGER TR_KATEGORIA_ID
BEFORE UPDATE OF KATEGORIA_ID ON KATEGORIA
FOR EACH ROW
BEGIN
  UPDATE TERMEK
  SET KATEGORIA_ID = :NEW.KATEGORIA_ID
  WHERE KATEGORIA_ID = :OLD.KATEGORIA_ID;
  END;
  
  
  /*UPDATE CIMKE_ID*/
  
  CREATE OR REPLACE TRIGGER TR_CIMKE_ID
BEFORE UPDATE OF CIMKE_ID ON CIMKE
FOR EACH ROW
BEGIN
  UPDATE TERMEK
  SET CIMKE_ID = :NEW.CIMKE_ID
  WHERE CIMKE_ID = :OLD.CIMKE_ID;
  END;
  
  /*UPDATE ATTRIBUTUM_ID*/
 
 CREATE OR REPLACE TRIGGER TR_ATTRIBUTUM_ID
BEFORE UPDATE OF ATTRIBUTUM_ID ON ATTRIBUTUM
FOR EACH ROW
BEGIN
  UPDATE KATEGORIA
  SET ATTRIBUTUM_ID = :NEW.ATTRIBUTUM_ID
  WHERE ATTRIBUTUM_ID = :OLD.ATTRIBUTUM_ID;
  END;
  
  
  /*UPDATE EMAIL - RENDELES*/
  
  
  CREATE OR REPLACE TRIGGER TR_EMAIL_RENDELES
BEFORE UPDATE OF EMAIL ON FELHASZNALO
FOR EACH ROW
BEGIN
  UPDATE RENDELES
  SET EMAIL = :NEW.EMAIL
  WHERE EMAIL = :OLD.EMAIL;
  END;
  
  /*UPDATE EMAIL - LAKCIM*/
 
CREATE OR REPLACE TRIGGER TR_EMAIL_LAKCIM
BEFORE UPDATE OF EMAIL ON FELHASZNALO
FOR EACH ROW
BEGIN
  UPDATE LAKCIM
  SET EMAIL = :NEW.EMAIL
  WHERE EMAIL = :OLD.EMAIL;
  END;