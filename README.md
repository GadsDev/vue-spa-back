# [Curso Laravel Vue SPA - BackEnd](https://tiagomatos.com/lp/curso-laravel-api-vue-js-spa/)

## Introdução

Esse curso foi criado pelo [Tiago Matos Web](https://www.youtube.com/user/tiagomatosweb), quem fui conhecer iniciar o curso, comprei como recomendação em um grupo de Laravel que estou.

Trabalho com Laravel+Vue Js a mais de 1 ano, então cursos de CRUD me desanimam muito, fui atraído com a ideia de construir uma SPA, ter o Laravel totalmente separado do Front sendo usado para API, então iniciei o curso.

Inicialmente já percebi o quão alem de um CRUD e um AUTH JWT para SPA o Tiago Matos poderia me oferecer, e assim tive a motivação que precisava para fazer esse curso do inicio ao fim, absorver anos e anos de conhecimento de uma pessoa, atualizada e com um conhecimento profundo nas tecnologias em que pretende ensinar.

Tenho a total noção que poderia seguir a documentação do Laravel, Vue, JWT e até outros textos gratuitos porem conteúdos assim reunidos em um projeto prático me são e foram muito uteis para evoluir na jornada como um desenvolvedor, então vai uma amostra conteúdo que acho merecerem destaque


### Conceitos aprendidos

- Passar os tipos dos parametros na funções PHP

Muitas vezes informar o tipo dos parâmetros da funções pode evitar muitos erros futuros, coisa que vi a primeira vez neste curso.


- Camada de serviços

Trabalhar com uma camada de serviços de uma forma inteligente,    
buscando manter a lógica de negocio fora do controller.


- Estrutura de Autenticação

Foi desenvolvida uma Autenticação completa na mão, dês de login/registro até relembrar senha, com uma ótima estrutura, coisa rara de se aprender no laravel onde já existem muitos presets para Auth.

- Tratamento de erro com Exceptions

Tratar erros com Exceptions personalizadas que podem ser mapeadas pelo FrontEnd, ajudam  na interação do usuário com o sistema, permitindo informarmos erros melhores.
    
### Usos do Laravel
- Factory e Seeds para Teste/Preencher o banco
    ```
    php artisan make:factory UserFactory
    ```
- Gerar exceptions personalizadas
    ```
    php artisan make:exception UserNotFoundException
    ```

- Gerando templates de email blade
    ```
    php artisan make:mail WelcomeMail
    ```

- Usando Events e Listeners, um event pode ter N listeners
    ```
    php artisan make:event UserRegistered
    php artisan make:listener SendWelcomeNotification
    ```
- Usando Polices na prática 
    ```
    pa make:policy TodoTaskPolicy
    ```
    

### Problemas

O HTML e CSS já é disponibilisado pronto, coisa que acho otimo, na pagina do curso só encontrei o projeto já pronto em .zip, então tive que remover a lógica das pagina do seu projeto pronto e jogar no meu para desenvolver do zero

### Outros
Além desses detaques, outros aprendizados pequenos porem extremamente uteis
- Usar Middleware no controller e não na rota.
- No arquivo Handler.php alterar o comportamento de Exceptions padrões do Laravel
- Talvez futuramente comente parte do front...
