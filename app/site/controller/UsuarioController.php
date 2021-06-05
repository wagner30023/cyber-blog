<?php

namespace app\site\controller;

use app\classes\Input;

class UsuarioController
{
    public function __construct()
    {
        return Input::get('teste',FILTER_SANITIZE_NUMBER_INT);
    }
}
