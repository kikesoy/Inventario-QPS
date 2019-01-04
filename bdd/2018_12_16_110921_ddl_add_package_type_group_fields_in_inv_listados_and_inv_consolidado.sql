#-------------------
#Usar base de datos
#-------------------
USE qpselect_apps;

#---------------------------------------------------------------------
#Agregar grupos de paquetes en la tabla inv_listados e inv_consolidado
#---------------------------------------------------------------------

	#--------------------------
	#Alterar tabla inv_listados
	#--------------------------
	#Group1
	ALTER TABLE inv_listados ADD package_type_group1 VARCHAR(50) AFTER product_condition;
	ALTER TABLE inv_listados ADD package_quantity_group1 INT UNSIGNED AFTER package_type_group1;
	ALTER TABLE inv_listados ADD prod_quantity_group1 INT UNSIGNED AFTER package_quantity_group1;

	#Group2
	ALTER TABLE inv_listados ADD package_type_group2 VARCHAR(50) AFTER prod_quantity_group1;
	ALTER TABLE inv_listados ADD package_quantity_group2 INT UNSIGNED AFTER package_type_group2;
	ALTER TABLE inv_listados ADD prod_quantity_group2 INT UNSIGNED AFTER package_quantity_group2;

	#Group3
	ALTER TABLE inv_listados ADD package_type_group3 VARCHAR(50) AFTER prod_quantity_group2;
	ALTER TABLE inv_listados ADD package_quantity_group3 INT UNSIGNED AFTER package_type_group3;
	ALTER TABLE inv_listados ADD prod_quantity_group3 INT UNSIGNED AFTER package_quantity_group3;

	#Group4
	ALTER TABLE inv_listados ADD package_type_group4 VARCHAR(50) AFTER prod_quantity_group3;
	ALTER TABLE inv_listados ADD package_quantity_group4 INT UNSIGNED AFTER package_type_group4;
	ALTER TABLE inv_listados ADD prod_quantity_group4 INT UNSIGNED AFTER package_quantity_group4;

	#-----------------------------
	#Alterar tabla inv_consolidado
	#-----------------------------
	#Group1
	ALTER TABLE inv_consolidado ADD package_type_group1 VARCHAR(50) AFTER product_condition;
	ALTER TABLE inv_consolidado ADD package_quantity_group1 INT UNSIGNED AFTER package_type_group1;
	ALTER TABLE inv_consolidado ADD prod_quantity_group1 INT UNSIGNED AFTER package_quantity_group1;

	#Group2
	ALTER TABLE inv_consolidado ADD package_type_group2 VARCHAR(50) AFTER prod_quantity_group1;
	ALTER TABLE inv_consolidado ADD package_quantity_group2 INT UNSIGNED AFTER package_type_group2;
	ALTER TABLE inv_consolidado ADD prod_quantity_group2 INT UNSIGNED AFTER package_quantity_group2;

	#Group3
	ALTER TABLE inv_consolidado ADD package_type_group3 VARCHAR(50) AFTER prod_quantity_group2;
	ALTER TABLE inv_consolidado ADD package_quantity_group3 INT UNSIGNED AFTER package_type_group3;
	ALTER TABLE inv_consolidado ADD prod_quantity_group3 INT UNSIGNED AFTER package_quantity_group3;

	#Group4
	ALTER TABLE inv_consolidado ADD package_type_group4 VARCHAR(50) AFTER prod_quantity_group3;
	ALTER TABLE inv_consolidado ADD package_quantity_group4 INT UNSIGNED AFTER package_type_group4;
	ALTER TABLE inv_consolidado ADD prod_quantity_group4 INT UNSIGNED AFTER package_quantity_group4;