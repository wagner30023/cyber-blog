# cyber-blog
## Projeto principal do blog.

Para a utilização desse projeto se faz necessário algumas tecnologias, dentre elas:

PHP 7.2^
MariaDB ou MySQL
Composer
Git
O projeto está em desenvolvimento e qualquer alteração pode acarretar em erros, aguarde a versão final.

## Configuração
O arquivo de configuração fica na pasta **app\config**, contendo o arquivo **config.php** e uma subpasta chamada de **env** contendo o arquivo final de configuração para ambiente local, qa e produção.

## config.php
Faz umavalidação através de uma variável para verificar qual arquivo será utilizado.

Mude o valor da variável **$prod** para true se quiser carregar os arquivo de configuração de prod, mas caso queira utilizar o arquivo de configurações locais, basta manter o valor da variável para false.

# Renderizando uma página com twig basta extender a classe
** App/Core/Controller.php** e chamar o método view

O método recebe dois parâmetros, sendo eles:

**$page** - Página a ser carregada, não informe .twig.php pois já é inserido automaticamente. não utilizar **/** para diretorio, mas sim 
**.**  ex: **diretório.pagina**

**$params** - Array associativo com os valores a serem entregues para a página do twig.