<?php
include 'db_connection.php';

$uploadDir = 'uploads/'; // Define the upload directory

if (isset($_POST['submit'])) {
    $categ = $_POST['Categ'];

    foreach ($_FILES['files']['name'] as $key => $filename) {
        $fileTmp = $_FILES['files']['tmp_name'][$key];
        $fileSize = $_FILES['files']['size'][$key];
        $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
        $destination = $uploadDir . basename($filename);

        if (!in_array($fileExt, ['zip', 'pdf', 'docx'])) {
            echo "File extension must be .zip, .pdf, or .docx";
        } elseif ($fileSize > 1000000) {
            echo "File too large!";
        } else {
            if (move_uploaded_file($fileTmp, $destination)) {
                $sql = "INSERT INTO files (name, categ, size, downloads) VALUES ('$filename', '$categ', $fileSize, 0)";
                if ($conn->query($sql)) {
                    header("Location: ../pages/upload.php");
                } else {
                    echo "Database error: " . $conn->error;
                }
            } else {
                echo "Failed to upload file.";
            }
        }
    }
}

if (isset($_GET['delete'])) {
    $fileId = $_GET['delete'];
    $sql = "SELECT name FROM files WHERE FilesID = $fileId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $filePath = $uploadDir . $file['name'];
        if (unlink($filePath)) {
            $sql = "DELETE FROM files WHERE FilesID = $fileId";
            if ($conn->query($sql)) {
                echo "<script>alert('File deleted.'); window.location.href = '../pages/upload.php';</script>";
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Failed to delete file.";
        }
    } else {
        echo "File not found.";
    }
}

if (isset($_GET['read'])) {
    $fileId = $_GET['read'];
    $sql = "SELECT name FROM files WHERE FilesID = $fileId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $filePath = $uploadDir . $file['name'];
        if (file_exists($filePath)) {
            header('Content-Type: application/pdf');
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "File not found.";
    }
}
?>
