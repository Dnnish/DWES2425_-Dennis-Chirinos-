<!DOCTYPE html>
    <html>
        <body>
            <form method="POST" action="">
                <label for="numero">Introduce un número:</label><br>
                <input type="number" name="numero"><br><br>
                <label for="digito">Introduce un dígito a buscar:</label><br>
                <input type="number" name="digito" min="0" max="9"><br><br>
                <input type="submit" value="Buscar"><br><br>
            </form>

            <?php
            /*Realiza un programa que pida primero un número y a continuación un dígito.
            El programa debe darnos la posición (o posiciones) contando de izquierda a derecha
            que ocupa este dígito en el número introducido.*/
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = $_POST['numero'];
                $digito = $_POST['digito'];
                // Convertimos el número y el dígito a strings para poder buscar dentro del número
                $numero_str = strval($numero);
                $digito_str = strval($digito);
                $posiciones = [];

                // Usamos un bucle para encontrar todas las posiciones del dígito
                $posicion = strpos($numero_str, $digito_str);
                while ($posicion !== false) {
                    // Guardamos la posición (contando desde 1)
                    $posiciones[] = $posicion + 1;

                    // Buscamos la siguiente aparición
                    $posicion = strpos($numero_str, $digito_str, $posicion + 1);
                }

                // Mostramos el resultado
                if (count($posiciones) > 0) {
                    echo "<h3>El dígito $digito se encuentra en las posiciones: " . implode(", ", $posiciones) . "</h3>";
                } else {
                    echo "<h3>El dígito $digito no se encuentra en el número $numero.</h3>";
                }
            }

            ?>
        </body>
    </html>
