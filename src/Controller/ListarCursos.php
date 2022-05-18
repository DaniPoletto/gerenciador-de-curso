<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao():void
    {
        $cursos = $this->repositorioDeCursos->findAll();

        $this->renderizaHtml('cursos/listar-cursos.php',[
            'cursos' => $cursos,
            'titulo' =>"Lista de Cursos"
        ]);
    }
}

?>