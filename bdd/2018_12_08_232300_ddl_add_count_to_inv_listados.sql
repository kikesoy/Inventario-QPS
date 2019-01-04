#-------------------
#Usar base de datos
#-------------------
USE qpselect_apps;

#-----------------------------
#Agregar campo a inv_listados
#-----------------------------

	#---------------------------
	#Alterar tabla inv_listados
	#---------------------------
	ALTER TABLE inv_listados ADD count INT UNSIGNED AFTER team;