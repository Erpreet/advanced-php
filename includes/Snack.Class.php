<?php 

Class Snack
{
    public $name = '';
    public $type = '';
    public $price = 0.00;
    public $calories = 0;

    function __construct ($snackName = '', $snackType = '', $snackPrice = 0.00, $snackCalories = 0)
    {
        $this->name = $snackName;
        $this->type = $snackType;
        $this->price = number_format($snackPrice, 2, '.',',');
        $this->calories = (integer) $snackCalories;
    }

    public function caramelize()
    {
        $this->calories *= 2;
    }
}

$mySnack = new Snack ('Oh Henry', 'chocolate', 1.89, 200);
var_dump($mySnack);

$mySnack->caramelize();
var_dump($mySnack);
