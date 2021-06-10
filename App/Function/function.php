<?php


/**
 * Utilizamos para debugar as instruções passadas por parametro.
 *
 * Após a execução a aplicação é encerrada 
 * 
 * @param  mixed $param Parametro a ser debugado
 * @return void
 */

function dd($param = null)
{
    $teste = null;
    echo "<pre>";
    print_r($param);
    echo "</pre>";
    die();
}

/**
 * Redirect - redireciona o usuário para a url especificada 
 *
 *
 * @param  string $url URL do endereço a ser redirecionado
 * @return void
 */

function Redirect(string $url){
    header('Location:'.$url);
}
