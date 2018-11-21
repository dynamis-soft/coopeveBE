
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

CREATE TABLE [dbo].[possible_client](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[datebirthday] [varchar](50) NULL,
	[name] [varchar](100) NULL,
	[phone] [varchar](20) NULL,
	[mobil] [varchar](20) NULL,
	[email] [varchar](100) NULL,
	[company] [varchar](50) NULL,
	[ocupation] [varchar](50) NULL,
	[years_work] [varchar](5) NULL,
	[neto] [varchar](50) NULL,
	[bruto] [varchar](50) NULL,
	[associated] [varchar](50) NULL,
	[client] [varchar](50) NULL,
	[date] [varchar](50) NULL,
	[office] [varchar](50) NULL,
	[id_zoho] [varchar](50) NULL,
 CONSTRAINT [PK_possible_client] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
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


CREATE TABLE [dbo].[opportunity](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](50) Null,
	[nameclient] [varchar](100) NULL,
	[source] [varchar](50) NULL,
	[salary] [varchar](50) NULL,
	[amount][varchar](50) NUll,
	[dateclose] [varchar](50) NUll,
	[phase] [varchar](50) NULL,
	[description] [varchar](50) NUll,
        [id_zoho][varchar] (50) NULL
 CONSTRAINT [PK_opportunity] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[associated](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[associatesname] [varchar](50) NULL,
	[secondname] [varchar](50) NULL,
	[lastname] [varchar](100) NULL,
	[motherslastname] [varchar](50) NULL,
	[marriedsurname] [varchar](50) NULL,
	[nclient] [varchar](50) NULL,
	[nassociated] [varchar](50) NULL,
	[sex] [varchar](50) NULL,
	[birthdate] [varchar](50) NULL,
	[dateofadmission] [varchar](50) NULL,
	[landline] [varchar](50) NULL,
	[mobilephone] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[branchoffice] [varchar](50) NULL,
	[company] [varchar](50) NULL,
	[occupation] [varchar](50) NULL,
	[bruto] [varchar](50) NULL,
	[neto] [varchar](50) NULL,
	[coopeveonline] [varchar](50) NULL,
	[funeralComplex] [varchar](50) NULL,
	[visa] [varchar](50) NULL,
	[key] [varchar](50) NULL,
	[id_zoho] [varchar](50) NULL,
	[payment] [varchar](50) NULL,
	[monthlyletter] [varchar](50) NULL,
	[typeofincome] [varchar](50) NULL,
	[companyphone] [varchar](50) NULL,
	[companyaddress] [varchar](50) NULL,
	[laborcondition] [varchar](50) NULL,
	[economicactivity] [varchar](50) NULL,
	[yearsservice] [varchar](50) NULL,
	[countrycompany] [varchar](50) NULL,
	[age] [varchar](50) NULL,
	[weightperson] [varchar](50) NULL,
	[height] [varchar](50) NULL,
	[bloodtype] [varchar](50) NULL,
	[donor] [varchar](50) NULL,
	[levelschooling] [varchar](50) NULL,
	[countryresidence] [varchar](50) NULL,
	[nationality] [varchar](50) NULL,
	[housingtype] [varchar](50) NULL,
	[civilstatus] [varchar](50) NULL,
	[otherincome] [varchar](50) NULL,
	[customerproducts] [varchar](50) NULL,
 CONSTRAINT [PK_associated] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[quotation](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[listingname] [varchar](50) NULL,
	[name] [varchar](50) NULL,
	[lastname] [varchar](100) NULL,
	[identificationcard] [varchar](50) NULL,
	[date] [varchar](50) NULL,
	[phone] [varchar](50) NULL,
	[cellphone] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[exchangerate] [varchar](50) NULL,
	[amountrequired] [varchar](50) NULL,
	[monthlyletter] [varchar](50) NULL,
	[workplace] [varchar](50) NULL,
	[occupation] [varchar](50) NULL,
	[yearsofservice] [varchar](50) NULL,
	[officephone] [varchar](50) NULL,
	[monthlyincome] [varchar](50) NULL,
	[id_zoho] [varchar](50) NULL,
 CONSTRAINT [PK_quotation] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
