console.log("hola");

document.getElementById('estados').addEventListener('change', function() {
    var estadoId = this.value;
    fetch('/estados?id=' + estadoId)
        .then(response => response.json())
        .then(data => {
            var municipiosSelect = document.getElementById('municipios');
            municipiosSelect.innerHTML = '';
            data.forEach(function(municipio) {
                var option = document.createElement('option');
                option.value = municipio.municipioID;
                option.text = municipio.nombre;
                municipiosSelect.appendChild(option);
            });
    });
});
