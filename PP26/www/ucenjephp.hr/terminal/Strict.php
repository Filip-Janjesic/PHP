<?php declare(strict_types=1);


class Strict{

    private int $i;
    private string $s;

    public function __construct(){
        $this->i=7;
        $this->hello();
        $this->i=$this->primjer('2');
       // $this->s=$this->primjer();
        echo $this->i;

        if($this->primjer('2')){
            echo 'True';
        }else{
            echo 'False';
        }
    }

    private function hello():void{
        echo 'Hello';
    }

    private function primjer(string $poruka=''):int|bool{
        if($poruka==''){
            return false;
        }
        return -1;
    }

}

new Strict();