<?php

use modules\themes\themes;

class index {

    public function __construct(){

        session_start();

        include 'chemins.php';
        include MODULES . 'themes.php';
        $theme = new themes();


    }

}
new index();
