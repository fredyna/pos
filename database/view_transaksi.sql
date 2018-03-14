CREATE VIEW view_transaksi AS
SELECT transaksi.id as id, 
transaksi.id_user as id_user,
transaksi.diskon as diskon, 
users.username as username, 
users.first_name as name, 
transaksi_items.id_produk as id_produk, 
produk.nama as nama_produk,
produk.harga_beli as harga_beli,
transaksi_items.harga as harga, 
transaksi_items.qty as qty, 
(transaksi_items.harga_beli * transaksi_items.qty) as total_beli,
(transaksi_items.harga * transaksi_items.qty) as total_jual, 
transaksi.created_at as created_at
FROM transaksi
LEFT JOIN users ON users.id=transaksi.id_user
JOIN transaksi_items ON transaksi_items.id_transaksi = transaksi.id
JOIN produk ON produk.id = transaksi_items.id_produk
ORDER BY transaksi.created_at DESC