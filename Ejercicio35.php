<!DOCTYPE html>
<html>
    <body>

        <form method = "POST" action="">
            <label for="a">En clase de Clientes que lenguaje usamos?</label><br>
            <input type="radio" name="pregunta1" value="a"> A) JavaScript<br>
            <input type="radio" name="pregunta1" value="b"> B) PHP<br>

            <label for="b">Qué estructura de control permite ejecutar un bloque de código repetidas veces?</label><br>
            <input type="radio" name="pregunta2" value="a"> A) While<br>
            <input type="radio" name="pregunta2" value="b"> B) Switch<br>

            <label for="c">Qué lenguaje de marcas se utiliza para crear la estructura de una página web?</label><br>
            <input type="radio" name="pregunta3" value="a"> A) HTML<br>
            <input type="radio" name="pregunta3" value="b"> B) XML<br>

            <label for="d">Qué significa CSS?</label><br>
            <input type="radio" name="pregunta4" value="a"> A) Cascading Style Sheets<br>
            <input type="radio" name="pregunta4" value="b"> B) Custom Style Sheets<br>

            <label for="e">Qué función de PHP se usa para mostrar texto en la pantalla?</label><br>
            <input type="radio" name="pregunta5" value="a"> A) echo()<br>
            <input type="radio" name="pregunta5" value="b"> B) print()<br>

            <label for="f">Qué etiqueta se usa para hacer un formulario?</label><br>
            <input type="radio" name="pregunta6" value="a"> A) form<br>
            <input type="radio" name="pregunta6" value="b"> B) table<br>

            <label for="g">Qué servidor se usa en páginas web para probar?</label><br>
            <input type="radio" name="pregunta7" value="a"> A) Apache<br>
            <input type="radio" name="pregunta7" value="b"> B) Aternos<br>

            <label for="h">Qué es más seguro en la web?</label><br>
            <input type="radio" name="pregunta8" value="a"> A) https<br>
            <input type="radio" name="pregunta8" value="b"> B) http<br>

            <label for="i">Qué SO usamos en Despliegue de Aplicaciones Web?</label><br>
            <input type="radio" name="pregunta9" value="a"> A) Ubuntu<br>
            <input type="radio" name="pregunta9" value="b"> B) Xubuntu<br>

            <label for="j">Qué es un Sketch?</label><br>
            <input type="radio" name="pregunta10" value="a"> A) Un boceto<br>
            <input type="radio" name="pregunta10" value="b"> B) El diseño final<br><br>

            <input type="submit" value="Responder"><br>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $respuestas_correctas = array(
                "pregunta1" => "a",
                "pregunta2" => "a",
                "pregunta3" => "a",
                "pregunta4" => "a",
                "pregunta5" => "a",
                "pregunta6" => "a",
                "pregunta7" => "a",
                "pregunta8" => "a",
                "pregunta9" => "a",
                "pregunta10" => "a"
            );

            $puntuacion = 0;

            foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
                if (isset($_POST[$pregunta]) && $_POST[$pregunta] == $respuesta_correcta) {
                    $puntuacion++;
                }
            }

            echo "<h2>Tu calificación es: $puntuacion / 10</h2>";
        }
        ?>

    </body>
</html>
