<?php

    header('Content-Type: application/json; charset=utf-8');
    include './classes/Usuarios.php';
    include './classes/Funcionarios.php';

    class Rest 
    {
        public static function open($requisicao)
        {
            $url = explode('/', $requisicao['url']);

            $classe = $url[0];
            array_shift($url);

            $metodo = $url[0];

            array_shift($url);

            $parametros = array();
            $parametros = $url;

            if(class_exists($classe)){

                if(method_exists($classe, $metodo)){
                    $retorno = call_user_func_array(array(new $classe, $metodo), $parametros);
                    return json_encode(array(
                        'success'    => true,
                        'dados'      => $retorno
                    ));
                }

            }else{

                return json_encode(array(
                    'success' => false,
                    'dados'   => 'classe ou metodo inexistente'
                ));
            }
        }
    }
    
    if(isset($_REQUEST)){
        echo "<pre>";
        echo Rest::open($_REQUEST);
        echo "<pre>";
    }