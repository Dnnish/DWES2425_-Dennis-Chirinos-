<!DOCTYPE>
<html>
    <body>

    <form method = "POST" action="">
        <label for="radio">radio</label><br>
        <input type="number" name="radio" step="any" required><br>
        <label for="altura">altura</label><br>
        <input type="number" name="altura" step="any" required><br>
        <input type="submit" value="Calcular"><br>
    </form>

        <?php
        // Escribe un programa que calcule el volumen de un cono
        // mediante la fórmula
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $radio = $_POST['radio'];
                $altura = $_POST['altura'];
                class Cono
                {
                    public function VolumenCono($radio, $altura)
                    {
                        $pi = 3.1416;
                        $volumen = (1/3) * $pi * pow($radio, 2) * $altura;
                        return $volumen;
                    }
                }
                $cono = new Cono();
                $volumen = $cono->VolumenCono($radio, $altura);

                echo "<h2>El volum del con és: " . round($volumen, 2) . " cm³</h2>";
            }
        ?>
    </body>
</html>