DELIMITER $$

CREATE PROCEDURE sp_get_products(codigo VARCHAR(32))

    BEGIN

        SELECT * FROM inv_productos WHERE code = codigo;

    END;$$
    
DELIMITER ;
