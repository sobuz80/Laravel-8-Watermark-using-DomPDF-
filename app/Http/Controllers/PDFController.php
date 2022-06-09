<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller

{

    public function generatePDF()

    {
        $data = [
            'title' => 'Welcome to Nicesnippets.com',
            'date' => date('m/d/Y')
        ];      
        $pdf = PDF::loadView('myPDF', $data);
        $pdf->setPaper('L');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->set_opacity(.2);
        $canvas->page_text($width/5, $height/2, 'www.kioskbazarBD.com', null,
        55, array(0,0,0),2,2,-30);
        return $pdf->download('nicesnippets.pdf');

    }

}
