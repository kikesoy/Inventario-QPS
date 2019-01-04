#-------------------
#Usar base de datos
#-------------------
USE qpselect_apps;

#----------------------------------------------------
#Modificación en tabla inv_listados e inv_consolidado
#----------------------------------------------------

	#-----------------------------------
	#Alterar campo count de inv_listados
	#-----------------------------------
	ALTER TABLE inv_listados CHANGE count count VARCHAR(20) AFTER team;

	#--------------------------------------
	#Alterar campo count de inv_consolidado
	#--------------------------------------
	ALTER TABLE inv_consolidado CHANGE count count VARCHAR(20) AFTER team;