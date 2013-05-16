/*UPDATE ATTRIBUTUM_ID*/
 
 CREATE OR REPLACE TRIGGER TR_ATTRIBUTUM_ID
BEFORE UPDATE OF ATTRIBUTUM_ID ON ATTRIBUTUM
FOR EACH ROW
BEGIN
  UPDATE KATEGORIA
  SET ATTRIBUTUM_ID = :NEW.ATTRIBUTUM_ID
  WHERE ATTRIBUTUM_ID = :OLD.ATTRIBUTUM_ID;
  END;