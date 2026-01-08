<?php
/**
 * APK Download Handler
 * Ensures proper MIME type and headers for APK files on mobile devices
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get the file parameter
$file = isset($_GET['file']) ? sanitize_text_field($_GET['file']) : '';

if (empty($file)) {
    wp_die('No file specified');
}

// Validate the file exists and is an APK
$upload_dir = wp_upload_dir();
$file_path = $upload_dir['basedir'] . '/' . $file;

if (!file_exists($file_path) || pathinfo($file_path, PATHINFO_EXTENSION) !== 'apk') {
    wp_die('File not found or invalid file type');
}

// Get file info
$file_name = basename($file_path);
$file_size = filesize($file_path);

// Set proper headers for APK download
header('Content-Type: application/vnd.android.package-archive');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Content-Length: ' . $file_size);
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');

// Clean output buffer
if (ob_get_level()) {
    ob_end_clean();
}

// Read and output the file
readfile($file_path);
exit;