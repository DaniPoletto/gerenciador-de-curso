<?php
namespace Alura\Cursos\Controller;

//não deixa a classe ser inicializada/instanciada
abstract class ControllerComHtml 
{
    public function renderizaHtml(string $caminhoTemplate, array $dados):string
    {
        extract($dados);
        //começa a guardar tudo que será exibido
        ob_start();
        require __DIR__."/../../view/".$caminhoTemplate;
        //retorna dados do buffer e limpar o buffer
        $html = ob_get_clean();

        return $html;
    }
}
?>