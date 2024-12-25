<?php

function addUser($conn, $email, $name) {
    $sql = "INSERT INTO users (email, name) VALUES (:email, :name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);

    // Vul de waarden in de SQL-string
    $fullSql = str_replace([':email', ':name'], ["'" . $email . "'", "'" . $name . "'"], $sql);
    echo "SQL Query: $fullSql";

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
        return false;
    }
}

function updateUser($conn, $id, $email, $name) {
    $sql = "UPDATE users SET email = :email, name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);

    // Vul de waarden in de SQL-string
    $fullSql = str_replace([':id', ':email', ':name'], ["'" . $id . "'", "'" . $email . "'", "'" . $name . "'"], $sql);
    echo "SQL Query: $fullSql";

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
        return false;
    }
}

function readUsers($conn) {
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    echo "SQL Query: $sql";

    if ($stmt->execute()) {
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($users)) {
            echo "Geen gebruikers gevonden.";
        }
        return $users;
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
        return false;
    }
}

function deleteUser($conn, $id) {
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    echo "SQL Query: $sql";

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
        return false;
    }
}
