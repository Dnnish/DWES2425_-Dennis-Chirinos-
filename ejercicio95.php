<!DOCTYPE html>
    <html lang="es">

        <body>

            <h2>Funciones Numéricas</h2>
            <form method="POST" action="">
                <label for="num">Introduce un número:</label><br>
                <input type="number" name="num"><br><br>

                <label for="pos">Posición del dígito (para digito N):</label><br>
                <input type="number" name="pos"><br><br>

                <label for="quitaD">Dígitos a quitar por detrás (para quitar por atras):</label><br>
                <input type="number" name="quitaD"><br><br>

                <label for="quitaA">Dígitos a quitar por delante (para quitar por adelante):</label><br>
                <input type="number" name="quitaA"><br><br>

                <input type="submit" value="Calcular"><br><br>
            </form>

            <?php


            // Función que devuelve la cantidad de dígitos de un número
            function digitos(int $num): int {
                return strlen((string)$num);
            }

            // Función que devuelve el dígito que ocupa la posición $pos (empezando por la izquierda)
            function digitN(int $num, int $pos): int {
                $num_str = (string)$num;
                if ($pos < 1 || $pos > strlen($num_str)) {
                    return -1; // Posición inválida
                }
                return (int)$num_str[$pos - 1]; // Se resta 1 porque las posiciones de los strings empiezan en 0
            }

            // Función que quita por detrás (derecha) $cuanto dígitos
            function quitaPerDarrera(int $num, int $cuanto): int {
                $num_str = (string)$num;
                if ($cuanto >= strlen($num_str)) {
                    return 0; // Si queremos quitar más dígitos de los que tiene el número, devolvemos 0
                }
                return (int)substr($num_str, 0, -$cuanto); // Eliminamos los últimos $cuanto caracteres
            }

            // Función que quita por delante (izquierda) $cuanto dígitos
            function quitaPerAdelante(int $num, int $cuanto): int {
                $num_str = (string)$num;
                if ($cuanto >= strlen($num_str)) {
                    return 0; // Si queremos quitar más dígitos de los que tiene el número, devolvemos 0
                }
                return (int)substr($num_str, $cuanto); // Eliminamos los primeros $cuanto caracteres
            }

            // Verificamos si el formulario fue enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtenemos los valores del formulario
                $num = (int)$_POST['num'];
                $pos = (int)$_POST['pos'];
                $quitaD = (int)$_POST['quitaD'];
                $quitaA = (int)$_POST['quitaA'];

                // Mostramos los resultados
                echo "<h3>Resultados:</h3>";
                echo "Número ingresado: $num<br>";
                echo "Cantidad de dígitos: " . digitos($num) . "<br>";

                $digit = digitN($num, $pos);
                echo "Dígito en la posición $pos: " . ($digit != -1 ? $digit : "Posición inválida") . "<br>";

                echo "Número después de quitar $quitaD dígitos por detrás: " . quitaPerDarrera($num, $quitaD) . "<br>";
                echo "Número después de quitar $quitaA dígitos por delante: " . quitaPerAdelante($num, $quitaA) . "<br>";
            }
            ?>

        </body>
    </html>
