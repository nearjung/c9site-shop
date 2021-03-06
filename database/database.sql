USE [master]
GO
/****** Object:  Database [C9Web]    Script Date: 01/30/2016 19:34:10 ******/
CREATE DATABASE [C9Web] ON  PRIMARY 
( NAME = N'C9Web', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL10_50.SQLEXPRESS\MSSQL\DATA\C9Web.mdf' , SIZE = 409600KB , MAXSIZE = UNLIMITED, FILEGROWTH = 102400KB )
 LOG ON 
( NAME = N'C9Web_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL10_50.SQLEXPRESS\MSSQL\DATA\C9Web_1.ldf' , SIZE = 409600KB , MAXSIZE = 2048GB , FILEGROWTH = 102400KB )
GO
ALTER DATABASE [C9Web] SET COMPATIBILITY_LEVEL = 100
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [C9Web].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [C9Web] SET ANSI_NULL_DEFAULT OFF
GO
ALTER DATABASE [C9Web] SET ANSI_NULLS OFF
GO
ALTER DATABASE [C9Web] SET ANSI_PADDING OFF
GO
ALTER DATABASE [C9Web] SET ANSI_WARNINGS OFF
GO
ALTER DATABASE [C9Web] SET ARITHABORT OFF
GO
ALTER DATABASE [C9Web] SET AUTO_CLOSE ON
GO
ALTER DATABASE [C9Web] SET AUTO_CREATE_STATISTICS ON
GO
ALTER DATABASE [C9Web] SET AUTO_SHRINK OFF
GO
ALTER DATABASE [C9Web] SET AUTO_UPDATE_STATISTICS ON
GO
ALTER DATABASE [C9Web] SET CURSOR_CLOSE_ON_COMMIT OFF
GO
ALTER DATABASE [C9Web] SET CURSOR_DEFAULT  GLOBAL
GO
ALTER DATABASE [C9Web] SET CONCAT_NULL_YIELDS_NULL OFF
GO
ALTER DATABASE [C9Web] SET NUMERIC_ROUNDABORT OFF
GO
ALTER DATABASE [C9Web] SET QUOTED_IDENTIFIER OFF
GO
ALTER DATABASE [C9Web] SET RECURSIVE_TRIGGERS OFF
GO
ALTER DATABASE [C9Web] SET  DISABLE_BROKER
GO
ALTER DATABASE [C9Web] SET AUTO_UPDATE_STATISTICS_ASYNC OFF
GO
ALTER DATABASE [C9Web] SET DATE_CORRELATION_OPTIMIZATION OFF
GO
ALTER DATABASE [C9Web] SET TRUSTWORTHY OFF
GO
ALTER DATABASE [C9Web] SET ALLOW_SNAPSHOT_ISOLATION OFF
GO
ALTER DATABASE [C9Web] SET PARAMETERIZATION SIMPLE
GO
ALTER DATABASE [C9Web] SET READ_COMMITTED_SNAPSHOT OFF
GO
ALTER DATABASE [C9Web] SET HONOR_BROKER_PRIORITY OFF
GO
ALTER DATABASE [C9Web] SET  READ_WRITE
GO
ALTER DATABASE [C9Web] SET RECOVERY SIMPLE
GO
ALTER DATABASE [C9Web] SET  MULTI_USER
GO
ALTER DATABASE [C9Web] SET PAGE_VERIFY CHECKSUM
GO
ALTER DATABASE [C9Web] SET DB_CHAINING OFF
GO
USE [C9Web]
GO
/****** Object:  User [C9WOPS]    Script Date: 01/30/2016 19:34:10 ******/
CREATE USER [C9WOPS] FOR LOGIN [C9WOPS] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [C9Web]    Script Date: 01/30/2016 19:34:10 ******/
CREATE USER [C9Web] FOR LOGIN [C9Web] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [C9Svr]    Script Date: 01/30/2016 19:34:10 ******/
CREATE USER [C9Svr] FOR LOGIN [C9Svr] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [C9Rang]    Script Date: 01/30/2016 19:34:10 ******/
CREATE USER [C9Rang] FOR LOGIN [C9Rang] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [c9]    Script Date: 01/30/2016 19:34:10 ******/
CREATE USER [c9] FOR LOGIN [c9] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  Schema [Web]    Script Date: 01/30/2016 19:34:10 ******/
CREATE SCHEMA [Web] AUTHORIZATION [dbo]
GO
/****** Object:  Schema [Log]    Script Date: 01/30/2016 19:34:10 ******/
CREATE SCHEMA [Log] AUTHORIZATION [C9Web]
GO
/****** Object:  Schema [horizon]    Script Date: 01/30/2016 19:34:10 ******/
CREATE SCHEMA [horizon] AUTHORIZATION [C9Web]
GO
/****** Object:  Table [dbo].[truemoney]    Script Date: 01/30/2016 19:34:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[truemoney](
	[card_id] [int] IDENTITY(1,1) NOT NULL,
	[password] [varchar](14) NULL,
	[user_no] [varchar](14) NULL,
	[amount] [int] NULL,
	[status] [tinyint] NULL,
	[added_time] [datetime] NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Log].[TblLogin]    Script Date: 01/30/2016 19:34:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [Log].[TblLogin](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[pAccID] [varchar](32) NOT NULL,
	[pPwd] [varchar](32) NOT NULL,
	[pIp] [varchar](50) NOT NULL,
	[pIpCount] [int] NOT NULL,
	[pLastLogin] [datetime] NULL,
	[pLstLogin] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [Web].[TblLeftMenu]    Script Date: 01/30/2016 19:34:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Web].[TblLeftMenu](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[menu_catalog] [int] NOT NULL,
	[menu_name] [text] NOT NULL,
	[menu_link] [text] NOT NULL,
	[show] [int] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [Web].[TblGuildStat]    Script Date: 01/30/2016 19:34:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Web].[TblGuildStat](
	[cGuildNo] [int] NOT NULL,
	[cFighter] [int] NOT NULL,
	[cShaman] [int] NOT NULL,
	[cHunter] [int] NOT NULL,
	[cWitch] [int] NOT NULL,
	[cCook] [int] NOT NULL,
	[cAlchemist] [int] NOT NULL,
	[cMetal] [int] NOT NULL,
	[cTextile] [int] NOT NULL,
	[cWood] [int] NOT NULL,
	[cAvgLevel] [int] NOT NULL,
 CONSTRAINT [CL_PK_TblGuildStat_cGuildNo] PRIMARY KEY CLUSTERED 
(
	[cGuildNo] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [Web].[TblGuildInfo]    Script Date: 01/30/2016 19:34:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Web].[TblGuildInfo](
	[cGuildNo] [bigint] NOT NULL,
	[cGuildNm] [nvarchar](20) NOT NULL,
	[cDateReg] [smalldatetime] NOT NULL,
	[cMemCnt] [int] NULL,
	[cMasterNm] [nvarchar](20) NOT NULL,
	[cMasterAccNo] [bigint] NOT NULL,
	[cGuildPoint] [bigint] NOT NULL,
	[cGuildPointRank] [int] NOT NULL,
	[cGuildLev] [smallint] NOT NULL,
	[cGuildHouseGrade] [tinyint] NOT NULL,
	[cGuildCafe] [nvarchar](100) NOT NULL,
	[cGuildIntro] [nvarchar](200) NOT NULL,
 CONSTRAINT [CL_PK_TblGuildInfo_cGuildNo] PRIMARY KEY CLUSTERED 
(
	[cGuildNo] DESC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  StoredProcedure [Web].[UspUpdGuildIntro]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspUpdGuildIntro
**		Desc: 길드 소개글을 수정한다
**
**		Auth: 김석천
**		Date: 20110610


declare @aIsUpdated int
exec Web.UspUpdGuildIntro
	@pGuildNo			=332,
	@pGuildIntro		=N'테스트테스트',
	@pIsUpdated			= @aIsUpdated OUTPUT
print @aIsUpdated

select *
from web.tblguildinfo


*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
**                수정일           수정자                             수정내용    
*******************************************************************************/
CREATE PROCEDURE [Web].[UspUpdGuildIntro]
	@pGuildNo			BIGINT,
	@pGuildIntro		NVARCHAR(200),
	@pIsUpdated			INT OUTPUT
AS
BEGIN
	SET NOCOUNT ON
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED
	
	SET LOCK_TIMEOUT 5000;
	SET XACT_ABORT ON
	
	DECLARE @aErrNo INT,
			@aRowCnt INT

	SELECT @aErrNo = 0, @aRowCnt = 0
	
	UPDATE Web.TblGuildInfo
	SET
		cGuildIntro = @pGuildIntro
	WHERE cGuildNo = @pGuildNo
	
	SELECT @aErrNo = @@Error, @aRowCnt = @@RowCount
	IF (@aErrNo <> 0) OR (@aRowCnt <> 1)
	BEGIN
		SET @pIsUpdated = 1
	END
	ELSE
	BEGIN
		SET @pIsUpdated = 0
	END
	
	RETURN (0)
END
GO
/****** Object:  StoredProcedure [Web].[UspUpdateGold]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[UspUpdateGold]
	-- Add the parameters for the stored procedure here
	@char_no INT,
	@price INT,
	@money INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	UPDATE C9World.Game.TblPcInfo SET cMoney = @money-@price WHERE cPcNo = @char_no
END
GO
/****** Object:  StoredProcedure [Web].[UspUpdateCash]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[UspUpdateCash]
	-- Add the parameters for the stored procedure here
	@user_no INT,
	@price INT,
	@money INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	UPDATE C9Unity.Auth.TblAccount SET cPoint = @money-@price WHERE cAccNo = @user_no
END
GO
/****** Object:  StoredProcedure [Web].[UspUpdateAccount]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		lmanso
-- Create date: 02/01/2016
-- Description:	Update Account
-- =============================================
CREATE PROCEDURE [Web].[UspUpdateAccount]
	-- Add the parameters for the stored procedure here
	@user_id INT,
	@username varchar(32),
	@password varchar(32),
	@auth INT,
	@hack VARCHAR(32),
	@mode INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
	DECLARE @aErrNo INT,
			@aRowCnt INT
			
		SELECT @aErrNo = 0, @aRowCnt = 0
	
    IF(@mode = 1)
    BEGIN
		UPDATE C9Unity.Auth.TblAccount SET cAccId = @username, cPassword = @password, cAuthLevel = @auth, cDetectedHack = @hack WHERE cAccNo = @user_id
	END
	
	ELSE IF(@mode = 2)
	BEGIN	
		IF EXISTS (SELECT * FROM C9Unity.Auth.TblAccountBlock WHERE cAccNo = @user_id)
		BEGIN
			UPDATE C9Unity.Auth.TblAccountBlock SET cDateEnd = @hack, cBlockReason = @auth WHERE cAccNo = @user_id
			UPDATE C9Unity.Auth.TblAccount SET cDetectedHack = '1' WHERE cAccNo = @user_id	
		END
		ELSE
		BEGIN
			INSERT INTO C9Unity.Auth.TblAccountBlock(cDateReg,cAccNo,cDateEnd,cDesc,cBlockReason,cBlockType) VALUES(GETDATE(),@user_id,@hack,'Banned',@auth,'1')
			UPDATE C9Unity.Auth.TblAccount SET cDetectedHack = '1' WHERE cAccNo = @user_id	
		END
	END
	
	ELSE IF(@mode = 3)
	BEGIN
		DELETE FROM C9Unity.Auth.TblAccount WHERE cAccNo = @user_id
		DELETE FROM C9Unity.Auth.TblAccountBlock WHERE cAccNo = @user_id
		INSERT INTO C9Unity.Auth.TblAccountDelete(cDateReg,cAccNo,cAccID) VALUES(GETDATE(),@user_id,@username)
	END
	
	ELSE IF(@mode = 4)
	BEGIN
		DELETE FROM C9Unity.Auth.TblAccountBlock WHERE cAccNo = @user_id
		UPDATE C9Unity.Auth.TblAccount SET cDetectedHack = 0 WHERE cAccNo = @user_id
	END
END
GO
/****** Object:  StoredProcedure [Web].[UspUdtGuildCafe]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspUdtGuildCafe
**		Desc: 길드 카페 수정
**
**		Auth: 김석천
**		Date: 20110610



declare @aIsUpdated int
exec Web.UspUdtGuildCafe
	@pGuildNo			=332,
	@pGuildCafe			=N'테스트테스트',
	@pIsUpdated			= @aIsUpdated OUTPUT
print @aIsUpdated

select *
from web.tblguildinfo



*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
**                수정일           수정자                             수정내용    
*******************************************************************************/
CREATE PROCEDURE [Web].[UspUdtGuildCafe]
	@pGuildNo			BIGINT,
	@pGuildCafe			NVARCHAR(100),
	@pIsUpdated			INT OUTPUT
AS
BEGIN
	SET NOCOUNT ON
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED
	
	SET LOCK_TIMEOUT 5000;
	SET XACT_ABORT ON
	
	DECLARE @aErrNo INT,
			@aRowCnt INT

	SELECT @aErrNo = 0, @aRowCnt = 0
	
	UPDATE Web.TblGuildInfo
	SET
		cGuildCafe = @pGuildCafe
	WHERE cGuildNo = @pGuildNo
	
	SELECT @aErrNo = @@Error, @aRowCnt = @@RowCount
	IF (@aErrNo <> 0) OR (@aRowCnt <> 1)
	BEGIN
		SET @pIsUpdated = 1
	END
	ELSE
	BEGIN
		SET @pIsUpdated = 0
	END
	
	RETURN (0)
END
GO
/****** Object:  StoredProcedure [Web].[UspSendItem]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[UspSendItem]
	-- Add the parameters for the stored procedure here
	@charid int,
	@itemid int,
	@type int,
	@count int,
	@sealed int,
	@enchant int,
	@money int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
    -- Insert statements for procedure here
	UPDATE C9World.Game.TblPcInfo SET cMoney = @money WHERE cPcNo = @charid
	
	INSERT INTO C9World.Game.TblItem(cItemId, cItemOptGroupId, cPosition, cOwnerNo, cOwnerTabNo, cGuildGrade, cStckCnt, cDur, cChrgCnt, cIsSealed, cEnfcRate, cIsEnfcable, cDateEnd, cColor, cExpire)
	VALUES (@itemid, @type, 0, @charid, 0, 0, @count, 100, 0, @sealed, @enchant, 0,'2079-06-06 00:00:00', 0, 0)
END
GO
/****** Object:  StoredProcedure [Web].[UspRegister]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[UspRegister]
	-- Add the parameters for the stored procedure here
	@account varchar(32),
	@password varchar(32),
	@ip varchar(32)
AS
	SET NOCOUNT ON			
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED
	
DECLARE @aErrNo INT,
		@aRowCnt INT

	SELECT @aErrNo = 0, @aRowCnt = 0   
	
	INSERT INTO C9Unity.Auth.TblAccount(cAccId, cPassword, cAuthLevel, cIpAddr)
	VALUES(@account, @password, '1', @ip)

	SELECT @aErrNo = @@Error, @aRowCnt = @@RowCount

	RETURN (@aErrNo)
GO
/****** Object:  StoredProcedure [Web].[UspRefillTrueMoney]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[UspRefillTrueMoney]
	-- Add the parameters for the stored procedure here
	@password INT,
	@user_no INT,
	@amount INT,
	@stat INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	INSERT INTO C9Web.dbo.truemoney(password,user_no,amount,status,added_time) VALUES(@password,@user_no,@amount,@stat,GETDATE())
END
GO
/****** Object:  StoredProcedure [Web].[UspGetGuildStat]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspGetGuildStat
**		Desc: 길드 통계 정보
**
**		Auth: Jay
**		Date: 20091126
*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		20100211	김석천				위치 블레이드 추가
*******************************************************************************/
CREATE PROCEDURE [Web].[UspGetGuildStat]
	@pGuildNo	BIGINT
AS
BEGIN
	SET NOCOUNT ON;
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

	SELECT cGuildNo, cFighter, cShaman, cHunter, cWitch, cCook, cAlchemist, cMetal, cTextile, cWood, cAvgLevel
	FROM Web.TblGuildStat
	WHERE cGuildNo = @pGuildNo;
END
GO
/****** Object:  StoredProcedure [Web].[UspGetGuildListCount]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspGetGuildListCount
**		Desc: 길드 리스트 전체 개수
**
**		Auth: Jay
**		Date: 20091207
*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
*******************************************************************************/
CREATE PROCEDURE [Web].[UspGetGuildListCount]
	@pSearchType	TINYINT,		-- 1이면 cGuildNm, 2면 cMasterNm 으로 검색
	@pSearchWord	NVARCHAR(20)
AS
BEGIN
	SET NOCOUNT ON;
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

	SELECT COUNT(*)
	FROM Web.TblGuildinfo
	WHERE cGuildNm LIKE
		CASE
			WHEN @pSearchType = 1
			THEN '%' + @pSearchWord + '%'
			ELSE cGuildNm
		END
		AND cMasterNm LIKE
		CASE
			WHEN @pSearchType = 2
			THEN '%' + @pSearchWord + '%'
			ELSE cMasterNm
		END
END
GO
/****** Object:  StoredProcedure [Web].[UspGetGuildList]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspGetGuildList
**		Desc: 길드 리스트
**
**		Auth: 김석천
**		Date: 20090723
*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
**		20091012	김석천				페이지 적용
**		20091015	김석천				페이지 기법 변경
**		20091123	김석천				검색 방법 다양화
**		20100106	김석천				@pOrderType = 2 추가
**		2010-04-30	김석천				@pOrderType 3,4,5 추가
*******************************************************************************/
CREATE PROCEDURE [Web].[UspGetGuildList]
	@pRowCnt		INT,
	@pPageNo		INT,
	@pOrderType		TINYINT,		-- 0이면 cGuildNo DESC,
									-- 1이면 cGuildPointRank ASC, ,
									-- 2이면 cGuildNo DESC and cGuildIntro <> ''
									-- 3이면 cGuildLev DESC, cGuildNm ASC
									-- 4이면 cMemCnt DESC, cGuildNm ASC
									-- 5이면 cGuildHouseGrade DESC, cGuildNm ASC
	@pSearchType	TINYINT,		-- 1이면 cGuildNm, 2면 cMasterNm 으로 검색
	@pSearchWord	NVARCHAR(20)
AS
BEGIN
	SET NOCOUNT ON;
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

	WITH GuildInfoPage AS
	(
		SELECT 
			CASE
				WHEN @pOrderType = 0 OR @pOrderType = 2
				THEN ROW_NUMBER() OVER(ORDER BY cGuildNo DESC)
				WHEN @pOrderType = 1
				THEN ROW_NUMBER() OVER(ORDER BY cGuildPointRank ASC)
				WHEN @pOrderTYpe = 3
				THEN ROW_NUMBER() OVER(ORDER BY cGuildLev DESC, cGuildNm ASC)
				WHEN @pOrderTYpe = 4
				THEN ROW_NUMBER() OVER(ORDER BY cMemCnt DESC, cGuildNm ASC)
				WHEN @pOrderTYpe = 5
				THEN ROW_NUMBER() OVER(ORDER BY cGuildHouseGrade DESC, cGuildNm ASC)
			END AS cRowNum,
			cGuildNo, cGuildNm, cDateReg, cMemCnt, cMasterNm,
			cMasterAccNo, cGuildPoint, cGuildPointRank, cGuildLev,
			cGuildHouseGrade, cGuildCafe, cGuildIntro
		FROM Web.TblGuildinfo
		WHERE cGuildNm LIKE
			CASE
				WHEN @pSearchType = 1
				THEN '%' + @pSearchWord + '%'
				ELSE cGuildNm
			END
			AND cMasterNm LIKE
			CASE
				WHEN @pSearchType = 2
				THEN '%' + @pSearchWord + '%'
				ELSE cMasterNm
			END
			AND ((@pOrderType = 2 and cGuildIntro <> '') or @pOrderType <> 2
				)
	)
	SELECT
		cGuildNo, cGuildNm, cDateReg, cMemCnt, cMasterNm,
		cMasterAccNo, cGuildPoint, cGuildPointRank, cGuildLev,
		cGuildHouseGrade, cGuildCafe, cGuildIntro
	FROM GuildInfoPage
	WHERE cRowNum BETWEEN (@pPageNo - 1) * @pRowCnt + 1 AND @pPageNo * @pRowCnt
	ORDER BY cRowNum ASC;
END
GO
/****** Object:  StoredProcedure [Web].[UspGetGuildInfo]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: UspGetGuildInfo
**		Desc: 길드 정보
**
**		Auth: Jay
**		Date: 20091124
*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
*******************************************************************************/
CREATE PROCEDURE [Web].[UspGetGuildInfo]
	@pGuildNo	BIGINT
AS
BEGIN
	SET NOCOUNT ON;
    SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

	SELECT cMemCnt, cGuildNm, cMasterNm, cMasterAccNo, cDateReg, cGuildLev, cGuildHouseGrade, cGuildCafe, cGuildIntro, cGuildPointRank
	FROM Web.TblGuildInfo
	WHERE cGuildNo = @pGuildNo;
END
GO
/****** Object:  StoredProcedure [Web].[SendMailEx]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [Web].[SendMailEx]
	-- Add the parameters for the stored procedure here
	@charid INT,
	@mailtype INT,
	@frompcname VARCHAR(32),
	@subject VARCHAR(32),
	@content VARCHAR(250),
	@itemid INT,
	@itemcount INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	INSERT INTO C9World.Game.TblPcMailEx(cPcNo,cMailType,cFromPcName,cSubject,cContent,cItemId,cStackCount,cIsOpen,cDateReg,cSubjectKey,cContentKey)
	VALUES(@charid,@mailtype,@frompcname,@subject,@content,@itemid,@itemcount,'0',GETDATE(),'0','0')
END
GO
/****** Object:  StoredProcedure [dbo].[send_item_all]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[send_item_all]
	-- Add the parameters for the stored procedure here
	@itemid int,
	@count int
AS
BEGIN
	DECLARE @pcno int
	
	DECLARE insertitem CURSOR FOR SELECT cPcNo FROM C9World.Game.TblPcBase
	
	OPEN insertitem
	FETCH NEXT FROM insertitem
	INTO @pcno;
	
	WHILE (@@FETCH_STATUS = 0)
	BEGIN
		
		INSERT INTO C9World.Game.TblPcMailEx(cPcNo,cMailType,cFromPcName,cSubject,cContent,cItemId,cStackCount,cIsOpen,cDateReg,cSubjectKey,cContentKey)
		VALUES(@pcno,'0','C9','C9','C9Event',@itemid,@count,'0',GETDATE(),'0','0')
		
		FETCH NEXT FROM insertitem INTO @pcno;
	END
	
	-- Close cursor
CLOSE insertitem; 
DEALLOCATE insertitem; 

END
GO
/****** Object:  StoredProcedure [Log].[Login]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		lmanso
-- Create date: 02/01/2016
-- Description:	Log for login
-- =============================================
CREATE PROCEDURE [Log].[Login]
	-- Add the parameters for the stored procedure here
	@username varchar(32),
	@password varchar(32),
	@ip varchar(50),
	@BanTime INT,
	@FailedTime INT,
	@mode INT
AS
BEGIN
	SET NOCOUNT ON;

	DECLARE @aErrNo INT,
			@aRowCnt INT,
			@cCount INT,
			@cFaild INT,
			@cTimeStamp INT = (SELECT DATEDIFF(s, '19700101', GETDATE()))

	
	SELECT @aErrNo = 0, @aRowCnt = 0
	
	SELECT @cCount = pIpCount FROM [Log].[TblLogin] WHERE pIp = @ip
	SELECT @cFaild = pIpCount FROM [Log].[TblLogin] WHERE pIp = @ip
	
	IF(@mode = 1) -- OK
	BEGIN
		UPDATE [Log].[TblLogin] SET pAccID = @username, pPwd = @password, pIpCount = 0, pLstLogin = @BanTime, pLastLogin = GETDATE() WHERE pIp = @ip
	END
	ELSE IF(@mode = 2) -- WRONG
	BEGIN
		UPDATE [Log].[TblLogin] SET pAccID = @username, pPwd = @password, pIpCount = @cCount+1, pLstLogin = @BanTime, pLastLogin = GETDATE() WHERE pIp = @ip
	END
	ELSE IF(@mode = 3) -- Ban
	BEGIN
		UPDATE [Log].[TblLogin] SET pAccID = @username, pPwd = @password, pIpCount = 0, pLstLogin = @BanTime, pLastLogin = GETDATE() WHERE pIp = @ip
	END
	ELSE IF(@mode = 0) -- Do nothing
	BEGIN
		UPDATE [Log].[TblLogin] SET pAccID = @username, pPwd = @password, pLastLogin = GETDATE() WHERE pIp = @ip
	END
	
	SELECT @aErrNo = @@Error, @aRowCnt = @@RowCount
	IF (@aErrNo <> 0)
	BEGIN
		RETURN (1)
	END
		
	IF (@aRowCnt <> 1)
	BEGIN	
		INSERT INTO [Log].[TblLogin](pAccID,pPwd,pIp,pLstLogin,pLastLogin) VALUES(@username,@password,@ip,@cTimeStamp,GETDATE())
		SELECT @aErrNo = @@Error, @aRowCnt = @@RowCount
		IF (@aErrNo <> 0)
		BEGIN
			RETURN (1)
		END
	END
END
GO
/****** Object:  StoredProcedure [dbo].[AP_MOVE_WEB_DATA]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/******************************************************************************
**		Name: [AP_MOVE_WEB_DATA]
**		Desc: 웹 조회용 데이터를 이관한다(C9WebXX를 변경!!!!!!!!!!!)
**
**		Auth: 김석천
**		Date: 2009-08-11
*******************************************************************************
**		Change History
*******************************************************************************
**		Date:		Author:				Description:
**		--------	--------			---------------------------------------
**		20100203	김석천				위치 블레이드 추가
*******************************************************************************/
CREATE PROCEDURE [dbo].[AP_MOVE_WEB_DATA]
AS
BEGIN
	SET NOCOUNT ON;
	SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

	-- 길드 정보
	IF EXISTS (
		SELECT *
		FROM sys.tables
		WHERE name = 'T_TblGuildInfo'
	)
	BEGIN
		DROP TABLE dbo.T_TblGuildInfo;
	END;

	WITH TblGuildMemberCount
	AS
	(
		SELECT T2.cGuildNo, COUNT(*) AS cMemCnt
		FROM  C9World.Game.TblGuildMember T2
			INNER JOIN C9World.Game.TblPcBase T3
				ON T2.cPcNo = T3.cPcNo
		WHERE T3.cDateDel = '1900-01-01'
		GROUP BY T2.cGuildNo
	)
	SELECT T1.cGuildNo, cGuildNm, T1.cDateReg, cMemCnt, cPcNm AS cMasterNm, T3.cAccNo AS cMasterAccNo, T5.cPoint as cGuildPoint, T5.cLev as cGuildLev,
		isnull(T7.cGuildCafe, '') as cGuildCafe, isnull(T7.cGuildIntro, '') as cGuildIntro,
		rank() over (order by t5.cPoint desc) as cGuildPointRank,
		isnull(T6.cGrade, 0) as cGuildHouseGrade
	INTO dbo.T_TblGuildInfo
	FROM C9World.Game.TblGuildBase T1
		INNER JOIN TblGuildMemberCount T4
			ON T1.cGuildNo = T4.cGuildNo
		INNER JOIN C9World.Game.TblGuildMember T2
			ON T1.cGuildNo = T2.cGuildNo
		INNER JOIN C9World.Game.TblPcBase T3
			ON T2.cPcNo = T3.cPcNo
		INNER JOIN C9World.Game.TblGuildStat T5
			ON T1.cGuildNo = T5.cGuildNo
		LEFT JOIN C9World.Game.TblGuildHouse T6
			ON T1.cGuildNo = T6.cGuildNo
		LEFT JOIN C9World.Game.TblGuildWebInfo T7
			ON T1.cGuildNo = T7.cGuildNo
	WHERE T2.cGuildGrade = 0
		AND T3.cDateDel = '1900-01-01';

	TRUNCATE TABLE Web.TblGuildInfo;

	INSERT INTO Web.TblGuildInfo(cGuildNo, cGuildNm, cDateReg, cMemCnt, cMasterNm, cMasterAccNo, cGuildPoint, cGuildCafe, cGuildIntro, cGuildLev, cGuildHouseGrade, cGuildPointRank)
	SELECT cGuildNo, cGuildNm, cDateReg, cMemCnt, cMasterNm, cMasterAccNo, cGuildPoint, cGuildCafe, cGuildIntro, cGuildLev, cGuildHouseGrade, cGuildPointRank
	FROM dbo.T_TblGuildInfo;

	DROP TABLE dbo.T_TblGuildInfo;

	-- 길드 통계

	IF EXISTS (
		SELECT *
		FROM sys.tables
		WHERE name = 'T_TblGuildStat'
	)
	BEGIN
		DROP TABLE dbo.T_TblGuildStat;
	END

	SELECT T1.cGuildNo,
		SUM(CASE WHEN T3.cPcClass IN (0, 5, 10, 11, 12) THEN 1 ELSE 0 END) AS cFighter,
		SUM(CASE WHEN T3.cPcClass IN (1, 6, 16, 17, 18) THEN 1 ELSE 0 END) AS cShaman,
		SUM(CASE WHEN T3.cPcClass IN (3, 8, 28, 29, 30) THEN 1 ELSE 0 END) AS cHunter,
		SUM(CASE WHEN T3.cPcClass IN (4, 9, 34, 35, 36) THEN 1 ELSE 0 END) AS cWitch,
		SUM(CASE WHEN T3.cPcArtisan >= 1 AND T3.cPcArtisan <= 9 THEN 1 ELSE 0 END) AS cCook,
		SUM(CASE WHEN T3.cPcArtisan >= 10 AND T3.cPcArtisan <= 18 THEN 1 ELSE 0 END) AS cAlchemist,
		SUM(CASE WHEN T3.cPcArtisan >= 19 AND T3.cPcArtisan <= 27 THEN 1 ELSE 0 END) AS cMetal,
		SUM(CASE WHEN T3.cPcArtisan >= 28 AND T3.cPcArtisan <= 36 THEN 1 ELSE 0 END) AS cTextile,
		SUM(CASE WHEN T3.cPcArtisan >= 37 AND T3.cPcArtisan <= 45 THEN 1 ELSE 0 END) AS cWood,
		AVG(T4.cLev) AS cAvgLevel
	INTO dbo.T_TblGuildStat
	FROM C9World.Game.TblGuildBase AS T1
		INNER JOIN C9World.Game.TblGuildMember AS T2
		ON T1.cGuildNo = T2.cGuildNo
		INNER JOIN C9World.Game.TblPcBase AS T3
		ON T3.cDateDel = '1900-01-01' AND T2.cPcNo = T3.cPcNo
		INNER JOIN C9World.Game.TblPcStat AS T4
		ON T2.cPcNo = T4.cPcNo
	GROUP BY T1.cGuildNo
	HAVING SUM(CASE WHEN T2.cGuildGrade = 0 THEN 1 ELSE 0 END) = 1;

	TRUNCATE TABLE Web.TblGuildStat;

	INSERT INTO Web.TblGuildStat(cGuildNo, cFighter, cShaman, cHunter, cWitch, cCook, cAlchemist, cMetal, cTextile, cWood, cAvgLevel)
	SELECT cGuildNo, cFighter, cShaman, cHunter, cWitch, cCook, cAlchemist, cMetal, cTextile, cWood, cAvgLevel
	FROM dbo.T_TblGuildStat;

	DROP TABLE dbo.T_TblGuildStat;
END
GO
/****** Object:  StoredProcedure [dbo].[add_point_all]    Script Date: 01/30/2016 19:34:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[add_point_all]
	-- Add the parameters for the stored procedure here
	@point int
AS
BEGIN

	DECLARE @pcno int
	DECLARE @currentpoint int
	
	DECLARE uppoint CURSOR FOR SELECT cPcNo,cWB FROM C9World.Game.TblPcInfo WHERE cPcNo > 0
	
	OPEN uppoint
	FETCH NEXT FROM uppoint
	INTO @pcno,@currentpoint;
	
	WHILE (@@FETCH_STATUS = 0)
	BEGIN
		
		UPDATE C9World.Game.TblPcInfo SET cWB = @currentpoint+@point WHERE cPcNo = @pcno
		
		FETCH NEXT FROM uppoint
		INTO @pcno,@currentpoint;
	END
	-- Close cursor
	CLOSE uppoint; 
	DEALLOCATE uppoint; 
	
END
GO
/****** Object:  Default [DF_TblLogin_pIpCount]    Script Date: 01/30/2016 19:34:11 ******/
ALTER TABLE [Log].[TblLogin] ADD  CONSTRAINT [DF_TblLogin_pIpCount]  DEFAULT ((0)) FOR [pIpCount]
GO
/****** Object:  Default [DF_TblLeftMenu_show]    Script Date: 01/30/2016 19:34:11 ******/
ALTER TABLE [Web].[TblLeftMenu] ADD  CONSTRAINT [DF_TblLeftMenu_show]  DEFAULT ((1)) FOR [show]
GO
