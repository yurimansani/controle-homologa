/*
   terça-feira, 23 de agosto de 201615:46:08
   User: sa
   Server: sql.mnztecnologia.com.br
   Database: controle-homologa
   Application: 
*/

/* To prevent any potential data loss issues, you should review this script in detail before running it outside the context of the database designer.*/
BEGIN TRANSACTION
SET QUOTED_IDENTIFIER ON
SET ARITHABORT ON
SET NUMERIC_ROUNDABORT OFF
SET CONCAT_NULL_YIELDS_NULL ON
SET ANSI_NULLS ON
SET ANSI_PADDING ON
SET ANSI_WARNINGS ON
COMMIT
BEGIN TRANSACTION
GO
CREATE TABLE dbo.controle_homologa_status
	(
	id_status int NOT NULL,
	status nchar(50) NOT NULL
	)  ON [PRIMARY]
GO
ALTER TABLE dbo.controle_homologa_status SET (LOCK_ESCALATION = TABLE)
GO
COMMIT
select Has_Perms_By_Name(N'dbo.controle_homologa_status', 'Object', 'ALTER') as ALT_Per, Has_Perms_By_Name(N'dbo.controle_homologa_status', 'Object', 'VIEW DEFINITION') as View_def_Per, Has_Perms_By_Name(N'dbo.controle_homologa_status', 'Object', 'CONTROL') as Contr_Per 