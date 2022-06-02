# Gerenciador de cursos

Projeto Desenvolvido durante curso de MVC da Alura.

![Alt Text](https://github.com/DaniPoletto/gerenciador-de-curso/blob/master/demo.gif)

### Requisitos

Instalação do [composer](https://getcomposer.org/). 

### Inicialização
Na pasta do projeto, abra o terminal e digite o comando para instalar as dependências:

```
composer install
```

Suba um servidor teste com o comando:
```
php -S localhost:8080 -t public
```

Somente a pasta public ficará acessível. 

E acesse pelo link 
```
http://localhost:8080/listar-cursos
```

### Erros
Em caso de erro nas classes usando Doctrine
```
vendor\bin\doctrine orm:generate-proxies
```

### Outras instruções
Para executar um sql no terminal usando Doctrine
```
vendor/bin/doctrine dbal:run-sql "select * from usuarios;"
```

