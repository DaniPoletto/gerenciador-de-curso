# Gerenciador de cursos

Projeto Desenvolvido durante curso de MVC da Alura.

### Requisitos

Instale o [composer](https://getcomposer.org/). 

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

Em caso de erro nas classes usando Doctrine
```
vendor\bin\doctrine orm:generate-proxies
```

