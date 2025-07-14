DROP database IF EXISTS Zadatak10;
CREATE database Zadatak10;
use Zadatak10;


create table zarucnica (

	Sifra int primary key auto_increment,
	treciputa datetime not null,
	prviputa datetime not null,
	suknja varchar(32),
	eura decimal(16,10) not null

);

create table sestra (

	sifra int primary key auto_increment,
	suknja varchar(46),
	bojaociju varchar(46) not null,
	indeferentno bit not null,
	dukserica varchar(32),
	drugiputa datetime not null,
	prviputa datetime not null,
	zarucnica int not null
	
);

create table punac(

	sifra int primary key auto_increment,
	lipa decimal(15,6) not null,
	eura decimal(15,10),
	stilfrizura varchar(37)

);

create table svekrva(

	sifra int primary key auto_increment,
	eura decimal(17,9) not null,
	carape varchar(43) not null,
	kuna decimal (13,9) not null,
	majica varchar(30) not null,
	indiferentno bit,
	punac int not null
	
);

create table mladic(

	sifra int primary key auto_increment,
	hlace varchar(48),
	lipa decimal(18,6) not null,
	stilfrizura varchar(48),
	prstena int not null,
	majica decimal(12,6),
	svekrva int not null

);

create table zena(

	sifra int primary key auto_increment,
	bojaociju varchar(49),
	maraka decimal(13,9),
	majica varchar(35) not null,
	indiferentno bit not null,
	prviputa datetime not null,
	mladic int not null
);

create table punac_neprijatelj(

	sifra int primary key auto_increment,
	punac int,
	neprijatelj int

);

create table neprijatelj(

	sifra int primary key auto_increment,
	gustoca decimal (15,10),
	dukserica varchar(32),
	maraka decimal(15,7) not null,
	stilfrizura varchar(40)
	

);

alter table sestra add foreign key (zarucnica) references zarucnica(sifra);
alter table zena add foreign key (mladic) references mladic(sifra);
alter table mladic add foreign key (svekrva) references svekrva(sifra);
alter table svekrva add foreign key (punac) references punac(sifra);
alter table punac_neprijatelj add foreign key (punac) references punac(sifra);
alter table punac_neprijatelj add foreign key (neprijatelj) references neprijatelj(sifra);


#1. U tablice mladic, svekrva i punac_neprijatelj unesite po 3 retka. (7)

insert into neprijatelj (maraka) values (1.1);
insert into punac (lipa,stilfrizura) values (1.1,"Stilfrizura");
insert into punac_neprijatelj (punac,neprijatelj) values (1,1),(1,1),(1,1);
insert into svekrva (eura,carape,kuna,majica,punac) values (1.1, "carape", 1.1, "majica",1);
insert into mladic (lipa,prstena,svekrva) values (1.1,1,1),(1.1,1,1),(1.1,1,1);


#2. U tablici sestra postavite svim zapisima kolonu bojaociju na vrijednost Osijek. (4)
update sestra set bojaociju = 'Osijek';


#3. U tablici zena obrišite sve zapise èija je vrijednost kolone maraka
#razlièito od 14,81. (4)

delete from zena where maraka = '14,81';

#4. Izlistajte kuna iz tablice svekrva uz uvjet da vrijednost kolone carape sadrže slova ana. (6)

select kuna from svekrva where carape like '%ana%';

#5. Prikažite maraka iz tablice neprijatelj, indiferentno iz tablice zena
#te lipa iz tablice mladic uz uvjet da su vrijednosti kolone carape iz
#tablice svekrva poèinju slovom a te da su vrijednosti kolone eura iz
#tablice punac razlièite od 22. Podatke posložite po lipa iz tablice
#mladic silazno. (10)

select f.maraka, a.indiferentno, b.lipa
from zena a
inner join mladic b on a.mladic = b.sifra 
inner join svekrva c on b.svekrva = c.sifra
inner join punac d on c.punac = d.sifra
inner join punac_neprijatelj e on d.sifra=e.punac
inner join neprijatelj f on f.sifra = e.neprijatelj
where c.carape like 'a%' and d.eura != 22 order by b.lipa DESC;

#6. Prikažite kolone eura i stilfrizura iz tablice punac èiji se primarni
#kljuè ne nalaze u tablici punac_neprijatelj. (5)

select a.eura, a.stilfrizura
from punac a 
left join punac_neprijatelj b on a.sifra = b.punac;