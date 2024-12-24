<?php



function addUser($conn, $email, $name) {


    try {
        $sql = "INSERT INTO users (email, name) VALUES (:email, :name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        return $stmt->execute(); // Retourneert true bij succes


    } catch (PDOException $e) {
        // Foutmelding loggen
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

function UpdateUser($conn, $id, $email, $name) {

    try {
        $sql = "UPDATE users SET email= :email, name= :name WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        echo "SQLQuery: $stmt";
        return $stmt->execute(); // Retourneert true bij succes


    } catch (PDOException $e) {
        // Foutmelding loggen
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

function ReadUsers($conn) {

    try {

        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($users)) {
            // Als er geen resultaten zijn
            echo "Geen gebruikers gevonden.";
        }
        return $users;
    } catch (PDOException $e) {
        // Foutmelding loggen
        error_log("Error: " . $e->getMessage());
        return false;
    }
}



function deleteUser($conn, $id) {

    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Retourneert true bij succes


    } catch (PDOException $e) {
        // Foutmelding loggen
        error_log("Error: " . $e->getMessage());
        return false;
    }
}