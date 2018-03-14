CREATE VIEW view_transaksi_pulsa 
AS
SELECT transaksi_pulsa.*, users.username, users.first_name 
FROM `transaksi_pulsa` 
JOIN users ON transaksi_pulsa.id_user=users.id 
ORDER BY transaksi_pulsa.created_at DESC