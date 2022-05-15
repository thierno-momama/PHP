<?php 
//class non instanciable et qui contient uniquement des methodes abstract
interface Travailleur {
    //une methode abstract est une methode sans corps et dans une interface il n'yas que des methodes abstract
    public function travail();
}
abstract class Humain{

    public function connaissance(){
        var_dump("Je suis un huùmain et je travail....");
    }
    abstract function hm();
    public function travail(){
        var_dump("Je suis un Boss et je travail egalement");
    }
}
//
class Employe implements Travailleur{
    public $prenom;
    public $nom;
    protected $age;
    //construct
    public function __construct($prenom, $nom, $age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
    }
    //get et Set 
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        if(is_int($age) && $age >= 1 && $age <= 100){
            return $this->age = $age;
        }else{
            throw new Exception("Age non valable");
        }
    }
    //methode presentation
    public function presentation(){
        var_dump("Bonjour, je m'appel $this->prenom $this->nom et j'ai $this->age ans");
    }
    //
    public function travail(){
        var_dump("Je suis un employé et je travail");
    }
}
//class Patron
class Patron extends Employe {

    public $patron;

    public function __construct($prenom, $nom, $age, $voiture){
        parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }
    //redefinition de la methode presentation
    public function presentation(){
        var_dump("Bonjour, je m'appel $this->prenom $this->nom et j'ai {$this->getAge()} ans et j'ai une voiture $this->voiture");
    }
    public function travail(){
        var_dump("Je suis un Boss et je travail egalement");
    }
}
class Etudiant extends Humain{
    public function hm(){
        var_dump("Je suis un etudiant et je hm");
    }
}
$etudiant = new Etudiant();

$employe = new Employe("Thierno", "Soumah", 29);
echo"<pre>";
var_dump($employe);
$employe->presentation();
echo"</pre>";

$patron = new Patron("Thierno", "Momama", 30, "BMW");

echo"<pre>";
print_r($patron);
$patron->presentation();
echo"</pre>";


// function faireTravailler
function faireTravailleur(Travailleur $obj){
    var_dump("Faire Travavailler....{$obj->travail()}");
}
function faireHum($obj){
    var_dump("Faire Travavailler....{$obj->hm()}");
}
faireTravailleur($employe);
faireTravailleur($patron);
faireHum($etudiant);

