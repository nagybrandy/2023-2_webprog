// VÁLTOZÓK

// HTML 
const play_btn = document.querySelector('#play')
const return_btn = document.querySelector('#return')
const newd_btn = document.querySelector('#newd')
const color_inp = document.querySelector('#color')
const name_inp = document.querySelector('#nev')
const menu_div = document.querySelector('#menu')
const edit_table = document.querySelector('table.edit')
const game_div = document.querySelector('#ingame')
const name_tit = document.querySelector('#ingame h2')

let nev;

// FŐOLDAL
play_btn.addEventListener('click', startGame)

function startGame(){
    if(name_inp.value === '') {
        alert('Töltsd ki a név mezőt!')
        return;
    }
    nev = name_inp.value
    menu_div.style.display = 'none'
    game_div.style.display = 'block'
    name_tit.innerHTML = `Hello ${nev}!`
}

return_btn.addEventListener('click', ()=> {
    menu_div.style.display = 'block'
    game_div.style.display = 'none'
})

// IN-GAME

const hegyek = [[2,2],[4,6],[7,4]]
newd_btn.addEventListener('click', ()=> {
    edit_table.innerHTML = ""
    for (let i = 0; i < 10; i++) {
        const tr = document.createElement('tr')
        for (let j = 0; j < 10; j++) {
            const td = document.createElement('td')
            hegyek.forEach(e=> {
                if(i==e[0] && j == e[1]){
                    td.style.backgroundColor = 'brown'
                }
            })
            
            tr.append(td)
        }
        edit_table.append(tr)
    }
})

edit_table.addEventListener('click', (e)=> {
    if(e.target.matches('td')){
        e.target.style.backgroundColor = color_inp.value;
    }
})

