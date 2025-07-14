

#
#Zadaci za kolokvij_vjezba_3 (u zagradi je maksimalan broj bodova)

#0. Kreirajte tablice (16) i veze izmeðu tablica. (6)

#1. U tablice snasa, ostavljena i prijatelj_brat unesite po 3 retka. (7)

#2. U tablici svekar postavite svim zapisima kolonu suknja na
#vrijednost Osijek. (4)

#3. U tablici punica obrišite sve zapise èija je vrijednost kolone
#kratkamajica jednako AB. (4)

#4. Izlistajte majica iz tablice ostavljena uz uvjet da vrijednost kolone
#lipa nije 9,10,20,30 ili 35. (6)

#5. Prikažite ekstroventno iz tablice brat, vesta iz tablice punica te
#kuna iz tablice snasa uz uvjet da su vrijednosti kolone lipa iz tablice
#ostavljena razlièito od 91 te da su vrijednosti kolone haljina iz tablice
#prijatelj sadrže niz znakova ba. Podatke posložite po kuna iz tablice
#snasa silazno. (10)
#

drop database if exists Zadatak3;
create database Zadatak3;
use Zadatak3;

create table svekar (

sifra int primary key auto_increment,
novcica decimal(16,8),
suknja varchar(44),
bojakose varchar(36) not null,
prstena int not null,
narukvica int,
cura int

);


create table cura (

sifra int primary key auto_increment,
dukserica varchar(49) not null,
marka decimal(13,7) not null,
drugiputa datetime not null,
majica varchar(49) not null,
novcica decimal(15,8) not null,
orglica int

);


create table ostavljena (

sifra int primary key auto_increment,
kuna decimal(17,5) not null,
lipa decimal(15,6) not null,
majica varchar(36) not null,
modelnaocala varchar(31),
prijatelj int

);

create table prijatelj (

sifra int primary key auto_increment,
kuna decimal(16,10) not null,
haljina varchar(37) not null,
lipa decimal(15,6) not null,
dukserica varchar(31),
introventno bit


);

create table snasa (

sifra int primary key auto_increment,
introventno bit not null,
kuna decimal(15,6),
eura decimal(12,9),
treciputa datetime not null,
ostavljena int

);

create table prijatelj_brat (

sifra int primary key auto_increment,
prijatelj int,
brat int

);

create table brat (

sifra int primary key auto_increment,
jmbag char(11) not null,
ogrlica int, 
ekstroventno bit 

);

create table punica (

sifra int primary key auto_increment,
asocijalno bit not null,
kratkamajica varchar(44) not null,
kuna decimal(18,8),
vesta varchar(32),
snasa int not null

);


alter table svekar add foreign key (cura) references cura(sifra);
alter table ostavljena add foreign key (prijatelj) references prijatelj(sifra);
alter table snasa add foreign key (ostavljena) references ostavljena(sifra);
alter table punica add foreign key (snasa) references snasa(sifra); 
alter table prijatelj_brat add foreign key (prijatelj) references prijatelj(sifra);
alter table prijatelj_brat add foreign key (brat) references brat(sifra);







#############################
#1

insert into prijatelj (kuna,haljina,lipa,dukserica) values (1.1,'haljina',1.1,'dukserica');
insert into ostavljena (kuna,lipa,majica,prijatelj) values (1.1,1.1,'majica',1),(1.1,1.1,'majica',1),(1.1,1.1,'majica',1);

insert into snasa (introventno,treciputa) values (1, '1999-09-09'),(0, '1999-09-09'),(1, '1999-09-09');
insert into brat (jmbag) values ('12345678910');
insert into prijatelj_brat (prijatelj,brat) values (1,1),(1, 1),(1,1);

#############################
#2
update svekar set suknja= 'Osijek';

#############################
#3
delete from punica where kratkamajica = 'AB';

#############################
#4

select majica from ostavljena where lipa !=9 and lipa != 10 and lipa != 20 and lipa != 30 and lipa != 35;

#############################
#5

select f.ekstroventno, a.vesta, b.kuna
from punica a 
inner join snasa b on a.snasa = b.sifra
inner join ostavljena c on b.ostavljena = c.sifra
inner join prijatelj d on c.prijatelj = d.sifra
inner join prijatelj_brat e on d.sifra = e.prijatelj
inner join brat f on e.brat = f.sifra
where c.lipa <> 91 and d.haljina like '%ba%' order by b.kuna;


#vrijeme 29:57




