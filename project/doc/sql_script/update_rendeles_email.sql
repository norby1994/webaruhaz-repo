/*UPDATE EMAIL - RENDELES*/
  
  
  CREATE OR REPLACE TRIGGER TR_EMAIL_RENDELES
BEFORE UPDATE OF EMAIL ON FELHASZNALO
FOR EACH ROW
BEGIN
  UPDATE RENDELES
  SET EMAIL = :NEW.EMAIL
  WHERE EMAIL = :OLD.EMAIL;
  END;