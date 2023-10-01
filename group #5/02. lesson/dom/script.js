// Task 1
const button1 = document.querySelector('#task1 button')
const input1 = document.querySelector('#task1 input')
const h3 = document.querySelector('#helloText')

button1.addEventListener('click', handleClick)

function handleClick(){
    h3.innerHTML = `Hello ${input1.value}!` // altgr + 7
}
// Task 2
const t2div = document.querySelector('#task2')
const input2 = t2div.querySelector('input')
const button2 = t2div.querySelector('button')
const div = document.querySelector('#helloRepeats')

button2.addEventListener('click',() => {
    // <p style="font-size: 13">Hello World!<p>
    div.innerHTML = ""
    for (let i = 0; i < input2.value; i++) {
        let p = document.createElement('p')
        p.innerHTML = "Hello World!"
        p.style.fontSize = `${(i+1)*10}px`
        div.append(p) // prepend()
    }
})

// Task 3
const t3div = document.querySelector('#task3')
const input3 = document.querySelector('#radiusInput')
const button3 = t3div.querySelector('button')

button3.addEventListener('click', () => {
    document.querySelector('#circleResult').innerHTML = `Circle's perimeter: ${input3.value * 2 * Math.PI}`
})

console.log(t3div)

// Task 4
const links = document.querySelectorAll('a')
console.log(links)

const ul = document.querySelector('#hyperlinksList')

links.forEach(a_link => {
    let li = document.createElement('li')
    li.innerHTML = `<a href=${a_link}>${a_link}</a>`
    ul.append(li)
})

// Task 5
const t5div = document.querySelector('#task5')
const input5 = t5div.querySelector('input')
const button5 = t5div.querySelector('button')

button5.addEventListener('click', () => {
    const img = document.createElement('img')
    img.src = input5.value
    document.querySelector('#imageContainer').append(img)
})
// Task 6
const children = [
    { name: "Anna", class: "3/A", age: 8 },
    { name: "Bence", class: "4/B", age: 9 },
    { name: "Cecilia", class: "2/C", age: 7 },
    { name: "David", class: "5/D", age: 10 },
    { name: "Emma", class: "1/E", age: 6 }
];

// Task 7
const booksList = [
    {
        author: "J.K. Rowling",
        title: "Harry Potter and the Philosopher's Stone",
        publicationYear: 1997,
        publisher: "Bloomsbury",
        isbn: "978-0747532743"
    },
    {
        author: "George Orwell",
        title: "1984",
        publicationYear: 1997,
        publisher: "Secker & Warburg",
        isbn: "978-0451524935"
    },
    {
        author: "Harper Lee",
        title: "To Kill a Mockingbird",
        publicationYear: 1960,
        publisher: "J. B. Lippincott & Co.",
        isbn: "978-0061120084"
    },
    {
        author: "F. Scott Fitzgerald",
        title: "The Great Gatsby",
        publicationYear: 1925,
        publisher: "Charles Scribner's Sons",
        isbn: "978-0743273565"
    },
    {
        author: "Leo Tolstoy",
        title: "War and Peace",
        publicationYear: 1869,
        publisher: "The Russian Messenger",
        isbn: "No ISBN"
    }
];

const t7div = document.querySelector('#task7')
const input7 = t7div.querySelector('input')
const button7 = t7div.querySelector('button')

button7.addEventListener('click', ()=> {
    let newBooks = booksList.filter(e => e.publicationYear == input7.value)
   
    document.querySelector('#booksByYear').innerHTML = ""
    
    newBooks.forEach(book => {
        const li = document.createElement('li')
        li.innerHTML = book.title
        document.querySelector('#booksByYear').append(li)
    })
})

// Task 8

// Task 9

// Task 10

document.querySelectorAll("ul li a").forEach(function(link) {
    link.addEventListener("click", function(e) {
        e.preventDefault(); // Prevent the page from jumping to the link on click
        const targetId = this.getAttribute("href").substring(1); // Get the value of the "href" attribute without the "#" symbol
        const tasks = document.querySelectorAll(".task");
        tasks.forEach(function(task) {
            if (task.id === targetId) {
                task.classList.add("current");
            } else {
                task.classList.remove("current");
            }
        });
    });
});
