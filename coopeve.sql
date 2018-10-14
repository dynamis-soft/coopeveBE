
CREATE DATABASE [coopeve]

USE [coopeve]
GO

/****** Object:  Table [dbo].[user]    Script Date: 1/10/2018 23:30:15 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[user](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [varchar](50) NULL,
	[password] [varchar](100) NULL,
	[name] [varchar](100) NULL,
 CONSTRAINT [PK_user] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO



USE [coopeve]
GO

INSERT INTO [dbo].[possible_client]
           ([datebirthday]
           ,[name]
           ,[phone]
           ,[mobil]
           ,[email]
           ,[company]
           ,[ocupation]
           ,[years_work]
           ,[neto]
           ,[bruto]
           ,[associated]
           ,[client]
           ,[date]
           ,[office]
           ,[id_zoho])
     VALUES
           (<datebirthday, varchar(50),>
           ,<name, varchar(100),>
           ,<phone, varchar(20),>
           ,<mobil, varchar(20),>
           ,<email, varchar(100),>
           ,<company, varchar(50),>
           ,<ocupation, varchar(50),>
           ,<years_work, varchar(5),>
           ,<neto, varchar(50),>
           ,<bruto, varchar(50),>
           ,<associated, varchar(50),>
           ,<client, varchar(50),>
           ,<date, varchar(50),>
           ,<office, varchar(50),>
           ,<id_zoho, varchar(50),>)
GO

CREATE TABLE [dbo].[contact](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](100) NULL,
	[lastname] [varchar](100) NULL,
	[nameclient] [varchar](100) NULL,
	[email] [varchar](50) NULL,
	[phone] [varchar](50) NULL,
	[mobile] [varchar](50) NULL,
	[datebirthday] [varchar](50) NULL,
	[description] [varchar](150) NULL,
	[id_zoho] [varchar](50) NULL,
 CONSTRAINT [PK_contact] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[client](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nameclient] [varchar](100) NULL,
	[sex] [char](10) NULL,
	[numclient] [varchar](50) NULL,
	[phone] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[type] [varchar](50) NULL,
	[product] [varchar](200) NULL,
	[salary] [varchar](50) NULL,
	[office] [varchar](50) NULL,
	[source] [varchar](50) NULL,
	[direction] [varchar](150) NULL,
	[description] [varchar](150) NULL,
 CONSTRAINT [PK_client] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
