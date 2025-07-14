#0. Kreirajte tablice (10) i veze izmeðu tablica. (3)
#1. Kreirati funkciju zadatak1 koja osigurava kako cjelobrojni tipovi podataka moraju biti izmeðu 980 i 5098 
#(7). Primjeniti funkciju u minimalno jednom upitu u proceduri ili okidaèu (7). 
#2. Kreirajte proceduru zadatak2 koja unosi 56872 zapisa u tablicu zarucnica (7). Izvesti proceduru jednom 
#tako da u tablici bude toèno 56872 zapisa (7). 
#3. Kreirajte okidaè zadatak3 nakon insert-a u tablicu zarucnica tako da za svaki unos u tablicu zarucnica 
#napravi po dva unosa u tablicu punac (7). Okidaè je u funkciji, tablica punac ima dvostruko više zapisa od 
#tablice zarucnica (7).
#4. Kreirajte proceduru zadatak4 koja iz tablice zarucnica zbraja svaku 7 vrijednost id-a (1,7,14,...). U tablicu 
#muskarac se unosi broj zapisa koji odgovaraju izraèunatoj sumi (7). Izvesti proceduru jednom tako da u 
#tablici muskarac bude toèan broj zapisa koji odgovaraju sumi odabranih brojeva (8).

DROP database IF EXISTS Zadatak1_Procedure_okidaci_funkcije;
CREATE database Zadatak1_Procedure_okidaci_funkcije;
use Zadatak1_Procedure_okidaci_funkcije;


create table muskarac (

	id int primary key auto_increment not null,
	maraka decimal(17,7) not null,
	hlace varchar(45) not null,
	prstena int not null,
	nausnica int,
	neprijateljica int not null

);

create table neprijateljica (

	id int primary key auto_increment not null,
	indiferentno bit not null,
	modelnaocala varchar(39) not null,
	maraka decimal(12,10) not null,
	kratkamajica varchar(32) not null,
	ogrlica int

);

create table sestra (

	id int primary key auto_increment not null,
	introventno bit not null,
	carape varchar(41),
	suknja varchar(41),
	narukvica int not null

);

create table punac (

	id int primary key auto_increment not null,
	modelnaocala varchar(39),
	treciputa datetime,
	drugiputa datetime,
	novcica decimal(14,6) not null,
	narukvica int

);

create table zarucnica (

	id int primary key auto_increment not null,
	stilfrizura varchar(40),
	prstena int not null,
	gustoca decimal(14,5),
	modelnaocala varchar(35) not null,
	nausnica int not null

);




alter table muskarac add foreign key (neprijateljica) references neprijateljica(id);



#1. Kreirati funkciju zadatak1 koja osigurava kako cjelobrojni tipovi podataka moraju biti izmeðu 980 i 5098 

insert into sestra (id,introventno,narukvica) values (1000,1,1);
select * from sestra;

DELIMITER $$
create function tipovi(a int) returns int begin 
	return a between 980 and 5098;
end;
$$ 
DELIMITER ;
  

#2. Kreirajte proceduru zadatak2 koja unosi 56872 zapisa u tablicu zarucnica (7). Izvesti proceduru jednom 
#tako da u tablici bude toèno 56872 zapisa (7). 

delimiter $$
create procedure Zapis()
begin
declare i int default 0;
while (i <=56872) do 
	insert into zarucnica(prstena,modelnaocala,nausnica) values(i,i,i);
	set i = i+1;
end while;
end;
$$
delimiter ;
select count(*) from zarucnica;

#3. Kreirajte okidaè zadatak3 nakon insert-a u tablicu zarucnica tako da za svaki unos u tablicu zarucnica 
#napravi po dva unosa u tablicu punac (7). Okidaè je u funkciji, tablica punac ima dvostruko više zapisa od 
#tablice zarucnica (7).

delimiter $$
create trigger unos_zarucnice after insert on zarucnica for each row 
begin 
	insert into punac (novcica) values (1.1),(1.1);
end;
$$
delimiter ;




