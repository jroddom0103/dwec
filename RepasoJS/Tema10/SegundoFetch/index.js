function funAjax() {
    fetch("jsonGET.php?nombre=Juan&ciudad=Ubrique")
        .then(result => result.json())
        .then(function (obj) {
            document.getElementById("datos").innerHTML =
            `Desde servidor ${obj.nombre} de ${obj.ciudad}`
        })
        .catch(e => console.log(`Error capturado:  ${e}`));
} 