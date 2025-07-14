#0. Kreirajte tablice (10) i veze izmeğu tablica. (3)

DROP database IF EXISTS Primjer3;
CREATE database Primjer3;
use Primjer3;

create table neprijatelj (

	id int not null primary key auto_increment,
	gustoca decimal(13,6) not null,
	treciputa datetime not null,
	novcica decimal(12,8),
	narukvica int not null,
	prijateljica int

);

create table prijateljica (

	id int not null primary key auto_increment,
	gustoca decimal(13,6),
	maraka decimal(14,9) not null,
	treciputa datetime,
	narukvica int not null
	
);

create table ostavljen (

	id int not null primary key auto_increment,
	ekstroventno bit,
	haljina varchar(42),
	nausnica int,
	narukvica int

);

create table djevojka (

	id int not null primary key auto_increment,
	lipa decimal(13,5),
	majica varchar(35) not null,
	indiferentno bit not null,
	kuna decimal(14,8),
	narukvica int not null

);


create table punica (

	id int not null primary key auto_increment,
	bojaociju varchar(40) not null,
	modelnaocala varchar(42) not null,
	ekstroventno bit,
	asocijalno bit,
	prstena int

);

alter table neprijatelj add foreign key (prijateljica) references prijateljica(id);


#1. Kreirati funkciju zadatak1 koja osigurava kako cjelobrojni tipovi podataka moraju biti izmeğu 1346 i 5367
#(7). Primjeniti funkciju u minimalno jednom upitu u proceduri ili okidaèu (7).

delimiter $$
create function Zadatak1(A int) returns int begin
	if (a > 1346 and a < 5367) then 
	return a;
	else 
	return null;
	end if;
end
$$
delimiter ;

insert into prijateljica (maraka, narukvica) values (1.1, Zadatak1(4000));
### ERROR --- insert into prijateljica (maraka, narukvica) values (1.1, Zadatak1(2)); --- ERROR ###
select * from prijateljica;


#2. Kreirajte proceduru zadatak2 koja unosi 33501 zapisa u tablicu ostavljen (7). Izvesti proceduru jednom
#tako da u tablici bude toèno 33501 zapisa (7).

delimiter $$
create procedure Zadatak2() 
begin 
	declare A int default 0;
	while (A < 33501) do 
	insert into ostavljen(id) values (0);
	set A=A+1;
	end while;
end;
$$
delimiter ;

select count(*) from ostavljen;
delete from ostavljen; 
call zadatak2;


#3. Kreirajte okidaè zadatak3 nakon insert-a u tablicu ostavljen tako da za svaki unos u tablicu ostavljen
#napravi po dva unosa u tablicu djevojka (7). Okidaè je u funkciji, tablica djevojka ima dvostruko više zapisa
#od tablice ostavljen (7).

delimiter $$ 
create trigger Zadatak3 after insert on ostavljen for each row 
begin 
	insert into djevojka (majica, indiferentno, narukvica) values ("",1,1),("",1,1);
end
$$
delimiter ;

select count(*) from djevojka;

#4. Kreirajte proceduru zadatak4 koja iz tablice ostavljen zbraja svaku 8 vrijednost id-a (1,8,16,...). U tablicu
#neprijatelj se unosi broj zapisa koji odgovaraju izraèunatoj sumi (7). Izvesti proceduru jednom tako da u
#tablici neprijatelj bude toèan broj zapisa koji odgovaraju sumi odabranih brojeva (8).
delimiter $$
create procedure Zadatak4(in BrojRedova int) 
begin 
	declare A int default 0;
    declare B int default 0;
    declare C int default 1;
   	declare D int default 0;
	while (A < BrojRedova) do
	set B = B+1;
	set A = A+1;
	if (B = 8) then 
	set B = 0;
	set C = C + A;
	end if;
	end while;
	if (A = BrojRedova) then 
	while (D < C) do
	insert into neprijatelj (gustoca, treciputa, narukvica) values(1.1, now(),1);
	set D = D+1;
	end while;
	end if;
end;
$$
delimiter ;
select count(*) from ostavljen; #33502
call Zadatak4(33502);## Previše
select count(*) from neprijatelj; 
