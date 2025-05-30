<?php
// Modelo Telefono
class Telefono {
    private $conn;
    private $table_name = "telefono";

    // Propiedades de la tabla telefono
    public $idtelefono;
    public $idpersona;
    public $numero;

    // Constructor para la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo teléfono
    public function create() {
        try {
            $query = "INSERT INTO " . $this->table_name . " (idpersona, numero)
                      VALUES (:idpersona, :numero)";

            $stmt = $this->conn->prepare($query);

            // Bind de los valores
            $stmt->bindParam(":idpersona", $this->idpersona, PDO::PARAM_INT);
            $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Error en create() para telefono: " . $e->getMessage());
            return false;
        }
    }


    // Leer todos los teléfonos
    public function read1() {
        try {
            $query = "SELECT t.idtelefono, t.idpersona, t.numero,
                             p.nombres AS persona_nombres, p.apellidos AS persona_apellidos
                      FROM " . $this->table_name . " t
                      LEFT JOIN persona p ON t.idpersona = p.idpersona";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en read1() para telefono: " . $e->getMessage());
            return [];
        }
    }

public function getAll() {
        try {
            $query = "SELECT t.idtelefono, t.idpersona, t.numero,
                             p.nombres AS persona_nombres, p.apellidos AS persona_apellidos
                      FROM " . $this->table_name . " t
                      LEFT JOIN persona p ON t.idpersona = p.idpersona";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getAll() para telefono: " . $e->getMessage());
            return [];
        }
    }



    // Leer todos los teléfonos
    public function read() {
        try {
            $query = "SELECT t.idtelefono, t.idpersona, t.numero,
                             p.nombres AS persona_nombres, p.apellidos AS persona_apellidos
                      FROM " . $this->table_name . " t
                      LEFT JOIN persona p ON t.idpersona = p.idpersona";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en read() para teléfono: " . $e->getMessage());
            return [];
        }
    }


   


    // Leer un solo teléfono por ID
    public function readOne() {
        try {
            $query = "SELECT t.idtelefono, t.idpersona, t.numero,
                             p.nombres AS persona_nombres, p.apellidos AS persona_apellidos
                      FROM " . $this->table_name . " t
                      LEFT JOIN persona p ON t.idpersona = p.idpersona
                      WHERE t.idtelefono = :idtelefono LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":idtelefono", $this->idtelefono, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en readOne() para telefono: " . $e->getMessage());
            return null;
        }
    }

    // Actualizar un teléfono
    public function update() {
        try {
            $query = "UPDATE " . $this->table_name . " SET
                        idpersona = :idpersona,
                        numero = :numero
                      WHERE idtelefono = :idtelefono";

            $stmt = $this->conn->prepare($query);

            // Bind de los valores
            $stmt->bindParam(":idpersona", $this->idpersona, PDO::PARAM_INT);
            $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);
            $stmt->bindParam(":idtelefono", $this->idtelefono, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Error en update() para telefono: " . $e->getMessage());
            return false;
        }
    }

    // Eliminar un teléfono
    public function delete() {
        try {
            if (empty($this->idtelefono)) {
                return false;
            }
            error_log("Intentando eliminar el teléfono con ID: " . $this->idtelefono);

            $query = "DELETE FROM " . $this->table_name . " WHERE idtelefono = :idtelefono";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":idtelefono", $this->idtelefono, PDO::PARAM_INT);

            if ($stmt->execute()) {
                error_log("Teléfono con ID " . $this->idtelefono . " eliminado correctamente.");
                return true;
            } else {
                error_log("Error en delete() para telefono: La consulta no se ejecutó correctamente.");
                return false;
            }

        } catch (PDOException $e) {
            error_log("Error en delete() para telefono: " . $e->getMessage());
            return false;
        }
    }

    // Leer todos los teléfonos asociados a una persona específica
    public function readByPersona($idpersona) {
        try {
            $query = "SELECT t.idtelefono, t.idpersona, t.numero,
                             p.nombres AS persona_nombres, p.apellidos AS persona_apellidos
                      FROM " . $this->table_name . " t
                      LEFT JOIN persona p ON t.idpersona = p.idpersona
                      WHERE t.idpersona = :idpersona";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":idpersona", $idpersona, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en readByPersona() para telefono: " . $e->getMessage());
            return [];
        }
    }
}
?>


