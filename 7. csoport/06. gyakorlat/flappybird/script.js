const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

const madar = {
    x: 50,
    y: canvas.height / 2,
    name: "Géza",
    ay: 0,
    width: 40,
    height: 30,
    picture: document.querySelector('#birdpic')
}

function draw(){
    let bg_img = document.querySelector('#bgpic');
    ctx.drawImage(bg_img,0,0, canvas.width, canvas.height)
    ctx.drawImage(madar.picture, madar.x, madar.y, madar.width, madar.height)
}

function update(dt){
    madar.y += 10*dt
}


let elozoIdo = performance.now()

function jatekciklus(most = performance.now()){
    const dt = (most - elozoIdo) / 1000
    elozoIdo = most
    update(dt)
    draw()
    requestAnimationFrame(jatekciklus)
}


// VÉGE!
jatekciklus()