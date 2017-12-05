delimiter $$
create trigger dob after insert on registered
for each row
begin
if new.dob > '1999-01-01' then
delete from registered where u_id = new.u_id;
end if;
end;
$$

