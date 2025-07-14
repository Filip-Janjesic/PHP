#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice muskarac, zena i sestra_svekar unesite po 3 retka. (7)

#2. U tablici cura postavite svim zapisima kolonu gustoca na vrijednost
#15,77. (4)

#3. U tablici mladic obrišite sve zapise èija je vrijednost kolone kuna
#veæe od 15,78. (4)

#4. Izlistajte kratkamajica iz tablice zena uz uvjet da vrijednost kolone
#hlace sadrže slova ana. (6)

#5. Prikažite dukserica iz tablice svekar, asocijalno iz tablice mladic te
#hlace iz tablice muskarac uz uvjet da su vrijednosti kolone hlace iz
#tablice zena poèinju slovom a te da su vrijednosti kolone haljina iz
#tablice sestra sadrže niz znakova ba. Podatke posložite po hlace iz
#tablice muskarac silazno. (10)


DROP database IF EXISTS Zadatak_1;
CREATE database Zadatak_1;
use Zadatak_1;


create table sestra (

	sifra int primary key auto_increment,
	introventno bit not null,
	haljina varchar(31),
	maraka decimal(16,6) not null,
	hlace varchar(46),
	narukvica int

);

create table zena (

	sifra int primary key auto_increment,
	treciputa datetime not null,
	hlace varchar(46) not null,
	kratkamajica varchar(31),
	jmbag char(11),
	bojaociju varchar(39),
	haljina varchar(44) not null,
	sestra int 

);

create table punac (

	sifra int primary key auto_increment,
	ogrlica int not null,
	gustoca decimal(14,9) not null,
	hlace varchar(41)

);

create table cura (

	sifra int primary key auto_increment,
	novcica decimal(16,5),
	gustoca decimal(18,6),
	lipa decimal(13,10) not null,
	ogrlica int, 
	bojakose varchar(36) not null,
	suknja varchar(36) not null,
	punac int not null

);

create table sestra_svekar (

	sifra int primary key auto_increment,
	sestra int,
	svekar int

);

create table svekar (

	sifra int primary key auto_increment,
	bojaociju varchar(40),
	prstena int not null,
	dukserica varchar(41) not null,
	lipa decimal(13,8) not null,
	eura decimal (12,7) not null,
	majica varchar(35) not null

);

create table muskarac (

	sifra int primary key auto_increment,
	bojaociju varchar(50),
	hlace varchar (30)  not null,
	modelnaocala varchar(43) not null,
	maraka decimal(14,5),
	zena int

);

create table mladic (

	sifra int primary key auto_increment,
	suknja varchar(50),
	kuna decimal(16,8),
	drugiputa datetime not null,
	asocijalno bit not null,
	ekstroventno bit,
	dukserica varchar(48),
	muskarac int not null

);


alter table zena add foreign key (sestra) references sestra(sifra);
alter table sestra_svekar add foreign key (sestra) references sestra(sifra);
alter table sestra_svekar add foreign key (svekar) references svekar(sifra);
alter table muskarac add foreign key (zena) references zena(sifra);
alter table mladic add foreign key (muskarac) references muskarac(sifra);
alter table cura add foreign key (punac) references punac(sifra);

#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice muskarac, zena i sestra_svekar unesite po 3 retka. (7)

#2. U tablici cura postavite svim zapisima kolonu gustoca na vrijednost
#15,77. (4)

#3. U tablici mladic obrišite sve zapise èija je vrijednost kolone kuna
#veæe od 15,78. (4)

#4. Izlistajte kratkamajica iz tablice zena uz uvjet da vrijednost kolone
#hlace sadrže slova ana. (6)

#5. Prikažite dukserica iz tablice svekar, asocijalno iz tablice mladic te
#hlace iz tablice muskarac uz uvjet da su vrijednosti kolone hlace iz
#tablice zena poèinju slovom a te da su vrijednosti kolone haljina iz
#tablice sestra sadrže niz znakova ba. Podatke posložite po hlace iz
#tablice muskarac silazno. (10)



#############################
#1

insert into muskarac (hlace, modelnaocala) values 
('hlace1','modelhlaca1'),
('hlace2','modelhlaca2'),
('hlace3','modelhlaca3');

insert into sestra (introventno, maraka) values 
(1,1.46);


insert into zena (treciputa, hlace,haljina,sestra) values 
('1999-05-08','hlace1','haljina1',1),
('1999-05-09','hlace2','haljin2',1),
('1999-05-10','hlace3','haljina3',1);

insert into svekar (prstena, dukserica,lipa,eura,majica) values 
(1,'dukserica1',1.1,1.2,'Majica1');

insert into sestra_svekar (sestra, svekar) values 
(1,1),
(1,1),
(1,1);



#############################
#2

insert into punac (ogrlica, gustoca) values 
(1,1.1);


insert into cura (lipa, bojakose, suknja,punac) values 
(1.1,'bojakose1','suknja1',1),
(1.3,'bojakose2','suknja2',1),
(1.2,'bojakose3','suknja3',1);


update cura set gustoca = 15.78;

select * from cura;


#############################
#3

insert into mladic (drugiputa, asocijalno, muskarac) values 
('1983-02-01',1,1);


delete from mladic where kuna > 15.78;



#############################
#4

select * from zena where kratkamajica like '%ana%';


#############################
#5


select f.dukserica, d.asocijalno, c.hlace
from sestra a 
inner join zena b on a.sifra = b.sestra
inner join muskarac c on b.sifra = c.zena
inner join mladic d on c.sifra = d.muskarac
inner join sestra_svekar e on a.sifra= e.sestra
inner join svekar f on e.svekar = f.sifra
where b.hlace like 'a%' and a.haljina like '%ba%' order by c.hlace desc;


#Vrijeme 46:59