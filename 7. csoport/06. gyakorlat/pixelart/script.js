// VÁLTOZÓK
const menu_div = document.querySelector('#menu')
const game_div = document.querySelector('#ingame')
const play_btn = document.querySelector('#play')
const new_btn = document.querySelector('#newd')
const return_btn = document.querySelector('#return')
const save_btn = document.querySelector('#save')
const name_inp = document.querySelector('#nevinp')
const color_inp = document.querySelector('#color')
const nametitle = document.querySelector('#ingame > h2')
const table = document.querySelector('.edit')
const table_preview = document.querySelector('.preview')
const table_container = document.querySelector('#container')
let username;

name_inp.placeholder = 'Bendi'

// FŐOLDAL
play_btn.addEventListener('click', startGame)

function startGame(){
    if(name_inp.value === ''){
        name_inp.value = name_inp.placeholder
    }
    username = name_inp.value;
    menu_div.style.display = 'none';
    game_div.style.display = 'block';
    nametitle.innerHTML = `Hali ${name_inp.value}!`
}

return_btn.addEventListener('click', ()=> {
    game_div.style.display = 'none';
    menu_div.style.display = 'block';
})

// GAMELOGIC

new_btn.addEventListener('click', newDrawing)

const hegyek = [
    {
        'x': 2,
        'y': 4
    },
    {
        'x': 4,
        'y': 8
    },
    {

        'x': 6,
        'y': 3
    },
    {
        'x': 8,
        'y': 7
    },
]

function newDrawing(){
    table.innerHTML = ""
    for (let i = 0; i < 10; i++) {
        let tr = document.createElement('tr')
        for (let j = 0; j < 10; j++) {
            let td = document.createElement('td')
            hegyek.forEach(e=> {
                if(i === e.x && j === e.y){
                    td.style.backgroundColor = 'brown'
                }
            })
            tr.append(td)
        }
        table.append(tr)
    }
}

table.addEventListener('click', (e)=>{
    if(e.target.matches('td')){
        e.target.style.backgroundColor = color_inp.value
    }
})

table_container.innerHTML = ""

save_btn.addEventListener('click', ()=> {
    const ntable = document.createElement('table')
    ntable.classList.add('preview')
    ntable.innerHTML = table.innerHTML
    table_container.append(ntable)
    console.log(table_container.innerHTML)
    localStorage.setItem('tables', table_container.innerHTML)
    console.log('storage=>', localStorage.getItem('tables'))
})

table_container.addEventListener('click', (e)=> {
    if(e.target.matches('td')){
        table.innerHTML = e.target.closest('table').innerHTML
    }
})

// "{name: 'ImageBitmapRenderingContext', age: 10 }"
// [0,2,3,4]
//JSON.stringify()

//JSON.parse()
table_container.innerHTML = localStorage.getItem('tables')

