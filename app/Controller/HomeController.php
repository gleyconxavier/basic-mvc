<?php

    class HomeController
    {
        
        public function index()
        {
            // por ser static nao e necessario instancia e pode ser chamada com ::
            // padrao singleton
            try{
                $colecPostagens = Postagem::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('home.html');

                $parametros = array();
                $parametros['postagens'] = $colecPostagens;

                $conteudo = $template->render($parametros);
                echo $conteudo;

            } catch(Exception $e) {
                echo $e->getMessage();
            }
            
        }
    }