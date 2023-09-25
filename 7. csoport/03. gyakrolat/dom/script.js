// 1. feladat
let input1 = document.querySelector('#feladat1 input')
let button1 = document.querySelector('#feladat1 button')
let hello1 = document.querySelector('#helloText')

button1.addEventListener('click', handleClick)

function handleClick(e) {
    hello1.innerHTML = `Hello ${input1.value}!`
}

// 2. feladat
let feladat2 = document.querySelector('#feladat2')
let button2 = feladat2.querySelector('button')
let input2 = feladat2.querySelector('input')
let div = feladat2.querySelector('#helloRepeats')

button2.addEventListener('click', () => {
    div.innerHTML = ""
    for (let i = 0; i < input2.value; i++) {
        let p = document.createElement("p")
        p.innerHTML = "Hello Világ!"
        p.style.fontSize = `${(i + 1) * 10}px`
        div.append(p)
        //prepend - 1. gyerekének fogja beszúrni
    }
})

// 3. feladat

// 4. feladat
let links = [...document.querySelectorAll("a")]
console.log(...links)
links.map(e => {
    document.querySelector("#hyperlinksList").innerHTML +=
        `<li><a href=${e}>${e.innerHTML}</a></li>`
})

// 5. feladat
let input5 = document.querySelector("#feladat5 input")

let button5 = document.querySelector("#feladat5 button")

let div5 = document.querySelector("#imageContainer")

button5.addEventListener('click', () => {
    let img = document.createElement("img")
    img.src = input5.value
    div5.append(img)
})
// 6. feladat
const gyerekek = [
    { nev: "Anna", osztaly: "3/A", kor: 8 },
    { nev: "Bence", osztaly: "4/B", kor: 9 },
    { nev: "Cecília", osztaly: "2/C", kor: 7 },
    { nev: "Dávid", osztaly: "5/D", kor: 10 },
    { nev: "Emma", osztaly: "1/E", kor: 6 },
];

const btn6 = document.querySelector('#feladat6 button')
btn6.disabled = true

const inputs = document.querySelectorAll("#feladat6 input");

inputs.forEach(e => e.addEventListener('input', ()=> {
        btn6.disabled = [...inputs].some(e => e.value === "")
}));

const table6 = document.querySelector('#feladat6 table')

table6.addEventListener('click', (e) => {
    // table6.childNodes.forEach(row => console.log(row));
    if(e.target.matches('td')){
        [...table6.children].forEach(row => {   
            row.style.backgroundColor = 'unset';
            [...row.children].forEach(cell => {
                cell.style.backgroundColor = 'unset';
            })
    });
        if(e.altKey){
            e.target.style.backgroundColor = 'lightblue'
        } else {
            e.target.parentElement.style.backgroundColor = 'lightgreen'
        }
    }
})

// Az eredti értékekkel meg kell jeleníteni a táblázatunkat
const table = document.querySelector('#feladat6 table')
gyerekek.forEach(e => {
    const tr = document.createElement('tr')
    for(const kulcs in e){
        const td = document.createElement('td')
        td.innerHTML = e[kulcs]
        tr.append(td)
    }
    table.append(tr)
})
console.log(inputs)
document.querySelector('#feladat6 button').addEventListener('click', () => {
    const values = [...inputs].map(e => e.value)

    gyerekek.push({
        nev: values[0],
        osztaly:  values[1],
        kor: values[2],
    })

    const tr = document.createElement('tr')
    
    values.forEach(e=> {
        const td = document.createElement('td')
        td.innerHTML = e
        tr.append(td)
    })

    table.append(tr)
})
// Beírjuk az értékeket
// Megnyomjuk a gombot
// Bekerül a tömbbe
// Megjelenik a táblázatban az új sor
// - TR
// - TR - 3 td - 3 értéket kiolvasunk


// 7. feladat
const konyvekLista = [
    {
        szerzo: "J.K. Rowling",
        cim: "Harry Potter and the Philosopher's Stone",
        kiadasEve: 1997,
        kiado: "Bloomsbury",
        isbn: "978-0747532743"
    },
    {
        szerzo: "George Orwell",
        cim: "1984",
        kiadasEve: 1997,
        kiado: "Secker & Warburg",
        isbn: "978-0451524935"
    },
    {
        szerzo: "Harper Lee",
        cim: "To Kill a Mockingbird",
        kiadasEve: 1960,
        kiado: "J. B. Lippincott & Co.",
        isbn: "978-0061120084"
    },
    {
        szerzo: "F. Scott Fitzgerald",
        cim: "The Great Gatsby",
        kiadasEve: 1925,
        kiado: "Charles Scribner's Sons",
        isbn: "978-0743273565"
    },
    {
        szerzo: "Leo Tolstoy",
        cim: "War and Peace",
        kiadasEve: 1869,
        kiado: "The Russian Messenger",
        isbn: "Nincs ISBN"
    }
];
let input7 = document.querySelector('#feladat7 input')
let button7 = document.querySelector('#feladat7 button')
let ul = document.querySelector('#booksByYear')

button7.addEventListener('click', ()=> {
    ul.innerHTML = ""
    let year = parseInt(input7.value)
    konyvekLista.filter(e => e.kiadasEve === year).forEach(konyv => {
        ul.innerHTML += `<li>${konyv.cim}</li>`
    })
})

// 8. feladat

// 9. feladat

// 10. feladat


// 11. feladat
  /*   if(!e.target.classList.contains('done'))  e.target.classList.add('done')
    else e.target.classList.remove('done') */

document.querySelector('#feladat11 ul').addEventListener('click', (e) => {
    if(e.target.matches('li')) e.target.classList.toggle('done')
})

// linkek
document.querySelectorAll("ul li a").forEach(function (link) {
    link.addEventListener("click", function (e) {
        e.preventDefault(); // Ne ugorjon az oldal a linkre kattintáskor
        const targetId = this.getAttribute("href").substring(1); // Az "href" attribútum értéke #-jel nélkül
        const feladatok = document.querySelectorAll(".feladat");
        feladatok.forEach(function (feladat) {
            if (feladat.id === targetId) {
                feladat.classList.add("aktualis");
            } else {
                feladat.classList.remove("aktualis");
            }
        });
    });
});
