<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index()
    {
        return 'je suis le contrôleur BaseController';
    }
    public function oneMethode()
    {
        return 'je suis la méthode oneMethode';
    }
    public function twoMethode()
    {
        return 'je suis la méthode twoMethode';
    }
    public function threeMethode()
    {
        return 'je suis la méthode threeMethode';
    }
    public function calculate( Request $req,$resultat=0){
        $nb1=$req->nb1;
        $nb2=$req->option;
        $nb3=$req->nb2;
        if($nb2=="+"):
            $resultat=($nb1)+($nb3);
        elseif($nb2=="-"):
            $resultat=($nb1)-($nb3);
        endif;
            return View('calculatriceView',compact("resultat"));
    }
}
