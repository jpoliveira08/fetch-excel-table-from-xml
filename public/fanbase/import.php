<style>
    .flex-container {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
    }

    input[type="file"] {
        display: none;
    }
    label {
        padding: 10px 10px;
        width: 400px;
        background-color: #343a40;
        color: white;
        text-align: center;
        display: block;
        margin: 10px auto;
        cursor: pointer;
        border-radius: 8px;
        border: 1px;
    }

    .btn {
        background-color: #6c757d;
        color: white;
        padding: 8px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-decoration: none;
        border-radius: 8px;
        cursor: pointer;
        border: 1px;
    }

    .btn:hover {
        background-color: #495057;
    }

</style>

<div class="flex-container">
    <h3>Envie o arquivo XML para atualizar a tabela de torcedores</h3>
    <label for="xml-file" id="xml-file-label">
        Buscar arquivo (.xml)
    </label>
    <form
        action="?controller=AllBlacksRugby\FanBase\Controllers\FanBaseController&method=update"
        method="POST"
        enctype="multipart/form-data"
    >
        <input type="file" name="xml-file" id="xml-file" onchange="validateAndUpload(this);">
        <button class="btn" type="submit" cursor="pointer">Enviar</button>
    </form>
</div>

<script>
    let xmlFileLabel = document.getElementById('xml-file-label');

    function validateAndUpload(input) {
        if (input.files) {
            xmlFileLabel.innerHTML = `Arquivo selecionado: ${input.files[0].name}`;
            return;
        }
    }

</script>
