<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <h1>Welcome to My Website</h1>

    <?php
    include 'db_connection.php'; // Kết nối cơ sở dữ liệu

    // Truy vấn dữ liệu và hiển thị trên HTML
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row["id"] . " - " . $row["name"] . $row["password"] . $row["email"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No data found";
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>

</body>
</html>
