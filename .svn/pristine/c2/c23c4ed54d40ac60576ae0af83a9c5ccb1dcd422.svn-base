CREATE TABLE [dbo].[log_pedido_reimpressao](
	[lpr_codigo] [int] IDENTITY(1,1) NOT NULL,
	[ped_codigo] [int] NOT NULL,
	[usu_codigo] [int] NOT NULL,
	[usu_codigo_supervisor] [int] NOT NULL,
	[ingressos] [text] NOT NULL,
	[lpr_data] [datetime] NOT NULL,
 CONSTRAINT [PK_log_pedido_reimpressao] PRIMARY KEY CLUSTERED 
(
	[lpr_codigo] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO

ALTER TABLE [dbo].[log_pedido_reimpressao]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_reimpressao_acl_usuario] FOREIGN KEY([usu_codigo])
REFERENCES [dbo].[acl_usuario] ([usu_codigo])
GO

ALTER TABLE [dbo].[log_pedido_reimpressao] CHECK CONSTRAINT [FK_log_pedido_reimpressao_acl_usuario]
GO

ALTER TABLE [dbo].[log_pedido_reimpressao]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_reimpressao_acl_usuario1] FOREIGN KEY([usu_codigo_supervisor])
REFERENCES [dbo].[acl_usuario] ([usu_codigo])
GO

ALTER TABLE [dbo].[log_pedido_reimpressao] CHECK CONSTRAINT [FK_log_pedido_reimpressao_acl_usuario1]
GO

ALTER TABLE [dbo].[log_pedido_reimpressao]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_reimpressao_log_pedido_reimpressao] FOREIGN KEY([lpr_codigo])
REFERENCES [dbo].[log_pedido_reimpressao] ([lpr_codigo])
GO

ALTER TABLE [dbo].[log_pedido_reimpressao] CHECK CONSTRAINT [FK_log_pedido_reimpressao_log_pedido_reimpressao]
GO

ALTER TABLE [dbo].[log_pedido_reimpressao]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_reimpressao_pedido] FOREIGN KEY([ped_codigo])
REFERENCES [dbo].[pedido] ([ped_codigo])
GO

ALTER TABLE [dbo].[log_pedido_reimpressao] CHECK CONSTRAINT [FK_log_pedido_reimpressao_pedido]
GO

/* tabela para gravacao de log de reimpressao de pedido */