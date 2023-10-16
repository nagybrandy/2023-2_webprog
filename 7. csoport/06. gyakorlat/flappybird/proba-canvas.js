const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

// téglalap, kör, vonal, háromszög, képet

ctx.fillStyle = "#ff00ff"
ctx.fillRect(50,200,300,100)

ctx.fillStyle = "#ffff00"
ctx.fillRect(150,80,300,100)

ctx.beginPath()

ctx.moveTo(400,200)
ctx.lineTo(100,20)
ctx.lineTo(400,20)
ctx.strokeStyle = "orange"
ctx.lineWidth = 5;
ctx.fillStyle = "#00ff00"
ctx.fill()
ctx.closePath()
ctx.stroke()

ctx.beginPath()

ctx.arc(50,50,30,0, 2 * Math.PI)
ctx.fill()

ctx.stroke()