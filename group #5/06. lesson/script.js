const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')
const bg_img = new Image();
bg_img.src = "bg.png"

let bird = {
    x: 50,
    y: canvas.height / 2,
    width: 50,
    height: 35,
    img: document.querySelector('img#bird')
}

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
    bird.y += 30 * dt;
}
function draw(){
    ctx.drawImage(bg_img,0,0, canvas.width, canvas.height)
    ctx.drawImage(bird.img,bird.x,bird.y, bird.width, bird.height)
}
gameLogic()