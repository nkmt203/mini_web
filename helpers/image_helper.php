<?php
function uploadImage($fileInput, $targetDir = "../../uploads/")
{
    if (isset($fileInput) && $fileInput['error'] == 0) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . '_' . basename($fileInput['name']);
        $targetFile = $targetDir . $fileName;

        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileAllow = ['jpg', 'png'];

        if (in_array($fileType, $fileAllow)) {
            if (move_uploaded_file($fileInput['tmp_name'], $targetFile)) {
                return $fileName;
            }
        }
    }
    return null;
}

function deleteImage($fileName, $targetDir = __DIR__ . "../../uploads/")
{
    if (!empty($fileName)) {
        $filePath = $targetDir . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        }
    }
    return false;
}
