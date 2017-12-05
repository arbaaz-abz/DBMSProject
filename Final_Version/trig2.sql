delimiter $$
create trigger balan before update on wallet
for each row
begin
if new.balance > 30000 then
set new.balance = 30000;
end if;
end;
$$

