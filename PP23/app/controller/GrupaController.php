<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GrupaController extends AutorizacijaController
{
    private $viewDir = 'privatno' . DIRECTORY_SEPARATOR . 
    'grupa' . DIRECTORY_SEPARATOR;
 
    public function index()
    {
        $this->view->render($this->viewDir . 'index',[
            'grupe'=>Grupa::read()
        ]);
    }

    public function nova()
    {
        //$this->detalji(Grupa::dodajNovu()); - nije dobro
        header('location: ' . App::config('url') . 
        'grupa/detalji/' . Grupa::dodajNovu());
    }

    public function detalji($sifra)
    {

        if($_SERVER['REQUEST_METHOD']==='GET'){
            $this->view->render($this->viewDir . 'detalji',[
                'grupa'=>Grupa::readOne($sifra),
                'poruka'=>'',
                'smjerovi'=>Smjer::read(),
                'predavaci'=>Predavac::read(),
                'dodatniCSS'=>'<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">',
                'dodatniJS'=>'<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
                <script src="' . App::config('url') . 'public/js/grupaautocompletepolaznik.js"></script>'
            ]);
            return;
        }
        if($_SERVER['REQUEST_METHOD']==='POST'){
            Grupa::update($sifra,$_POST);
            $this->index();
        }
        
    }

    public function brisanje()
    {
       Grupa::delete($_GET['sifra']);
       $this->index();
    }

    public function dodajpolaznika()
    {
        Grupa::dodajPolaznika($_POST['polaznik'],$_POST['grupa']);
        echo 'OK';
    }

    public function obrisipolaznika()
    {
        Grupa::obrisiPolaznika($_POST['polaznik'],$_POST['grupa']);
        echo 'OK';
    }

    public function pdf($sifra)
    {

        $grupa = Grupa::readOne($sifra);

                // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Edunova');
        $pdf->SetTitle('Edunova grupa ' . $grupa->naziv);
        $pdf->SetSubject('Ppis članova grupe');
        $pdf->SetKeywords('edunova, grupa, '. $grupa->naziv);

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        //$pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = '<h1>' . $grupa->naziv . '</h1>';
        $html.='<p>Popis članova</p>';
        $html.='<ol>';
        foreach($grupa->polaznici as $p){
            $html.='<li>' . $p->ime . ' ' . $p->prezime . '</li>';
        }
        foreach($grupa->polaznici as $p){
            $html.='<li>' . $p->ime . ' ' . $p->prezime . '</li>';
        }
        foreach($grupa->polaznici as $p){
            $html.='<li>' . $p->ime . ' ' . $p->prezime . '</li>';
        }
        foreach($grupa->polaznici as $p){
            $html.='<li>' . $p->ime . ' ' . $p->prezime . '</li>';
        }
        $html.='</ol>';


        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function excel($sifra){

        $grupa = Grupa::readOne($sifra);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // (C) SET CELL VALUE
        $sheet->setCellValue('A1', 'Ime');
        $sheet->setCellValue('B1', 'Prezime');
        $brojac=2;
        foreach($grupa->polaznici as $p){
            $sheet->setCellValue('A' . $brojac, $p->ime);
            $sheet->setCellValue('B' . $brojac, $p->prezime);
            $brojac++;
        }

        // (D) SAVE TO FILE
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($grupa->naziv).'.xlsx"');
        $writer->save('php://output');
    }

}