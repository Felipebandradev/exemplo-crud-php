/* Selecionando os links de excluir através da classe excluir */
const links = document.querySelectorAll(".excluir");

/* Percorrendo cada link selecionado anteriormente
(conteúdo de constentes links) */
for (const link of links) {
    /* Adicionando um evento de clique para 
    cada link de excluir */
    link.addEventListener("click",function (event) {

        /* Anulando comportamento padrão do link
        que é redirecionar para algum lugar */
        event.preventDefault();
        /* Usando um confirm() para capturar a resposta do usuário 
        que pode ser ok/sim(true) ou cancelar/não (false) */
        let resposta = confirm("Deseja realmente excluir este registro?");

        /* Se a resposta for true, então redirecionamos para 
        o destino original de cada link, ou seja, para a página de PHP de exclusão */
        if(resposta) location.href = this.href; 
      
    })
}