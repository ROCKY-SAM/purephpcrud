<?php include 'template/header.php'; ?>
<?php include 'database.php'; ?>


<div class="row">
    <div class="col-10"><h1>TASK LIST</h1></div>
    <div class="col-2"><button type="button" class="btn btn-info">Add  Task</button></div>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        <?php
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM task_list where task_status = 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</th>";
                echo "<td>" . $row["task_name"] . "</td>";
                echo "<td>" . $row["task_des"] . "</td>";
                echo "<td>" . $row["task_status"] . "</td>";
                echo "<td> <i class='fas fa-edit'></i> <i class='fas fa-trash'></i> </td>";
                echo "</tr>";
            }
        } else {
            echo '<tr><td colspan="3"></td></tr>';
        }

        mysqli_close($conn);
        ?>
    </tbody>
</table>


<?php include 'template/footer.php'; ?>