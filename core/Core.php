<?php

class Core {
    
    public function run() {
        
        //padrão passado por url: /nomedocontroller/funcao/action  
        //por padrao seta '/' (raiz) na variavel url para o caso de o usuario nao passar nenhum valor, caso contratrio 
        //atribui o valor da url na variavel $url
        $url = '/';
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        }
        
        $params = array();
        //verifica se foi passado algum valor via url
        if(!empty($url) && $url != '/'){
            //remove a barra antes da url
            $url = explode('/', $url);
            //array_shift() remove o primeiro indice do array (registro vazio).
            array_shift($url);
            
            $currentController = $url[0].'Controller';
            //pega o primeiro valor passado na url (controller) e concatena com Controller (ex. homeController), 
            //após isso remove o valor do array para pegar o proximo registro que será o nome da função passada na url
            array_shift($url);
            
            //após a remoção verifica se o próximo valor (action) foi repassado caso contrario atribui o padrão (index)
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }
            //verifica se a url tem dados ainda (parametros) e armazena em variável
            if(count($url) > 0){
                $params = $url;
            }
            
        } else{
           $currentController = 'homeController';
           $currentAction = 'index';
        }
        
        //instancia o controller
        $c = new $currentController();
        
        //função para executar uma action de uma classe e envia os parametros
        call_user_func_array(array($c, $currentAction), $params);
        
        
    }
    
}