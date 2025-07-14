#Zadaci za kolokvij_vjezba_21 (u zagradi je maksimalan broj bodova)

#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice ostavljen, cura i zena_brat unesite po 3 retka. (7)

#2. U tablici djevojka postavite svim zapisima kolonu maraka na
#vrijednost 15,74. (4)

#3. U tablici svekrva obrišite sve zapise èija je vrijednost kolone jmbag
#00000000007. (4)

#4. Izlistajte nausnica iz tablice cura uz uvjet da vrijednost kolone
#bojakose sadrže slova ana. (6)

#5. Prikažite hlace iz tablice brat, ostavljen iz tablice svekrva te
#ekstroventno iz tablice ostavljen uz uvjet da su vrijednosti kolone
#bojakose iz tablice cura poèinju slovom a te da su vrijednosti kolone
#drugiputa iz tablice zena poznate. Podatke posložite po ekstroventno
#iz tablice ostavljen silazno. (10)

#6. Prikažite kolone drugiputa i asocijalno iz tablice zena èiji se
#primarni kljuè ne nalaze u tablici zena_brat. (5)

drop database if exists Zadatak21;
create database Zadatak21;
use Zadatak21;


create table djevojka(

	sifra int auto_increment primary key,
	bojakose varchar(31) not null,
	maraka decimal(18,7) not null,
	indiferentno bit,
	kratkamajica varchar(30) not null,
	ogrlica int,
	mladic int 

);

create table mladic(

	sifra int auto_increment primary key,
	modelnaocala int,
	treciputa datetime,
	asocijalno bit,
	majica varchar(34)
);


create table zena(

	sifra int auto_increment primary key,
	kuna decimal(12,7),
	drugiputa datetime not null,
	asocijalno bit,
	jmbag char(11) not null,
	prviputa datetime not null,
	maraka decimal(17,5) not null

);

create table zena_brat(

	sifra int auto_increment primary key,
	zena int,
	brat int

);

create table brat(

	sifra int auto_increment primary key,
	gustoca decimal(14,10) not null,
	prviputa datetime,
	hlace varchar(31),
	stilfrizura varchar(38) not null,
	novcica decimal(13,5) not null,
	indiferentno bit not null

);


create table cura(

	sifra int auto_increment primary key,
	modelnaocala varchar(45) not null,
	bojakose varchar(35) not null,
	nausnica int,
	ogrlica int not null,
	dukserica varchar(43),
	stilfrizura varchar(39),
	zena int

);



create table ostavljen(

	sifra int auto_increment primary key,
	bojakose varchar(50) not null,
	ekstroventno bit,
	kratkamajica varchar(34),
	kuna decimal(13,5),
	maraka decimal(18,9),
	vesta varchar(38) not null,
	cura int not null

);


create table svekrva(

	sifra int auto_increment primary key,
	treciputa datetime not null,
	jmbag char(11) not null,
	gustoca decimal(18,9),
	ostavljen int

);


alter table svekrva add foreign key (ostavljen) references ostavljen(sifra);
alter table ostavljen add foreign key (cura) references cura(sifra);
alter table cura add foreign key (zena) references zena(sifra);
alter table zena_brat add foreign key (zena) references zena(sifra);
alter table zena_brat add foreign key (brat) references brat(sifra);
alter table djevojka add foreign key (mladic) references mladic(sifra);


######################
#1

insert into zena (drugiputa,jmbag,prviputa,maraka) values ('1999-09-08','12345678910','1999-09-09',1.1);
insert into brat (gustoca,stilfrizura,novcica,indiferentno) values (1.1,'stilfrizura',1.1,1),(1.1,'stilfrizura',1.1,1),(1.1,'stilfrizura',1.1,1);
insert into zena_brat (zena,brat) values (1,1);
insert into cura (modelnaocala,bojakose,ogrlica) values("Modelnaocala","bojakose",1),("Modelnaocala","bojakose",1),("Modelnaocala","bojakose",1);
insert into ostavljen (bojakose,maraka,vesta,cura) values ("Bojakose",1.1,"Vesta",1),("Bojakose",1.1,"Vesta",1),("Bojakose",1.1,"Vesta",1);


######################
#2

update djevojka set maraka = '15.74';

#########################
#3

delete from svekrva where jmbag = "00000000007";

#########################
#4
select nausnica from cura where bojakose like '%ana%';

########################
#5


select f.hlace, a.ostavljen, b.ekstroventno
from svekrva a
inner join ostavljen b on a.ostavljen = b.sifra
inner join cura c on c.sifra = b.cura
inner join zena d on c.zena = d.sifra
inner join zena_brat e on e.zena = d.sifra
inner join brat f on f.sifra = e.brat 
where c.bojakose like 'a%' and d.drugiputa is not null 
order by b.ekstroventno; 

#vrijeme 24:28


#######################
#6 

select a.drugiputa, a.asocijalno 
from zena a
left join zena_brat b on a.sifra = b.zena;
