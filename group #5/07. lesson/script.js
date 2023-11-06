const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')
const bg_img = new Image();
bg_img.src = "bg.png"

let bird = {
    x: 50,
    y: canvas.height / 2,
    width: 50,
    height: 35,
    vy: 0, // px/s,
    ay: 250,
    img: document.querySelector('img#bird')
}
const columns = []
const space_btw_c = 150
const col_dist = 300
const col_vel = -200
let points = 0

function practice(){
// rect, circle, lines, images

ctx.fillStyle = "#009900"
ctx.strokeStyle = "orange"
ctx.lineWidth = 10
ctx.fillRect(30,30,300,100)
ctx.strokeRect(400,30,300,100)

ctx.beginPath()
ctx.moveTo(500,300)
ctx.lineTo(200,100)
ctx.lineTo(500,100)
ctx.closePath()
ctx.fill()
ctx.stroke()

ctx.beginPath()
ctx.arc(200,200,100,0,2*Math.PI)
ctx.stroke()
}

let lastUpdateTime = performance.now()

function gameLogic(nowTime = performance.now()){
    let dt = (nowTime-lastUpdateTime) / 1000
    lastUpdateTime = nowTime
    update(dt);
    draw();
    requestAnimationFrame(gameLogic)
}

function update(dt){
    if(columns[0].x < 0){
        columns.shift();
        columns.shift();
        newColumn()
        points++;
    }
    bird.vy += bird.ay * dt;
    bird.y += bird.vy * dt;

    columns.forEach(col => col.x += col_vel * dt)
    if(gameOver()) {
        console.log(bird, columns)
        console.log("Game Over")
    }

}

function gameOver(){
    return collide(bird, columns[0]) || collide(bird, columns[1]) || bird.y > 400 || bird.y < 0
}
document.addEventListener('keydown', (e)=>  {
    if(e.code == "Space") bird.vy = -250
})

function draw(){
    ctx.drawImage(bg_img,0,0, canvas.width, canvas.height)
    ctx.drawImage(bird.img,bird.x,bird.y, bird.width, bird.height)

    // points
    ctx.fillStyle = 'black'
    ctx.font = '25px Arial'
    ctx.fillText(`Points: ${points}`, 10, 30)

    // columns
    columns.forEach(col => {
        ctx.drawImage(document.querySelector('#col'), col.x, col.y, col.w, col.h)
    })
}
function random(a,b){
    return Math.floor(Math.random()*(b-a+1)+a)
}
function collide(a,b){
    return !(
      b.y + b.h < a.y ||
      a.x + a.width < b.x ||
      a.y + a.height < b.y ||
      b.x + b.w < a.x 
    )
  }
function newColumn(){
    const h = random(10,canvas.height/2)
    columns.push({
        x: canvas.width,
        y: 0,
        w: 30,
        h: h,
    },
    {
        x: canvas.width,
        y: h+space_btw_c,
        w: 30,
        h: canvas.height-space_btw_c-h,
    })
}



const myInterval = setInterval(startGame, 1000)

let counter = 3
function startGame(){
    console.log(counter)
    ctx.drawImage(bg_img,0,0, canvas.width, canvas.height)
    ctx.font = '75px Arial'
    ctx.fillText(counter, 100, 300)
    counter--;
    if(counter < 0){
        clearInterval(myInterval)
        newColumn()
        gameLogic()
    }
}

const a = [0,2,3,4,5]

localStorage.setItem('values', JSON.stringify(a))
localStorage.setItem('name', 'Adam')

console.log(localStorage.getItem('name'))
console.log(JSON.parse(localStorage.getItem('values')))