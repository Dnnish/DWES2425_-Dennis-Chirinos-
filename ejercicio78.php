<!DOCTYPE html>
    <html lang="es">
        <body>
        <h2>Ingrese 10 números</h2>
        <form method="POST" action="">
            <?php
            /*Realiza un programa que pida 10 números por teclado y que los almacene en una matriz.
             A continuación se mostrará el contenido de este array junto al índice (0 – 9) utilizando para ello una tabla.
             Seguidamente el programa pasará los números primos a las primeras posiciones,
            desplazando el resto de números (los que no son primeros) de tal forma que no se pierda ninguna.
             Al final debe mostrarse la matriz resultante*/
            for ($i = 0; $i < 10; $i++) {
                echo "Número " . ($i + 1) . ": <input type='number' name='numeros[]' required><br>";
            }
            ?>
            <input type="submit" value="Enviar"><br><br>
        </form>

        <?php

        function esPrimo($numero) {
            if ($numero <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    return false;
                }
            }
            return true;
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtenemos los números del formulario
            $numeros = $_POST['numeros'];


            echo "<h3>Matriz original:</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Índice</th>
                        <th>Número</th>
                    </tr>";
            foreach ($numeros as $indice => $numero) {
                echo "<tr>
                        <td>$indice</td>
                        <td>$numero</td>
                      </tr>";
            }
            echo "</table>";


            $numerosPrimos = [];
            $numerosNoPrimos = [];


            foreach ($numeros as $numero) {
                if (esPrimo($numero)) {
                    $numerosPrimos[] = $numero;
                } else {
                    $numerosNoPrimos[] = $numero;
                }
            }


            $resultado = array_merge($numerosPrimos, $numerosNoPrimos);


            echo "<h3>Matriz resultante:</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Índice</th>
                        <th>Número</th>
                    </tr>";
            foreach ($resultado as $indice => $numero) {
                echo "<tr>
                        <td>$indice</td>
                        <td>$numero</td>
                      </tr>";
            }
            echo "</table>";
        }
        ?>

        </body>
    </html>
