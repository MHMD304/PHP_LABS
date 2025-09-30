<?php 
    session_start();
    $totalfee=0;
    if (isset($_GET['edit']) && isset($_GET['quantity'])) {
        foreach ($_GET['quantity'] as $name => $newQuantity) {
            if (isset($_SESSION[$name])) {
                $_SESSION[$name]['quantity'] = $newQuantity;
            }
        }
    }
?>
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
        <center>
            <a href="list.php">List</a>
        </center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <table>
                <tr>
                    <th colspan="3">Product</th>
                    <th colspan="1">Price</th>
                    <th colspan="3">Quantity</th>
                    <th colspan="2">Total Price</th>
                    <th colspan="2">Category</th>
                </tr>
                <?php 
                    foreach ($_SESSION as $name => $info) {
                        $price = $info['price'];
                        $quantity = $info['quantity'];
                        $totalPrice = $price * $quantity;
                        $totalfee+=$totalPrice;
                        $cat = $info['cat'];
                ?>
                <tr>
                    <td colspan="3"><?php echo htmlspecialchars($name); ?></td>
                    <td colspan="1"><?php echo htmlspecialchars($price) . "$"; ?></td>
                    <td colspan="3">
                        <input min="0" name="quantity[<?php echo htmlspecialchars($name); ?>]" type="number" step="1" value="<?php echo htmlspecialchars($quantity); ?>">
                    </td>
                    <td colspan="2"><?php echo htmlspecialchars($totalPrice) . "$"; ?></td>
                    <td colspan="2"><?php echo htmlspecialchars($cat); ?></td>
                </tr>
                <?php } ?>
            </table>
            <br>
            <center>
            <input style="width:100px" type="submit" name="edit" value="Edit">
            <h2><?php echo "Total Fee:".htmlspecialchars($totalfee)."$"?></h2>
            </center>
        </form>
    </body>
</html>
