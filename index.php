<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-t">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        .navigation { margin-top: 20px; }
        .navigation a { text-decoration: none; padding: 10px 15px; background-color: #007bff; color: white; border-radius: 5px; }
        .navigation a.disabled { background-color: #ccc; pointer-events: none; cursor: default; }
    </style>
</head>
<body>

    <?php
    // Total number of slides
    $total_slides = 12;

    // Get the current slide number from the URL, default to 1
    $current_slide = isset($_GET['slide']) ? (int)$_GET['slide'] : 1;

    // Ensure the slide number is within the valid range
    if ($current_slide < 1) {
        $current_slide = 1;
    } elseif ($current_slide > $total_slides) {
        $current_slide = $total_slides;
    }

    // Define the slide filename
    $slide_file = 'slide' . $current_slide . '.html';

    // Display the slide content if the file exists
    if (file_exists($slide_file)) {
        echo file_get_contents($slide_file);
    } else {
        echo '<h1>Error: Slide not found!</h1>';
    }
    ?>

    <div class="navigation">
        <?php
        // Previous link
        if ($current_slide > 1) {
            echo '<a href="?slide=' . ($current_slide - 1) . '">Previous</a>';
        } else {
            echo '<a href="#" class="disabled">Previous</a>';
        }

        // Next link
        if ($current_slide < $total_slides) {
            echo '<a href="?slide=' . ($current_slide + 1) . '" style="margin-left: 10px;">Next</a>';
        } else {
            echo '<a href="#" class="disabled" style="margin-left: 10px;">Next</a>';
        }
        ?>
    </div>

</body>
</html>