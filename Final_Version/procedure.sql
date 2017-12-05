delimiter //
create PROCEDURE getBalance1(userID int(11),currbalance int(11))
BEGIN
declare uID int(11);
declare bal int(11);
set uID = userID;
set bal = currbalance;
update wallet set balance = bal where wallet.uid = uID;
end 
//



