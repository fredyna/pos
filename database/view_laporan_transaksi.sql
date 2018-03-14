CREATE VIEW view_laporan_transaksi AS 
SELECT id, id_produk, nama_produk, 
SUM(harga_beli*qty) AS total_beli, 
SUM(total) AS total_jual, 
( SUM(total) - SUM(harga_beli*qty)) AS laba ,
created_at,
FROM `view_transaksi` 
GROUP BY id_produk