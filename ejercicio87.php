<!DOCTYPE html>
    <html>
        <body>
            <form method="POST" action="">
                <label for="pregunta">Escribe tu pregunta:</label><br>
                <input type="text" name="pregunta" required><br><br>
                <input type="submit" value="Preguntar a la Bola 8"><br><br>
            </form>

            <?php
            /*Prepara un formulario (html) con un textbox que realice una pregunta al usuario.
             A partir del formulario anterior, crea un programa que muestre la pregunta recibida
            y genere una respuesta de forma aleatoria entre un conjunto de respuestas predefinidas,
             almacenadas en una matriz: Si, no, quizás, claro que sí, por supuesto que no, no lo tengo claro,
            seguro, yo diría que sí, ni de cachondeo, etc.. . Este ejercicio se basa en el juego de la Bolla 8 mágica*/

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pregunta = $_POST['pregunta'];

                $respuestas = [
                    "Sí",
                    "No",
                    "Quizás",
                    "Claro que sí",
                    "Por supuesto que no",
                    "No lo tengo claro",
                    "Seguro",
                    "Yo diría que sí",
                    "Ni de cachondeo",
                    "Pregunta otra vez"
                ];

                $respuesta_aleatoria = $respuestas[array_rand($respuestas)];

                echo "<h3>Tu pregunta: $pregunta</h3>";
                echo "<h3>La Bola 8 Mágica dice: $respuesta_aleatoria</h3>";
            }
            ?>
        </body>
    </html>