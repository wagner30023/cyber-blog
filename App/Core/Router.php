<?php

namespace App\Core;

class Router
{
    // Todos os parametros da nossa URL em array
    private array $uriData; 

    // Qual a controladora a ser executada
    private string $controller;

    // qual o método a ser chamado
    private string $method;

    // Quais parametros a serem enviados
    private array $params;

    public function __construct(){ 

        // Controller padão, ex: HomeController
       $this->controller = 'Home';

       // Método padrão, ex: index()
       $this->method = 'index';

       //=  Parametro padrão, ex: []
       $this->params = [];

       // chama o método para formatar as propriedades  
       $this->format();
       $this->run();
    }
    
    /**
     * Recebe os dados da URI, formata e devolve na propriedade uriData
     *
     * @return void Retorna um array com todos os itens da URI
     */
    private function format()
    { 
        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?') > 0)
            $uri = substr($uri, 0, strpos($uri, '?'));
        
        $ex = explode('/', $uri);
     
        if (!is_array($ex))
            return;

        $ex = array_values(array_filter($ex));

        for ($i = 0; $i < REMOVE_INDEX; $i++)
            unset($ex[$i]);

        $this->uriData = array_values($ex);
    }

    private function run()
    {
         $controller = $this->getController();

         $method = $this->getMethod($controller);
         
         $params = $this->getParams();

         call_user_func_array([
             (new $controller),
             $method
         ],$params);
    }
    
    /**
     * Obtém qual controller deve ser executada
     *
     * @return string
    */
    public function getController() : string
    {
        if (isset($this->uriData[0])) {
            $cont = $this->uriData[0];

            $cont = 'App\\Site\\Controller\\' . ucfirst($cont) . 'Controller';

            if (class_exists($cont))
                return $cont;
        } 

        return 'App\\Site\\Controller\\' . ucfirst($this->controller) . 'Controller';
    }

    public function getMethod(string $controllerPath){
        $meth = $this->method; //index

        if (isset($this->uriData[1])) //Se tiver algo na url, entra no if
            $meth = $this->uriData[1]; //Agora math recebe o que está na url

        if (method_exists($controllerPath, $meth)) //O método da URL existe? 
            return $meth; //Se tiver, então retorna o meth pq está certp
        return $this->method; //Retorna o nosso index
    }

    public function getParams():array
    {
        if (count($this->uriData) <= 2)
        return [];

        $params = [];

        for($i = 2; $i < count($this->uriData); $i++){
            $params[] = $this->uriData[$i];
        }

        return $params;
    }
}

