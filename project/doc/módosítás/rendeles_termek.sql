create or replace trigger rendeles_termek
after insert on rendeles
for each row
begin
  for i in 1..:new.termek_szam
  loop
    insert into rendeles_reszletei(rendeles_id, termek_id, attributumok, darab_szam, termek_ar) values (:new.rendeles_id, i, 0, 0, 0);
  end loop;
end;