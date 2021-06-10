<?php


namespace App\Core;

class Controller
{    
    /**
     * view - carrega um template do twig a partir de um diretório e um nome especificado
     * Não informar .twig.php junto ao nome da pagina, pois é inserido automaticamente
     * 
     * @param  string $page - diretório e página do arquivo de twig
     * @param  array  $params - array associativo com os parametros a serem passados para o twig
     * @return void Imprime o html gerado pelo twig
     */
    protected function view(string $page, array $params= []){
            $page = str_replace('.','/', $page);
            $page .= '.twig.php';
     
            $loader = new \Twig\Loader\FilesystemLoader('../App/Site/View');

            $twig = new \Twig\Environment($loader);
            echo $twig->render($page, $params);
    }
}
