<?php include('header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('./php/db_connection.php');

    $name = $_POST['name'];

    if ($connect->connect_errno) {
        echo "Failed to connect to MySQL: " . $connect->connect_error;
        exit();
    }

    $sql = "SELECT name, email, address FROM users WHERE name='$name'";
    echo "QUERY RESULTS:";

    // Execute multi query
    if ($connect->multi_query($sql)) {
        do {
            // Store first result set
            if ($result = $connect->store_result()) {
                while ($row = $result->fetch_row()) {
                    printf("<br>%s || %s || %s\n", $row[0], $row[1], $row[2]);
                }
                $result->free_result();
            }

            // Check for errors after each query
            if ($connect->errno) {
                echo "Error: " . $connect->error;
            }

            // if there are more result-sets, then print a divider
            if ($connect->more_results()) {
                printf("-------------\n");
            }

            // Prepare next result set
        } while ($connect->next_result());
    } else {
        // Handle the error if the multi_query fails
        echo "Error in the multi_query: " . $connect->error;
    }

    // Close the database connection
    $connect->close();
}
?>
<div id="main-div">
    <div>
        <h2>Search any user[SQL Injection Scenario]</h2>
    </div>
    <form class="row g-3" method="post" action="search.php">
        <div class="col-md-6">
            <label for="name" class="form-label">Enter name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>

