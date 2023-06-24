<?php
$connect = mysqli_connect("localhost","root","","inventory_system");
$output='';
if(isset($_POST["export_excel"]))
{
    $sql ="SELECT * FROM sales ORDER BY id DESC";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $output.='
        <table class="table" bordered="1">
        <tr>
        <th>Id</th>
        <th>Product_ID</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date</th>
        </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
            $output .='
            <tr>
               <td>'.$row["id"].'</td>
               <td>'.$row["product_id"].'</td>
               <td>'.$row["qty"].'</td>
               <td>'.$row["price"].'</td>
               <td>'.$row["date"].'</td>
            </tr>
            ';
        }
        $output .='</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=report.xls");
        echo $output;

    }
}

?>