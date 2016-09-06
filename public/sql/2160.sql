USE [sge_desenv]
GO

/****** Object:  Table [dbo].[log_troca_hash]    Script Date: 18/02/2016 09:21:25 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[log_troca_hash](
	[lth_codigo] [int] IDENTITY(1,1) NOT NULL,
	[ing_codigo] [int] NOT NULL,
	[tre_codigo] [int] NOT NULL,
	[usu_codigo_autorizacao] [int] NOT NULL,
	[inh_hash] [varchar](max) NOT NULL,
	[tre_codigo_novo] [int] NULL,
	[inh_hash_novo] [varchar](max) NULL,
	[lth_datetime] [datetime] NULL,
 CONSTRAINT [PK_log_troca_hash] PRIMARY KEY CLUSTERED 
(
	[lth_codigo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO
