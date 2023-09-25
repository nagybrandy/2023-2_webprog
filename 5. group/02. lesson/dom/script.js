// Task 1
const button1 = document.querySelector('#task1 button')
const input1 = document.querySelector('#task1 input')
const h3 = document.querySelector('#helloText')

button1.addEventListener('click', handleClick)

function handleClick(){
    h3.innerHTML = `Hello ${input1.value}!`
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

// Task 4

// Task 5

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
        publicationYear: 1949,
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
