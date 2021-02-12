var itens = document.querySelectorAll('.filtro');

var btnFiltro = document.querySelector('#btn-filtro');
var itensFiltro = document.querySelector('#itens-filtro');

console.log();
console.log();

//muda seta dos itens do filtro
itens.forEach(item=>{
    item.addEventListener('click', (event)=>{
        event.preventDefault();
        let setaCima = item.querySelector('.seta-cima');
        let setaBaixo = item.querySelector('.seta-baixo');
        
        setaBaixo.classList.toggle('invisivel')
        setaCima.classList.toggle('invisivel');
    });
});

//exibe menu de filtro em telas pequenas

btnFiltro.addEventListener('click', (event)=>{
    event.preventDefault();
    btnFiltro.classList.toggle('ocultar-filtro');
    itensFiltro.classList.toggle('ocultar-filtro');
});
