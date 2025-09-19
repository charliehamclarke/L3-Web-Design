<?php
/**
 * make_gallery()
 * 
 * Generates a thumbnail gallery from a given folder inside /images/.
 * Each image is wrapped in a link for SimpleLightbox functionality.
 *
 * @param string $folder_name  Name of the subfolder under /images/
 */
function make_gallery($folder_name) {
  // File system path (server) and web path (browser)
  $fsDir  = __DIR__ . "/images/" . $folder_name . "/";
  $webDir = "images/" . $folder_name . "/";

  // Validate folder exists
  if (!is_dir($fsDir)) {
    echo "<p>Folder not found: " . htmlspecialchars($folder_name, ENT_QUOTES) . "</p>";
    return;
  }

  // Get all .jpg files in the folder
  $files = glob($fsDir . "*.jpg");

  // Handle case: no images
  if (!$files) {
    echo "<p>No images found in " . htmlspecialchars($folder_name, ENT_QUOTES) . ".</p>";
    return;
  }

  // Output gallery markup
  echo '<div class="gallery scatter">';
  foreach ($files as $absPath) {
    $relPath = $webDir . basename($absPath);
    $title   = basename($absPath); // use filename as alt text

    echo '<div class="item">';
    echo '<a href="' . htmlspecialchars($relPath) . '">';
    echo '<img src="' . htmlspecialchars($relPath) . '" alt="' . htmlspecialchars($title) . '">';
    echo '</a>';
    echo '</div>';
  }
  echo '</div>';
}
?>
