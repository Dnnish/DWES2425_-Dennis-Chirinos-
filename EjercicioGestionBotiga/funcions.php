<?php
class Producte {
    private $nom;
    private $descripcio;
    private $preu;
    private $categories = [];

    public function __construct($nom, $descripcio, $preu) {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
    }

    public function agregarCategoria(Categoria $categoria) {
        $this->categories[] = $categoria;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescripcio() {
        return $this->descripcio;
    }

    public function getPreu() {
        return $this->preu;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function mostrarCaracteristicas() {
        $caracteristicas = "Nombre: " . $this->getNom() . "<br>";
        $caracteristicas .= "Descripción: " . $this->getDescripcio() . "<br>";
        $caracteristicas .= "Precio: " . $this->getPreu() . "€<br>";
        $caracteristicas .= "Categorías: ";

        if (!empty($this->categories)) {
            foreach ($this->categories as $categoria) {
                $caracteristicas .= $categoria->getNom() . ", ";
            }
            $caracteristicas = rtrim($caracteristicas, ", ");
        } else {
            $caracteristicas .= "No tiene categorías.";
        }

        return $caracteristicas;
    }
}

class Categoria {
    private $nom;
    private $descripcio;
    private $productos = [];

    public function __construct($nom, $descripcio) {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
    }

    public function agregarProducte(Producte $producte) {
        $this->productos[] = $producte;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getProductos() {
        return $this->productos;
    }
}

function crearProducte($nom, $descripcio, $preu): Producte {
    return new Producte($nom, $descripcio, $preu);
}

function crearCategoria($nom, $descripcio): Categoria {
    return new Categoria($nom, $descripcio);
}

function agregarCategoriaAProducte(Producte $producte, Categoria $categoria): void {
    $producte->agregarCategoria($categoria);
    $categoria->agregarProducte($producte);
}

function obtenirProductesPorCategoria(Categoria $categoria): string {
    $productos = $categoria->getProductos();

    if (empty($productos)) {
        return "No hay nada en la lista.";
    }

    $resultado = "";
    foreach ($productos as $producto) {
        $resultado .= $producto->getNom() . ", ";
    }

    return rtrim($resultado, ", ");
}

function mostrarProductes(array $categorias, int $eleccion): string {
    if (isset($categorias[$eleccion - 1])) {
        $categoriaSeleccionada = $categorias[$eleccion - 1];
        return obtenirProductesPorCategoria($categoriaSeleccionada);
    } else {
        return "Opción no válida.";
    }
}
?>
