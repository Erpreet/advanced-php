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

    public function output()
    {
        ?>
            <dl>
            <dt>Snack Name </dt>
            <dd> <?php echo $this->name; ?></dd>
            <dt>Snack Type </dt>
            <dd> <?php echo $this->type; ?></dd>
            <dt>Snack Price </dt>
            <dd> <?php echo $this->price; ?></dd>
            <dt>Snack Calories </dt>
            <dd> <?php echo $this->calories; ?></dd>
            </dl>
        <?php
    }
}

// $mySnack = new Snack ('Oh Henry', 'chocolate', 1.89, 200);
// var_dump($mySnack);

// $mySnack->caramelize();
// var_dump($mySnack);

// $mySnack->output();
