/*
fetch("jsonGET.php")
    .then(result => result.json())
    .then(function (obj) {
        for (let i = 0; i < obj.length; i++) {
            document.getElementById("datos").innerHTML +=
                `<option id=${i}>${obj[i].nombre}</option>`
        }

        document.getElementById('datos').addEventListener('change', function (e) {
            const valorSeleccionado = e.target.value;

            let objetoSeleccionado = obj.find(item => item.nombre == valorSeleccionado);

            document.getElementById("id").textContent = objetoSeleccionado.id;
            document.getElementById("nombre").textContent = objetoSeleccionado.nombre;
            document.getElementById("apellidos").textContent = objetoSeleccionado.apellidos;
            document.getElementById("ciudad").textContent = objetoSeleccionado.ciudad;

        }
        )

    })
    .catch(e => console.log(`Error capturado:  ${e}`));
*/


async function busca(url) {
    const response = await fetch(url);
    const obJson = await response.json();
    for (let i = 0; i < obJson.length; i++) {
        document.getElementById("datos").innerHTML +=
            `<option id=${i}>${obJson[i].nombre}</option>`;
    }

    document.getElementById("datos").addEventListener('change', function (e) {
        const valorSeleccionado = e.target.value;

        let objetoSeleccionado = obJson.find(item => item.nombre === valorSeleccionado);

    document.getElementById("id").textContent = objetoSeleccionado.id;
    document.getElementById("nombre").textContent = objetoSeleccionado.nombre;
    document.getElementById("apellidos").textContent = objetoSeleccionado.apellidos;
    document.getElementById("ciudad").textContent = objetoSeleccionado.ciudad;
})
}
busca("jsonGET.php");      