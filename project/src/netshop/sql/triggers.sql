create or replace
trigger egyenleg_trigger
before insert on felhasznalo
for each row
begin
  :new.egyenleg := 10000;
  :new.torzsvasarlo :='N';
end;