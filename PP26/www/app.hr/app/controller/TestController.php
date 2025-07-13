<?php

class TestController
{


    public function lozinka()
    {
        echo password_hash('edunova',PASSWORD_BCRYPT);
    }

    public function email()
    {

        
        echo Util::is_email('tjakopec@gmail.com') ? 'OK' : 'NE'; 
        
    }

    public function zbroj()
    {

        
        echo ((0.1 + 0.2) === 0.3) ? 'DA' : 'NE'; 
        
    }

    public function dodajpolaznike()
    {
        for($i=0;$i<300;$i++){
            Polaznik::create([
                'ime'=>'Polaznik ' . $i,
                'prezime'=>'Prezime',
                'oib'=>'',
                'email'=>'',
                'brojugovora'=>''
            ]);
            echo $i . '<br>';
        }

        
    }

    public function faker()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('hr_HR');
        // generate data by calling methods

        for($i=20;$i<3000;$i++){
            Polaznik::create([
                'sifra'=>$i,
                'ime'=>$faker->firstname(),
                'oib'=>'',
                'prezime'=>$faker->lastname(),
                'email'=>$faker->unique()->email,
                'brojugovora'=>$faker->randomDigit
            ]);
        }

        
    }

}