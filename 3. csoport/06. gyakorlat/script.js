let canvas = document.querySelector('canvas')
let ctx = canvas.getContext('2d')

ctx.fillStyle = "lightblue"

let bg_img = new Image()
bg_img.src = "bg.png"
ctx.drawImage(bg_img, 0,0)
