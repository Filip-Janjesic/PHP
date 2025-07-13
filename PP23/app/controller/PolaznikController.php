<?php

class PolaznikController extends AutorizacijaController
{
    private $viewDir = 'privatno' . DIRECTORY_SEPARATOR . 
    'polaznik' . DIRECTORY_SEPARATOR;

    private $slikaDir = BP . DIRECTORY_SEPARATOR . 
    'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR .
    'polaznik' . DIRECTORY_SEPARATOR;

    private $polaznik;
    private $poruka;

    public function index()
    {
        if(!isset($_GET['stranica'])){
            $stranica=1;
        }else{
            $stranica=(int)$_GET['stranica'];
        }
        if($stranica===0){
            $stranica=1;
        }

        if(!isset($_GET['uvjet'])){
            $uvjet='';
        }else{
            $uvjet= $_GET['uvjet'];
        }
      

        $ukupnoPolaznika = Polaznik::ukupnoPolaznika($uvjet);
        $ukupnoStranica = ceil($ukupnoPolaznika/App::config('rezultataPoStranici'));

        if($stranica>$ukupnoStranica){
            $stranica=$ukupnoStranica;
        }

        $polaznici = Polaznik::read($stranica,$uvjet);
        
        foreach($polaznici as $p){
        
            if(file_exists($this->slikaDir . $p->sifra . '.png')){
                    $p->slika =  App::config('url') . 'public/img/polaznik/' . $p->sifra . '.png';
                }else{
                    $p->slika= App::config('url') . 'public/img/nepoznato.png';
                }
        }

        $this->view->render($this->viewDir . 'index',[
            'polaznici'=>$polaznici,
            'stranica' => $stranica,
            'uvjet' => $uvjet,
            'dodatniCSS'=>'<link rel="stylesheet" href="' . App::config('url') . 'public/css/cropper.css">',
            'dodatniJS'=>'<script src="' . App::config('url') . 'public/js/cropper.js"></script>
            <script src="' . App::config('url') . 'public/js/polaznikIndex.js"></script>'
           
        ]);
    }

    public function detalji($sifra = 0)
    {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            if($sifra==0){
                //novi polaznik
                $this->polaznik = new StdClass();
                $this->polaznik->ime='';
                $this->polaznik->prezime='';
                $this->polaznik->oib='';
                $this->polaznik->email='';
                $this->polaznik->brojugovora='';
                $this->poruka='Popunite tražene podatke';
                $akcija='Dodaj';
            }else{
                //postojeći
                $this->polaznik = Polaznik::readOne($sifra);
                $this->poruka='Promjenite željene podatke';
                $akcija='Promjeni';
            }
            $this->view->render($this->viewDir . 'detalji',[
                'polaznik' => $this->polaznik,
                'poruka' => $this->poruka,
                'akcija' => $akcija
            ]);
        }else{
            //post što znači kontrole, ostanak ili spremanje u bazu i povratak na index
            if($sifra==0){
                Polaznik::create($_POST);
            }else{
                Polaznik::update($sifra,$_POST);
            }
            $this->index();
        }
    }

    public function brisanje($sifra = 0){
        if($sifra==0){
            $this->index();
            return;
        }
        Polaznik::delete($sifra);
        $this->index();
    }

    public function trazipolaznike()
    {
        header('Content-type: application/json');
        echo json_encode(Polaznik::trazipolaznike($_GET['uvjet'],$_GET['grupa']));
    }


    public function spremisliku(){

        $slika = $_POST['slika'];
        $slika=str_replace('data:image/png;base64,','',$slika);
        $slika=str_replace(' ','+',$slika);
        $data=base64_decode($slika);

        file_put_contents(BP . 'public' . DIRECTORY_SEPARATOR
        . 'img' . DIRECTORY_SEPARATOR . 
        'polaznik' . DIRECTORY_SEPARATOR 
        . $_POST['id'] . '.png', $data);

        echo "OK";
    }
}