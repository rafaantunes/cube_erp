<?php

class controller {
    
    public function loadTemplate($viewName, $viewData = array()) {
        require 'views/template.php';
    }
    
    public function loadViewInTemplate($viewName, $viewData = array()) {
        //a função extract extrai os dados do array caso sejam repassados dados. 
        //Cada indice do array será convertido em variável e atribuido os respectivos valores
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    
}