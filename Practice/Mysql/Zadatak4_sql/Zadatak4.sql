#Zadaci za kolokvij_vjezba_4 (u zagradi je maksimalan broj bodova)

#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice becar, snasa i zena_mladic unesite po 3 retka. (7)

#2. U tablici punac postavite svim zapisima kolonu majica na
#vrijednost Osijek. (4)

#3. U tablici prijatelj obrišite sve zapise èija je vrijednost kolone
#prstena veæe od 17. (4)

#4. Izlistajte haljina iz tablice snasa uz uvjet da vrijednost kolone
#treciputa nepoznate. (6)

#5. Prikažite nausnica iz tablice mladic, jmbag iz tablice prijatelj te
#kratkamajica iz tablice becar uz uvjet da su vrijednosti kolone
#treciputa iz tablice snasa poznate te da su vrijednosti kolone lipa iz
#tablice zena razlièite od 29. Podatke posložite po kratkamajica iz
#tablice becar silazno. (10)

DROP database IF EXISTS Zadatak4;
CREATE database Zadatak4;
use Zadatak4;



CREATE TABLE punac(

	sifra int auto_increment PRIMARY KEY,
	treciputa datetime NOT NULL,
	majica varchar(46) NOT NULL,
	jmbag char(11),
	novcica decimal(18,7),
	maraka decimal(12,6),
	ostavljen int

);

CREATE TABLE ostavljen(

	sifra int auto_increment PRIMARY KEY,
	modelnaocala varchar(43) not null,
	introventno bit not null,
	kuna decimal(14,10) not null

);


CREATE TABLE zena(

	sifra int auto_increment PRIMARY KEY,
	suknja varchar(39),
	lipa decimal(18,7) not null,
	prstena int

);


CREATE TABLE zena_mladic(

	sifra int auto_increment PRIMARY KEY,
	zena int,
	mladic int

);

CREATE TABLE mladic(

	sifra int auto_increment PRIMARY KEY,
	kuna decimal(15,9) not null,
	lipa decimal(18,5) not null,
	nausnica int not null,
	stilfrizura varchar(49) not null,
	vesta varchar(34) 

);


CREATE TABLE snasa(

	sifra int auto_increment PRIMARY KEY,
	introventno bit not null,
	treciputa datetime not null,
	haljina varchar(44),
	zena int

);


CREATE TABLE becar(

	sifra int auto_increment PRIMARY KEY,
	novcica decimal(14,8) not null,
	kratkamajica varchar(48),
	bojaociju varchar(36),
	snasa int

);


CREATE TABLE prijatelj(

	sifra int auto_increment PRIMARY KEY,
	eura decimal(16,9) not null,
	prstena int,
	gustoca decimal(16,5) not null,
	jmbag char(11),
	suknja varchar(47),
	becar int

);


alter table punac add foreign key (ostavljen) references ostavljen(sifra);
alter table prijatelj add foreign key (becar) references becar(sifra);
alter table becar add foreign key (snasa) references snasa(sifra);
alter table snasa add foreign key (zena) references zena(sifra);
alter table zena_mladic add foreign key (zena) references zena(sifra);
alter table zena_mladic add foreign key (mladic) references mladic(sifra);





#######################
#1

insert into zena (lipa) values (1.1);
insert into mladic (kuna,lipa,nausnica,stilfrizura) values (1.1,2.2,3,"stilfrizura");
insert into zena_mladic (zena,mladic) values (1,1),(1,1),(1,1);
insert into snasa (introventno,treciputa) values (1,"1999-09-09"),(1,"1999-09-09"),(1,"1999-09-09");

insert into becar (novcica,snasa) values (1.1,1),(1.1,1),(1.1,1);

#######################
#2

update punac set majica ="Osijek";

#######################
#3

delete from prijatelj where prstena > 17;

#######################
#4

select haljina from snasa where treciputa is null;

#######################
#5

select f.nausnica, a.jmbag, b.kratkamajica
from prijatelj a 
inner join becar b on a.becar =b.sifra
inner join snasa c on b.snasa = c.sifra
inner join zena d on c.zena = d.sifra
inner join zena_mladic e on e.zena = d.sifra
inner join mladic f on  f.sifra = e.mladic
where c.treciputa is not null and d.lipa <> 29 order by b.kratkamajica desc;




#vrijeme 22:58



