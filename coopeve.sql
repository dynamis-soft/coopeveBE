
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
	[username] [varchar](300) NULL,
	[password] [varchar](300) NULL,
	[name] [varchar](300) NULL,
	[status] [int] NULL,
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
	[datebirthday] [varchar](300) NULL,
	[name] [varchar](300) NULL,
	[phone] [varchar](300) NULL,
	[mobil] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[company] [varchar](300) NULL,
	[ocupation] [varchar](300) NULL,
	[years_work] [varchar](300) NULL,
	[neto] [varchar](300) NULL,
	[bruto] [varchar](300) NULL,
	[associated] [varchar](300) NULL,
	[client] [varchar](300) NULL,
	[date] [varchar](300) NULL,
	[office] [varchar](300) NULL,
	[id_zoho] [varchar](300) NULL,
 CONSTRAINT [PK_possible_client] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[contact](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](300) NULL,
	[lastname] [varchar](300) NULL,
	[nameclient] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[phone] [varchar](300) NULL,
	[mobile] [varchar](300) NULL,
	[datebirthday] [varchar](300) NULL,
	[description] [varchar](300) NULL,
	[id_zoho] [varchar](300) NULL,
 CONSTRAINT [PK_contact] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[client](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nameclient] [varchar](300) NULL,
	[sex] [varchar](300) NULL,
	[numclient] [varchar](300) NULL,
	[phone] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[type] [varchar](300) NULL,
	[product] [varchar](300) NULL,
	[salary] [varchar](300) NULL,
	[office] [varchar](300) NULL,
	[source] [varchar](300) NULL,
	[direction] [varchar](300) NULL,
	[description] [varchar](300) NULL,
	[id_zoho] [varchar](300) NULL,
 CONSTRAINT [PK_client] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[opportunity](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](300) Null,
	[nameclient] [varchar](300) NULL,
	[source] [varchar](300) NULL,
	[salary] [varchar](300) NULL,
	[amount][varchar](300) NUll,
	[dateclose] [varchar](300) NUll,
	[phase] [varchar](300) NULL,
	[description] [varchar](300) NUll,
    [id_zoho][varchar] (300) NULL
 CONSTRAINT [PK_opportunity] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[associated](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[associatesname] [varchar](300) NULL,
	[secondname] [varchar](300) NULL,
	[lastname] [varchar](300) NULL,
	[motherslastname] [varchar](300) NULL,
	[marriedsurname] [varchar](300) NULL,
	[nclient] [varchar](300) NULL,
	[nassociated] [varchar](300) NULL,
	[sex] [varchar](300) NULL,
	[birthdate] [varchar](300) NULL,
	[dateofadmission] [varchar](300) NULL,
	[landline] [varchar](300) NULL,
	[mobilephone] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[branchoffice] [varchar](300) NULL,
	[company] [varchar](300) NULL,
	[occupation] [varchar](300) NULL,
	[bruto] [varchar](300) NULL,
	[neto] [varchar](300) NULL,
	[coopeveonline] [varchar](300) NULL,
	[funeralComplex] [varchar](300) NULL,
	[visa] [varchar](300) NULL,
	[key] [varchar](300) NULL,
	[id_zoho] [varchar](300) NULL,
	[payment] [varchar](300) NULL,
	[monthlyletter] [varchar](300) NULL,
	[typeofincome] [varchar](300) NULL,
	[companyphone] [varchar](300) NULL,
	[companyaddress] [varchar](300) NULL,
	[laborcondition] [varchar](300) NULL,
	[economicactivity] [varchar](300) NULL,
	[yearsservice] [varchar](300) NULL,
	[countrycompany] [varchar](300) NULL,
	[age] [varchar](300) NULL,
	[weightperson] [varchar](300) NULL,
	[height] [varchar](300) NULL,
	[bloodtype] [varchar](300) NULL,
	[donor] [varchar](300) NULL,
	[levelschooling] [varchar](300) NULL,
	[countryresidence] [varchar](300) NULL,
	[nationality] [varchar](300) NULL,
	[housingtype] [varchar](300) NULL,
	[civilstatus] [varchar](300) NULL,
	[otherincome] [varchar](300) NULL,
	[customerproducts] [varchar](300) NULL,
 CONSTRAINT [PK_associated] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[quotation](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[listingname] [varchar](300) NULL,
	[name] [varchar](300) NULL,
	[lastname] [varchar](300) NULL,
	[identificationcard] [varchar](300) NULL,
	[date] [varchar](300) NULL,
	[phone] [varchar](300) NULL,
	[cellphone] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[exchangerate] [varchar](300) NULL,
	[amountrequired] [varchar](300) NULL,
	[monthlyletter] [varchar](300) NULL,
	[workplace] [varchar](300) NULL,
	[occupation] [varchar](300) NULL,
	[yearsofservice] [varchar](300) NULL,
	[officephone] [varchar](300) NULL,
	[monthlyincome] [varchar](300) NULL,
	[id_zoho] [varchar](300) NULL,
 CONSTRAINT [PK_quotation] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[affiliate](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[dateaffiliated] [varchar](300) NULL,
	[branchoffice] [varchar](300) NULL,
	[firstname] [varchar](300) NULL,
	[secondname] [varchar](300) NULL,
	[surname] [varchar](300) NULL,
	[identificationcard] [varchar](300) NULL,
	[socialsecuritynumber] [varchar](300) NULL,
	[birthdate] [varchar](300) NULL,
	[age] [varchar](300) NULL,
	[height] [varchar](300) NULL,
	[weight] [varchar](300) NULL,
	[gender] [varchar](300) NULL,
	[email] [varchar](300) NULL,
	[bloodtype] [varchar](300) NULL,
	[donor] [varchar](300) NULL,
	[civilstatus] [varchar](300) NULL,
	[phone] [varchar](300) NULL,
	[mobile] [varchar](300) NULL,
	[nationality] [varchar](300) NULL,
	[countryresidence] [varchar](300) NULL,
	[typehousing] [varchar](300) NULL,
	[levelschooling] [varchar](300) NULL,
	[paymentcontributions] [varchar](300) NULL,
	[monthlyletter] [varchar](300) NULL,
	[occupation] [varchar](300) NULL,
	[economicactivity] [varchar](300) NULL,
	[yearsservice] [varchar](300) NULL,
	[companyname] [varchar](300) NULL,
	[companyaddress] [varchar](300) NULL,
	[laborcondition] [varchar](300) NULL,
	[netsalary] [varchar](300) NULL,
	[otherincome] [varchar](300) NULL,
	[countrycompany] [varchar](300) NULL,
	[companyphone] [varchar](300) NULL,
	[typeincome] [varchar](300) NULL,
	[secondsurname] [varchar](300) NULL,
    [id_zoho][varchar] (300) NULL
 CONSTRAINT [PK_affiliate] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO