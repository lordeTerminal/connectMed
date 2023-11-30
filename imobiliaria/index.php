<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>imobiliaria</title>
    </head>
    <body>
        <?php
        echo "php funcionando";
        ?>
        <form action="cadastra.php" method="POST">
            <label>Endereço</label><br>
            <input type="text" id="endereço" name="endereco"><br>
            <label>numero de quartos</label><br>
            <input type="number" id="quartos" name="quartos"><br>
            <label>Valor</label><br>
            <input type="number" id="valor" name="valor"><br>
            <input type="radio" id="casa" name="tipo" value="casa">
            <label for="casa">casa</label><br>
            <input type="radio" id="apartamento" name="tipo" value="apartamento">
            <label for="apartamento">apartamento</label><br>
            <input type="radio" id="comercio" name="tipo" value="comercio">
            <label for="comercio">comercio</label><br>
            <input type="radio" id="kitnet" name="tipo" value="kitnet">
            <label for="kitnet">kitnet</label><br>
            <input type="radio" id="terreno" name="tipo" value="terreno">
	    <label for="terreno">terreno</label><br>
            <label for="moreinfo">mais informações:</label>
            <input type="text" id="moreinfo" name="moreinfo"><br>
            <input type="submit" value="submit"><br>
	</form>
    </body>
</html>
