<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th colspan="3">Product</th>
                <th colspan="2">Price</th>
                <th colspan="2">Type</th>
            </tr>
            <?php
                $dirs = ["netbook", "portable", "ultraportable"];
                foreach ($dirs as $dir) {
                    $categories = scandir($dir);
                    foreach ($categories as $category) {
                        if ($category != '.' && $category != '..') {
                            $filename = pathinfo($dir . "/" . $category, PATHINFO_FILENAME); 
                            $format = explode("#", $filename);
                            $product = $format[0]; 
                            $price = $format[1];
            ?>
            <tr>
                <td colspan="3"><a href='view.php?product=<?php echo urlencode($product); ?>&price=<?php echo urlencode($price); ?>&dir=<?php echo urlencode($dir)?>'><?php echo $product; ?></a></td>
                <td colspan="2"><?php echo $price; ?></td>
                <td colspan="2"><?php echo $dir; ?></td>
            </tr>
            <?php } } }
            ?>
        </table>
    </body>
</html>
