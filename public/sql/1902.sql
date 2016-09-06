
CREATE TABLE [dbo].[log_pedido_cancelamento](
	[lpc_codigo] [int] IDENTITY(1,1) NOT NULL,
	[ped_codigo] [int] NULL,
	[usu_codigo] [int] NULL,
	[usu_codigo_supervisor] [int] NULL,
	[lpc_data] [datetime] NULL,
 CONSTRAINT [PK_log_pedido_cancelamento] PRIMARY KEY CLUSTERED 
(
	[lpc_codigo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];

ALTER TABLE [dbo].[log_pedido_cancelamento]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_cancelamento_acl_usuario] FOREIGN KEY([usu_codigo])
REFERENCES [dbo].[acl_usuario] ([usu_codigo]);

ALTER TABLE [dbo].[log_pedido_cancelamento] CHECK CONSTRAINT [FK_log_pedido_cancelamento_acl_usuario];

ALTER TABLE [dbo].[log_pedido_cancelamento]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_cancelamento_acl_usuario1] FOREIGN KEY([usu_codigo_supervisor])
REFERENCES [dbo].[acl_usuario] ([usu_codigo]);

ALTER TABLE [dbo].[log_pedido_cancelamento] CHECK CONSTRAINT [FK_log_pedido_cancelamento_acl_usuario1];

ALTER TABLE [dbo].[log_pedido_cancelamento]  WITH CHECK ADD  CONSTRAINT [FK_log_pedido_cancelamento_pedido] FOREIGN KEY([ped_codigo])
REFERENCES [dbo].[pedido] ([ped_codigo]);

ALTER TABLE [dbo].[log_pedido_cancelamento] CHECK CONSTRAINT [FK_log_pedido_cancelamento_pedido];