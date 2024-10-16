<!DOCTYPE html>
<html>
    <body>
        <form method="POST" action="">
            <label for="Cantidad">Escribe cuántos términos de la serie Fibonacci quieres ver:</label><br>
            <input type="number" name="Cantidad" required><br>
            <input type="submit" value="Generar Fibonacci"><br>
        </form>

        <?php
        // Verifica si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST['Cantidad'];

            // Inicialización de los dos primeros números de Fibonacci
            $a = 0;
            $b = 1;

            // Imprime el primer término
            echo "<h3>Serie Fibonacci:</h3>";
            echo "<p>$a</p>";

            // Si el usuario pide más de 1 término, empieza el cálculo de Fibonacci
            if ($n > 1) {
                echo "<p>$b</p>";  // Imprime el segundo término

                // Genera el resto de la secuencia
                for ($i = 2; $i < $n; $i++) {
                    $siguiente = $a + $b;
                    echo "<p>$siguiente</p>";
                    $a = $b;
                    $b = $siguiente;
                }
            }
        }
        ?>
    </body>
</html>
