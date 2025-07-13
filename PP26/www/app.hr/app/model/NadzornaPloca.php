<?php

class NadzornaPloca
{

    public static function trazi($uvjet)
    {

        $veza = DB::getInstance();
        $izraz = $veza->prepare('
        
                        select sifra, \'smjer\' as vrsta,
                        naziv as tekst from smjer
                        where naziv like :uvjet
                    union
                        select sifra, \'grupa\' as vrsta,
                        naziv as tekst from grupa
                        where naziv like :uvjet
                    union
                        select 	a.sifra, \'polaznik\' as vrsta,
                        concat(b.ime, \' \', b.prezime) as tekst
                        from 
                        polaznik a 
                        inner join osoba b on a.osoba=b.sifra
                        where concat(b.ime, \' \', b.prezime) like :uvjet
                    union
                        select 	a.sifra, \'predavac\' as vrsta,
                        concat(b.ime, \' \', b.prezime) as tekst
                        from 
                        predavac a 
                        inner join osoba b on a.osoba=b.sifra  
                        where concat(b.ime, \' \', b.prezime) like :uvjet
                
        ');
        $izraz->execute(['uvjet'=>'%' . $uvjet . '%']);
        return $izraz->fetchAll(); 
    

    }
}