let canvas = document.querySelector('canvas')
let ctx = canvas.getContext('2d')

// téglalapot, kört, képet, vonalat, bézier

ctx.fillStyle = "#1eff3e"
ctx.fillRect(30,50,100,200)
ctx.fillRect(200,90,100,200)

ctx.beginPath()
ctx.moveTo(400,300)
ctx.lineTo(30,30)
ctx.lineTo(400,30)
ctx.fill()
ctx.closePath()
ctx.stroke()

ctx.fillStyle = "#1e003e"
ctx.beginPath()
ctx.arc(500,300,60,0, 2* Math.PI)
ctx.fill()
ctx.stroke()


