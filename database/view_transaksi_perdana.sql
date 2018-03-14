CREATE VIEW view_transaksi_perdana AS
SELECT transaksi_perdana.id as id, transaksi_perdana.id_user as id_user, users.username as username, users.first_name as name, perdana_items.nama_operator as nama_operator, perdana_items.jenis as jenis, perdana_items.harga as harga, perdana_items.qty as qty, (perdana_items.harga * perdana_items.qty) as total, transaksi_perdana.created_at as created_at
FROM transaksi_perdana
LEFT JOIN users ON users.id=transaksi_perdana.id_user
JOIN perdana_items ON perdana_items.id_transaksi = transaksi_perdana.id
ORDER BY transaksi_perdana.created_at DESC