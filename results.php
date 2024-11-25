<?php
if (isset($_GET['search_query'])) {
    $searchQuery = htmlspecialchars($_GET['search_query']); // Chống XSS
    echo "<h1>Kết quả tìm kiếm cho: <strong>$searchQuery</strong></h1>";

    // Mô phỏng kết quả tìm kiếm (thay bằng truy vấn cơ sở dữ liệu nếu có)
    $fakeDatabase = [
        "apple" => "Apple là một công ty công nghệ nổi tiếng.",
        "banana" => "Banana là một loại trái cây phổ biến.",
        "php" => "PHP là một ngôn ngữ lập trình server-side.",
    ];

    $found = false;
    foreach ($fakeDatabase as $key => $value) {
        if (stripos($key, $searchQuery) !== false) { // Tìm kiếm không phân biệt hoa thường
            echo "<p><strong>$key:</strong> $value</p>";
            $found = true;
        }
    }

    if (!$found) {
        echo "<p>Không tìm thấy kết quả nào phù hợp.</p>";
    }
} else {
    echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
}
?>
