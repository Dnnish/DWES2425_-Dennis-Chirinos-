<!DOCTYPE>
    <html>
        <body>

            <form method = "POST" action="">
                <label for="a">Valor de a:</label><br>
                <input type="number" name="a" step="any" required><br>
                <label for="b">Valor de b:</label><br>
                <input type="number" name="b" step="any" required><br><br>
                <input type="submit" value="CALCULAR"><br>
            </form>
            <?php
                //Realiza un programa que resuelve una ecuación de primer grado
                //(tipo ax + b = 0)
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ecuA = $_POST['a'];
                $ecuB = $_POST['b'];

                            if ($ecuA == 0){
                                if ($ecuB == 0){
                                    echo "<h2>hay infinitas soluciones</h2>";
                                }else{
                                    echo "<h2>No hay solución para esta escuación</h2>";
                                }

                            }else{
                                $resul = -$ecuB / $ecuA;
                                echo "<h2>La solucion de la equació es: x = " . round($resul, 2) . "</h2>";
                            }
                }

            ?>
        </body>
    </html>
