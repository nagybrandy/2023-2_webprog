// Készítsd el a Fahrenheitből Celsius fokba átalakító függvényt!


function fToC (f) {
    let c = ( (f - 32) * 5) / 9;
    return c;
}

console.log(fToC(83))