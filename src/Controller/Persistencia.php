<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;

class Persistencia implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao():void
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );
        
        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        //se tem id
        if(!is_null($id) && $id !== false){
            //atualizar
            $curso->setId($id);
            //unir isso com o q tem no banco
            $this->entityManager->merge($curso);
            $this->defineMensagem(
                'success',
                'Curso atualizado com sucesso'
            );
        }else{
            $this->entityManager->persist($curso);
            $this->defineMensagem(
                'success',
                'Curso inserido com sucesso'
            );
        }

        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
    }
}