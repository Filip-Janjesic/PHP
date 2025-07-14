DROP database IF EXISTS Primjer2;
CREATE database Primjer2;
USE Primjer2;


CREATE TABLE muskarac(

	id int PRIMARY KEY NOT NULL auto_increment,
	eura decimal(15,7) NOT NULL,
	haljina varchar(41) NOT NULL,
	bojakose varchar(34) NOT NULL,
	narukvica int,
	prijatelj int NOT NULL

);

CREATE TABLE prijatelj(

	id int PRIMARY KEY NOT NULL auto_increment,
	gustocva decimal(15,7),
	suknja varchar(41) NOT NULL,
	asocijalno bit NOT NULL,
	majica varchar(48),
	prstena int NOT NULL

);

CREATE TABLE becar(

	id int PRIMARY KEY NOT NULL auto_increment,
	maraka decimal(12,10),
	treciputa datetime not null,
	ekstroventno bit not null,
	naucnica int

);

CREATE TABLE ostavljen(

	id int PRIMARY KEY NOT NULL auto_increment,
	ekstroventno bit not null,
	bojaociju varchar(41) NOT NULL,
	nausnica int NOT NULL,
	gustoca decimal(16,7),
	narukvica int
);

create table zarucnik(

	id int primary key auto_increment not null,
	kratkamajica varchar(44),
	lipa decimal(15,8),
	ekstroventno bit not null,
	ogrlica int not null,
	narukvica int

);


alter table muskarac add foreign key (prijatelj) references prijatelj(id);


#1. Kreirati funkciju zadatak1 koja osigurava kako cjelobrojni tipovi podataka moraju biti izmeğu 1076 i 4697
#(7). Primjeniti funkciju u minimalno jednom upitu u proceduri ili okidaèu (7).

delimiter $$
create function Zadatak1(a int) returns int begin
	if(a > 1076 and a < 4697) then 
	return a;
	else
		return null;
	end if;
	
end
$$
delimiter ;

drop function Zadatak1;

insert into becar(id, treciputa,ekstroventno,naucnica) values (Zadatak1(1),now(),1,Zadatak1(1100));

select * from becar;


#2. Kreirajte proceduru zadatak2 koja unosi 24064 zapisa u tablicu becar (7). Izvesti proceduru jednom tako
#da u tablici bude toèno 24064 zapisa (7).

delete from becar;


delimiter $$
create procedure zadatak2()
begin
	declare a int default 0;
	while (a <= 24064) do
	insert into becar(treciputa,ekstroventno,naucnica) values (now(),1,Zadatak1(a));
	set a = a+1;
	end while;
end;
$$
delimiter $$
select count(*) from zarucnik;
call zadatak2();


#3. Kreirajte okidaè zadatak3 nakon insert-a u tablicu zarucnica tako da za svaki unos u tablicu zarucnica
#napravi po dva unosa u tablicu punac (7). Okidaè je u funkciji, tablica punac ima dvostruko više zapisa od
#tablice zarucnica (7).

delimiter $$
create trigger unos_zarucnik after insert on becar for each row 
begin 
	insert into zarucnik (ekstroventno,narukvica) values (1,Zadatak1(1)),(1,Zadatak1(1));
end;
$$
delimiter ;



