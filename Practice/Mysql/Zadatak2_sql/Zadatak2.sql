#Zadaci za kolokvij_vjezba_2 (u zagradi je maksimalan broj bodova)

#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice neprijatelj, cura i decko_zarucnica unesite po 3 retka. (7)

#2. U tablici prijatelj postavite svim zapisima kolonu treciputa na
#vrijednost 30. travnja 2020. (4) 

#3. U tablici brat obrišite sve zapise èija je vrijednost kolone ogrlica
#razlièito od 14. (4)

#4. Izlistajte suknja iz tablice cura uz uvjet da vrijednost kolone
#drugiputa nepoznate. (6)

#5. Prikažite novcica iz tablice zarucnica, neprijatelj iz tablice brat te
#haljina iz tablice neprijatelj uz uvjet da su vrijednosti kolone
#drugiputa iz tablice cura poznate te da su vrijednosti kolone vesta iz
#tablice decko sadrže niz znakova ba. Podatke posložite po haljina iz
#tablice neprijatelj silazno. (10)

DROP database IF EXISTS zadatak2;
CREATE database zadatak2;
use zadatak2;


create table decko (

	sifra int primary key auto_increment,
	indiferentno bit not null,
	vesta varchar(34) not null,
	asocijalno bit
	
);

create table decko_zarucnica (

	sifra int primary key auto_increment,
	decko int,
	zarucnica int

);



create table cura (

	sifra int primary key auto_increment,
	haljina varchar(33),
	drugiputa datetime,
	suknja varchar(38) not null,
	narukvica int not null,
	introventno bit not null,
	majica varchar(40),
	decko int not null

);


create table prijatelj (

	sifra int primary key auto_increment,
	modelnaocala varchar(37) not null,
	treciputa datetime,
	ekstroventno bit,
	prviputa datetime not null,
	svekar int

);


create table svekar (

	sifra int primary key auto_increment,
	stilfrizura varchar(48) not null,
	ogrlica int, 
	asocijalno bit

);


create table zarucnica (

	sifra int primary key auto_increment,
	narukvica int not null,
	bojakose varchar(37),
	novcica decimal(15,9) not null,
	lipa decimal(15,8),
	indiferentno bit

);


create table brat (

	sifra int primary key auto_increment,
	suknja varchar(47) not null,
	ogrlica int,
	asocijalno bit,
	neprijatelj int

);


create table neprijatelj (

	sifra int primary key auto_increment,
	majica varchar(32) not null,
	haljina varchar(43),
	lipa decimal(16,8) not null,
	modelnaocala varchar(49),
	kuna decimal(12,6),
	jmbag char(11) not null,
	cura int not null

);



alter table prijatelj add foreign key (svekar) references svekar(sifra); 
alter table decko_zarucnica add foreign key (decko) references decko(sifra);
alter table decko_zarucnica add foreign key (zarucnica) references zarucnica(sifra);
alter table cura add foreign key (decko) references decko(sifra);
alter table neprijatelj add foreign key (cura) references cura(sifra);
alter table brat add foreign key (neprijatelj) references neprijatelj(sifra);



##########################
#1


insert into decko (indiferentno,vesta) values (1,"vesta1");
insert into zarucnica (narukvica,novcica) values (1,1.1);

insert into decko_zarucnica (decko,zarucnica) values (1,1), (1,1),(1,1);

insert into cura (suknja,narukvica,introventno,decko) values ("suknja1",1,1,1), ("suknja2",1,1,1), ("suknja3",1,1,1);

insert into neprijatelj (majica,lipa,jmbag,cura) values ("majica1",1.2,12345678910,1), ("majica3",1.2,12345678910,1), ("majica2",1.2,12345678910,1);


##########################
#2

insert into prijatelj (modelnaocala,prviputa) values ("modelnaocala1", '1999-02-02');

update prijatelj set treciputa = '2020-04-30';

##########################
#3

delete from brat where ogrlica != 14;


##########################
#4

select suknja from cura where drugiputa is null;

##########################
#5



select c.novcica, f.neprijatelj,e.haljina
from decko a 
inner join decko_zarucnica b on a.sifra = b.decko
inner join zarucnica c on c.sifra = b.zarucnica
inner join cura d on a.sifra = d.decko
inner join neprijatelj e on e.cura = d.sifra
inner join brat f on f.neprijatelj = e.sifra
where d.drugiputa is not null and a.vesta like '%ba%' order by e.haljina desc;



#Vrijeme 37:42








