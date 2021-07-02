<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Items</title>
</head>
<body>
    <h2> Search Items based on Category and Supplier </h2>

    <table>
        <form action="all_items_report.php" method="post">
            <tr height="30">
                <td></td>
                <td>
                    <select name="allsome" id="allsome">
                        <option value="all">All</option>
                    </select>
                </td>
                <td width="100" align="left">
                    <input type="Submit" value="List All Items">
                </td>
            </tr>
        </form>

        <form action="list_items_by_category_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="categoryid">Category ID:</label>
                </td>

                <td width="100" align="left">
                    <select name="categoryid" id="categoryid">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Items of this Category">
                </td>
            </tr>
        </form>

        <form action="list_items_by_supplier_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="supplierid">Supplier ID:</label>
                </td>

                <td width="100" align="left">
                    <input type="text" id="supplierid" name="supplierid">
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Items supplied by this Supplier">
                </td>
            </tr>
        </form>
    </table>    
</body>
</html>