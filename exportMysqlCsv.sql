(SELECT 'Identificador_Usuario','usuario','Monto','Cantidad','Puntos','Productos')
UNION
SELECT mc_usuarios.id,mc_usuarios.usuario,mc_compras.monto,mc_compras.cantidad,mc_compras.puntos,mc_compras_productos.id
FROM mc_usuarios,mc_compras,mc_compras_productos
WHERE (mc_usuarios.id=mc_compras.cliente_id)
AND mc_compras.cliente_id IN (SELECT mc_compras_productos.compra_id FROM mc_compras_productos)
INTO OUTFILE'C:/ProgramData/Skype/report3.csv'
    FIELDS TERMINATED BY';'
    ENCLOSED BY'"'
    LINES TERMINATED BY '\n'
