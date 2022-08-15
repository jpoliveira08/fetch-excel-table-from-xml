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
        padding: 20px 10px;
        width: 200px;
        background-color: #333;
        color: #FFF;
        text-align: center;
        display: block;
        margin-top: 10px;
        cursor: pointer;
    }
</style>

<div class="flex-container">
    <h3>Envie o arquivo XML para atualizar a tabela de torcedores</h3>
    <label for="xml-file">
        Buscar arquivo (.xml)
    </label>
    <form action="" method="POST">
        <input type="file" name="xml-file" id="xml-file">
    </form>
</div>