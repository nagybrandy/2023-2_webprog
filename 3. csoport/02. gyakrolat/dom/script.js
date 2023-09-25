// 1. feladat
let button1 = document.querySelector("#feladat1 button")
let input1 = document.querySelector("#feladat1 input")
let title1 = document.querySelector("#helloText")

button1.addEventListener('click', () => {
    title1.innerHTML = `Hello ${input1.value}!`
})


// 2. feladat
let feladat2 = document.querySelector("#feladat2")
let input2 = feladat2.querySelector("input")
let button2 = feladat2.querySelector("button")

const helloRepeats = () => {
    feladat2.querySelector("#helloRepeats").innerHTML = ""
    for (let index = 0; index < input2.value; index++) {
        let p = document.createElement("p")
        p.innerHTML = "Hello Világ!"
        p.style.fontSize = `${(index + 1) * 10}px`
        feladat2.querySelector("#helloRepeats").append(p)
        //prepend- elejére fűz
    }
}

button2.addEventListener('click', helloRepeats)


// 3. feladat

// 4. feladat
document.querySelectorAll("a").forEach(e => {
    console.log(e)
    document.querySelector("#hyperlinksList").innerHTML += `
    <li><a href="${e.href}">${e.innerHTML}</a></li>`
})



// 5. feladat

// 6. feladat
const gyerekek = [
    { nev: "Anna", osztaly: "3/A", kor: 8 },
    { nev: "Bence", osztaly: "4/B", kor: 9 },
    { nev: "Cecília", osztaly: "2/C", kor: 7 },
    { nev: "Dávid", osztaly: "5/D", kor: 10 },
    { nev: "Emma", osztaly: "1/E", kor: 6 }
];
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
        kiadasEve: 1949,
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
        kiadasEve: 1997,
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
document.querySelector('#feladat7 button').addEventListener('click', (e)=>{
    document.querySelector('#booksByYear').innerHTML = ""
    let year = e.target.parentElement.children[3].value
    konyvekLista.filter(e => e.kiadasEve == year)
        .forEach(e => document.querySelector('#booksByYear').innerHTML += `<li>${e.cim}</li>`)
})

// 8. feladat

// 9. feladat

// 10. feladat

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
