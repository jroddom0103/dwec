fetch("carteras.json")
.then(result => result.json())
.then(obJson => console.log(obJson[2].nombre))
.catch(e => console.log(`Error capturado:  ${e}`));