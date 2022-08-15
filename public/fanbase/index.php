<style>
    .flex-container {
        display: flex;
        flex-direction: column;
    }
    .page-title {
        text-align: center;
    }
    .button-group {
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        margin-bottom: 10px;
    }
    .btn {
        background-color: #2c3e50;
        color: white;
        padding: 8px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-decoration: none;
        border-radius: 4px;
    }
</style>
<div class="flex-container">
    <div class="page-title">
        <h3>
            Base de torcedores - All Blacks
        </h3>
    </div>
    <div class="button-group">
        <a
            class="btn"
            href="?controller=AllBlacksRugby\FanBase\Controllers\FanBaseController&method=upload">
            Upload de XML para tabela
        </a>
        <a
            class="btn"
            href="?controller=AllBlacksRugby\FanBase\Controllers\FanBaseController&method=downloadXlsxFile">
            Download dos dados em xlsx
        </a>
    </div>
    <div>
        <?= $htmlTable ?>
    </div>
</div>

