<!DOCTYPE html>
<html>

<head>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    td,
    th {
        border: 1px solid black;
        padding: 5px;
    }

    th {
        text-align: left;
    }
    </style>
</head>

<body>

    <?php
    $p = intval($_GET['p']);

    // $conn = mysqli_connnect('localhost', 'peter', 'abc123', 'my_db');
    $conn = mysqli_connect('localhost', 'root', '', 'tailor_management_system');
    // if (!$conn) {
    //     die('Could not connnect: ' . mysqli_error($conn));
    // }

    mysqli_select_db($conn, "ajax_demo");
    $sql = "SELECT * FROM clothes WHERE id = '$p'";
    $result = mysqli_query($conn, $sql);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Date Added</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <input type="text" readonly value="<?php echo $row['name'] ?>">
            <td><?php echo  $row['name'] ?> </td>
            <td><?php echo  $row['price'] ?> </td>
            <td><?php echo  $row['dateadded'] ?> </td>
        <tr>
            <?php   } ?>
    </table>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>