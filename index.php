<!DOCTYPE html>
<html>
    <head>
        <title>Prova Feita | Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" href="_img/logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="_css/style.css" media="screen and (color)">
        <link rel="stylesheet" href="_css/mobile.css" media="(max-width: 720px)">
        <script type="text/javascript" src="_javascript/jquery-2.2.1.min.js"></script>
        <script type='text/javascript' src='_javascript/jquery.js'></script>
        <?php include "_php/functions.php"; ?>
    </head>
    <body>
        <?php include_once("_php/analyticstracking.php") ?>
        <?php include "_php/header.php";?>

        <div class="main">
            <form method="get" action="resultados.php">
                <fieldset>
                    <legend><strong>M1</strong></legend>
                    <label for="nm1">Nota M1:</label></br>
                    <input type="number" name="m1" value="" id="nm1" list="list" step="0.1" 
                    min="0" max="10" onFocus="limpa('nm1')" onBlur="zera('nm1')" placeholder="0.0" class="input-one" ></br>
                    <?php notas(); ?>
                </fieldset>
                <fieldset>
                    <legend><strong>M2</strong></legend>
                    <fieldset class="field-border">
                        <legend>Avaliação de Disciplina</legend>
                        <input type="number" name="nd" value="" id="nnd" list="list" step="0.1" 
                        min="0" max="10" onFocus="muda('nnd','rd')" onClick="aviso('obs-um',true)" 
                        onBlur="aviso('obs-um',false)" placeholder="0.0" class="input-two"/>
                        <?php notas(); ?>
                        <fieldset class="choice-field">
                            <legend>Realizada</legend>
                            <label for="drn">não</label>
                            <input type="radio" name="rd" id="drn" value="n" onClick="zera2('nnd')" checked/>
                            <label for="dry">sim</label>
                            <input type="radio" name="rd" id="dry" value="s"/>
                        </fieldset>
                        <span id="obs-um"></span>
                    </fieldset>
                    <fieldset class="field-border">
                        <legend>Integrada</legend>
                        <input type="number" name="ni" value="" id="nni" list="list" step="0.1" 
                        min="0" max="10" onFocus="muda('nni','ri')" onClick="aviso('obs-dois',true)" 
                        onBlur="aviso('obs-dois',false)" placeholder="0.0" class="input-two"/>
                        <?php notas(); ?>
                        <fieldset class="choice-field">
                            <legend>Realizada</legend>
                            <label for="irn">não</label>
                            <input type="radio" name="ri" id="irn" value="n" onClick="zera2('nni')" checked/>
                            <label for="iry">sim</label>
                            <input type="radio" name="ri" id="iry" value="s"/>
                        </fieldset>
                        <span id="obs-dois"></span>
                    </fieldset>
                </fieldset>
                <input type="submit" class="input-button" value="Calcular" onClick="zera()"/>
                <input type="reset"  class="input-button" value="Limpar" id="clear"/>
            </form>
        </div>
        <?php include "_php/footer.php"; ?>
        <script src="_javascript/script.js"></script>
    </body>
</html>