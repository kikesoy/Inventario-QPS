#---------------------------
#Crear y usar base de datos
#---------------------------
DROP DATABASE IF EXISTS qpselect_apps;
CREATE DATABASE qpselect_apps;
USE qpselect_apps;

#-------------
#Crear tablas
#-------------
	#-------------------
	#Tabla inv_productos
	#-------------------
	CREATE TABLE inv_productos
	(
		code VARCHAR(32) PRIMARY KEY,
		name VARCHAR(128) NOT NULL
	);

	#------------------
	#Tabla inv_listados
	#------------------
	CREATE TABLE inv_listados
	(
		id INT AUTO_INCREMENT PRIMARY KEY,
		code VARCHAR(32) NOT NULL,
		name VARCHAR(128) NOT NULL,
		    team VARCHAR(20) NOT NULL,
        location VARCHAR(20) NOT NULL,
        location_size VARCHAR(50) NOT NULL,
        location_others VARCHAR(5) NOT NULL,
        quantity INT UNSIGNED NOT NULL,
        brand_harfon BOOLEAN DEFAULT '0' NOT NULL,
        brand_wps BOOLEAN DEFAULT '0' NOT NULL,
        brand_tras BOOLEAN DEFAULT '0' NOT NULL,
        brand_zen BOOLEAN DEFAULT '0' NOT NULL,
        brand_blank BOOLEAN DEFAULT '0' NOT NULL,
        brand_other BOOLEAN DEFAULT '0' NOT NULL,
        package_type VARCHAR(50) NOT NULL,
        pack_condition VARCHAR(10) DEFAULT 'Buena' NOT NULL,
        product_condition VARCHAR(10) DEFAULT 'Buena' NOT NULL,
        ask_inspection VARCHAR(5) DEFAULT 'No' NOT NULL,
        not_found BOOLEAN DEFAULT '0' NOT NULL,
        quarantine VARCHAR(5) DEFAULT 'No' NOT NULL,
        comments TEXT,
        audit BOOLEAN DEFAULT '0' NOT NULL,
        http_user_agent VARCHAR(255) NOT NULL,
        remote_addr VARCHAR(255) NOT NULL,
        created_at TIMESTAMP
	);