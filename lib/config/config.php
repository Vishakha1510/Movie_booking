<?php
class Config {
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "movie_db";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // -------------------- USERS --------------------
    public function insert_user($name, $email, $password) {
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $email, $password]);
        return $stmt->rowCount();
    }

    public function fetch_all_users() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch_single_user($user_id) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_user($user_id, $name, $email, $password) {
        $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $email, $password, $user_id]);
    }

    public function delete_user($user_id) {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id]);
    }

    // -------------------- MOVIES --------------------
    public function insert_movie($title, $description, $duration, $release_date) {
        $sql = "INSERT INTO movies (title, description, duration, release_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description, $duration, $release_date]);
    }

    public function fetch_all_movies() {
        $sql = "SELECT * FROM movies";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch_single_movie($movie_id) {
        $sql = "SELECT * FROM movies WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$movie_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_movie($movie_id, $title, $description, $duration, $release_date) {
        $sql = "UPDATE movies SET title = ?, description = ?, duration = ?, release_date = ? WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description, $duration, $release_date, $movie_id]);
    }

    public function delete_movie($movie_id) {
        $sql = "DELETE FROM movies WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$movie_id]);
    }

    // -------------------- BOOKINGS --------------------
    public function insert_booking($user_id, $movie_id, $booking_date, $seats) {
        $sql = "INSERT INTO bookings (user_id, movie_id, booking_date, seats) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id, $movie_id, $booking_date, $seats]);
    }

    public function fetch_all_bookings() {
        $sql = "SELECT b.*, u.name AS user_name, m.title AS movie_title
                FROM bookings b
                JOIN users u ON b.user_id = u.user_id
                JOIN movies m ON b.movie_id = m.movie_id";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch_single_booking($booking_id) {
        $sql = "SELECT * FROM bookings WHERE booking_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$booking_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_booking($booking_id, $user_id, $movie_id, $booking_date, $seats) {
        $sql = "UPDATE bookings
                SET user_id = ?, movie_id = ?, booking_date = ?, seats = ?
                WHERE booking_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id, $movie_id, $booking_date, $seats, $booking_id]);
    }

    public function delete_booking($booking_id) {
        $sql = "DELETE FROM bookings WHERE booking_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$booking_id]);
    }


    // -------------------- THEATERS --------------------
public function insert_theater($name, $location) {
    $sql = "INSERT INTO theaters (name, location) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $location]);
}

public function fetch_all_theaters() {
    $sql = "SELECT * FROM theaters";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function fetch_single_theater($theater_id) {
    $sql = "SELECT * FROM theaters WHERE theater_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$theater_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update_theater($theater_id, $name, $location) {
    $sql = "UPDATE theaters SET name = ?, location = ? WHERE theater_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $location, $theater_id]);
}

public function delete_theater($theater_id) {
    $sql = "DELETE FROM theaters WHERE theater_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$theater_id]);
}

// -------------------- SHOWS --------------------
public function insert_show($movie_id, $theater_id, $show_time) {
    $sql = "INSERT INTO shows (movie_id, theater_id, show_time) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$movie_id, $theater_id, $show_time]);
}

public function fetch_all_shows() {
    $sql = "SELECT * FROM shows";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function fetch_single_show($show_id) {
    $sql = "SELECT * FROM shows WHERE show_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$show_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update_show($show_id, $movie_id, $theater_id, $show_time) {
    $sql = "UPDATE shows SET movie_id = ?, theater_id = ?, show_time = ? WHERE show_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$movie_id, $theater_id, $show_time, $show_id]);
}

public function delete_show($show_id) {
    $sql = "DELETE FROM shows WHERE show_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$show_id]);
}

// -------------------- SEATS --------------------
public function insert_seat($show_id, $seat_number) {
    $sql = "INSERT INTO seats (show_id, seat_number) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$show_id, $seat_number]);
}

public function fetch_all_seats() {
    $sql = "SELECT * FROM seats";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function fetch_single_seat($seat_id) {
    $sql = "SELECT * FROM seats WHERE seat_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$seat_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update_seat($seat_id, $show_id, $seat_number, $is_booked) {
    $sql = "UPDATE seats SET show_id = ?, seat_number = ?, is_booked = ? WHERE seat_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$show_id, $seat_number, $is_booked, $seat_id]);
}

public function delete_seat($seat_id) {
    $sql = "DELETE FROM seats WHERE seat_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$seat_id]);
}


}
?>
