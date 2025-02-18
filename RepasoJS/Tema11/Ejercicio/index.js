async function busca(url) {
    const response = await fetch(url);
    const obJson = await response.json();


    $("#datos")
        .append($.map(obJson, function(item,index){
            return $("<option></option>")
            .attr("id", index)
            .text(item.nombre)[0];
        }));

    $("#datos").on('change', async function (e) {
        const valorSeleccionado = $(this).val();

        let objetoSeleccionado = obJson.find(item => item.nombre === valorSeleccionado);

        $("#id,#nombre,#apellidos,#ciudad").html(function() {
            return objetoSeleccionado[$(this).attr('id')];
        });
})
}
busca("jsonGET.php");      