#  Exemplos de operações CRUD usando PHP e SQL

## Exercícios

### 30/08/2023

#### Exercício 04

- Em `produtos/visualizar.php` crie um link dinâmico para a página **atualizar.php** passando o `id` do produto como parâmetro de URL.

- Em `produtos/atualizar.php` faça a programação necessária para capturar/sanitizar o valor do parâmetro `id` vindo da URL.

- Em `funcoes-produtos.php` programe uma função chamada `lerUmProduto` que receba o `id` do produto a ser consultado e retorne um array associativo com os dados do produto.

- Em `produtos/atualizar.php` faça a programação necessária para chamar a função `lerUmProduto` e, após receber os dados de retorno dela, exiba os valores nos campos **nome**, **preço**, **quantidade** e **descricao**.

***Obs.:** por enquanto, não se preocupe em mostrar qual o fabricante do produto selecionado.*




### 29/08/2023

#### Exercício/Desafio 03

- Em `produtos/inserir.php` programe as ações necessárias para fazer com que o `select` e `option` de **Fabricantes** mostre todos os fabricantes disponíveis para escolha.

### 29/08/2023

#### Exercício/Desafio 02

- Pense (e implemente) uma forma de trazer na página **produtos/visualizar.php** o total de cada produto, ou seja, multiplicando `preco` por `quantidade`.

- **Dicas:** dá pra fazer de forma direta na saída, ou via operações no comando SQL, ou usando uma nova função etc.


#### Exercício 01

- Na pasta `src` crie um arquivo chamado `funcoes-utilitarias.php`
- Dentro deste arquivo programe uma função chamada `formatarPreco`
e faça as ações necessárias para ela receber um valor e retorná-lo formatado em reais.
- Use esta função para formatar o preço de cada produto exibido na página **produtos/visualizar.php**
