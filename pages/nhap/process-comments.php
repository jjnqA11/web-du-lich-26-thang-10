<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['comment'])) {
    $comment = htmlspecialchars(trim($_POST['comment']));
    $username = htmlspecialchars($_COOKIE['user']);

    $newComment = ['username' => $username, 'comment' => $comment];

    $commentsFile = 'comments.json';
    $commentsFromFile = [];
    if (file_exists($commentsFile)) {
        $commentsFromFile = json_decode(file_get_contents($commentsFile), true);
        if (!is_array($commentsFromFile)) {
            $commentsFromFile = [];
        }
    }

    array_unshift($commentsFromFile, $newComment);
    file_put_contents($commentsFile, json_encode($commentsFromFile, JSON_PRETTY_PRINT));

    echo json_encode(['success' => true, 'comment' => $newComment]);
    exit;
}

echo json_encode(['success' => false]);
exit;
?>