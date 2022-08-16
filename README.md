## Ferramentas necessárias para subir o ambiente

- Docker
- docker-compose version 3.9

## Versão das ferramentas

### Ambiente local

- Docker version 20.10.17
- Docker Compose version v2.6.0

### Dentro dos containers

- PHP: 8.1
- Apache/2.4.54 (Debian)
- Composer version 2.3.10

## Como subir o ambiente

Comandos a serem executados no terminal.

### Executar o build do ambiente

`docker-compose build`

### Subindo o ambiente

`docker-compose up -d`

### Quando o ambiente subir completamente

`docker container exec -u 0 php-web chmod 777 /var/www/html/app/Repositories/clientes.xlsx`

`docker container exec php-web composer update`

`docker container exec php-web composer dump-autoload`

## Como acessar

Acessar a url: [http://127.0.0.1:9000](http://127.0.0.1:9000)

## Info

<p style="text-align: justify;">
O presente projeto tem como objetivo automatizar o preenchimento de dados em uma tabela excel no formato .xlsx através de um arquivo .xml.</p>
<p style="text-align: justify;">
O uso da presente ferramente é realizado de uma maneira simplificada, onde é possível acessar uma página contendo os dados da tabela atual, juntamento com um botão para fazer o download da mesma. Na mesma tela, há um botão para enviar o arquivo .xml.
</p>
<p style="text-align: justify;">
Com isso, basta selecionar o arquivo desejado e clicar no botão "Enviar", em seguida haverá um pequeno tempo de carregamento, devido aos dados estarem sendo convertidos em array para o preenchimento das linhas no arquivo .xlsx. Após esta etapa, o usuário é redirecionado a página inicial, onde pode verificar os novo estado da tabela, assim como realizar o download da mesma.
</p>