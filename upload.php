<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image_data']) && $_FILES['image_data']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image_data']['tmp_name'];
        $fileName = $_FILES['image_data']['name'];
        $fileSize = $_FILES['image_data']['size'];
        $fileType = $_FILES['image_data']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'webp');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './dist/img/gambaraset/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $response = array('success' => true, 'file_path' => $dest_path);
            } else {
                $response = array('success' => false, 'message' => 'Gagal memindahkan file yang diunggah');
            }
        } else {
            $response = array('success' => false, 'message' => 'Ekstensi file tidak diizinkan');
        }
    } else {
        $response = array('success' => false, 'message' => 'Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah');
    }

    echo json_encode($response);
}
?>
