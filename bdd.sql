------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------


------------------------------------------------------------
-- Table: tableMN90
------------------------------------------------------------

CREATE TABLE public.tableMN90(
	idPalier       SERIAL NOT NULL ,
	depth_m        INT  NOT NULL ,
	duration_min   INT  NOT NULL ,
	15m            INT   ,
	12m            INT  NOT NULL ,
	9m             INT  NOT NULL ,
	6m             INT  NOT NULL ,
	3m             INT  NOT NULL ,
	DTR            INT  NOT NULL  ,
	CONSTRAINT tableMN90_PK PRIMARY KEY (idPalier)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: user
------------------------------------------------------------

CREATE TABLE public.user(
	idUser            SERIAL NOT NULL ,
	email             VARCHAR (50) NOT NULL ,
	password          VARCHAR (50) NOT NULL ,
	capacity_tank_L   INT  NOT NULL ,
	pressure_tank     INT  NOT NULL  ,
	CONSTRAINT user_PK PRIMARY KEY (idUser)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: profile
------------------------------------------------------------

CREATE TABLE public.profile(
	idProfile      SERIAL NOT NULL ,
	duration_min   INT  NOT NULL ,
	depth          INT  NOT NULL ,
	idUser         INT  NOT NULL  ,
	CONSTRAINT profile_PK PRIMARY KEY (idProfile)

	,CONSTRAINT profile_user_FK FOREIGN KEY (idUser) REFERENCES public.user(idUser)
)WITHOUT OIDS;



