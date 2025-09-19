<?php
function make_gallery($folder_name) {
    $fsDir  = __DIR__ . "/images/" . $folder_name . "/";
    $webDir = "images/" . $folder_name . "/";

    if (!is_dir($fsDir)) {
        echo "<p>Folder not found: " . htmlspecialchars($folder_name, ENT_QUOTES) . "</p>";
        return;
    }

    $files = glob($fsDir . "*.jpg");
    if (!$files) {
        echo "<p>No images found in " . htmlspecialchars($folder_name, ENT_QUOTES) . ".</p>";
        return;
    }

    echo '<div class="gallery scatter">';
    foreach ($files as $absPath) {
        $relPath = $webDir . basename($absPath);
        $title   = basename($absPath);

        echo '<div class="item">';
        echo '<a href="' . htmlspecialchars($relPath) . '">';
        echo '<img src="' . htmlspecialchars($relPath) . '" alt="' . htmlspecialchars($title) . '">';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
}
?>
