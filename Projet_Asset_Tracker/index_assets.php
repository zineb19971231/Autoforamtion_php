<?php
include "functions_assets.php";

$searchinput ='';

$AllAssetscat=getAllAssetsCategory($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET')
     $searchinput = $_GET['search'] ?? '';
    if (isset($searchinput)) {
        $AllAssetscat = searchByName($pdo, $searchinput);
    }
    else {
        $AllAssetscat = getAllAssetsCategory($pdo);
    }
?>

<!Doctype html>
<html>
<head>
    <title>Assets</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto 1fr auto;
            gap: 15px;
            padding: 20px;
        }

        h1 {
            grid-column: 1 / 3;
        }

        .search {
            grid-column: 1 / 3;
            display: flex;
            justify-content: space-between;
        }

        .table {
            grid-column: 1 / 3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        .deployed {
            color: green;
            font-weight: bold;
        }

        .repair {
            color: red;
            font-weight: bold;
        }

        .total {
            grid-column: 2 / 3;
            text-align: right;
            font-weight: bold;
        }

    </style>
</head>

<body>

<div class="container">

    <h1>List of Assets</h1>

    <div class="search">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="search by name">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="table">
        <table>
            <tr>
                <th>Serial_Number</th>
                <th>Device_Name</th>
                <th>Status</th>
                <th>Price</th>
                <th>Category</th>
            </tr>

            <?php foreach ($AllAssetscat as $asset) : ?>
            <tr>
                <td><?php echo $asset['serial_number']; ?></td>
                <td><?php echo $asset['name']; ?></td>

                <td class="<?php echo ($asset['etat'] == 'Deployed') ? 'deployed' : 'repair'; ?>">
                    <?php echo $asset['etat']; ?>
                </td>

                <td><?php echo $asset['price']; ?></td>
                <td><?php echo $asset['name_cat']; ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <div class="total">
        Total Price: <?php echo getTotalPrice($pdo); ?>
    </div>

</div>

</body>
</html>