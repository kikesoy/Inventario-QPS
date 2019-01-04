DELIMITER $$

CREATE PROCEDURE sp_get_product_list()

    BEGIN

        SELECT * FROM inv_listados ORDER BY id ASC;

    END;$$
    
DELIMITER ;
