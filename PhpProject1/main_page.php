<html>

    <head>
        <title>Database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>

            table

            {
                position:absolute;

                left:0.01%;

                border-style:solid;

                border-width:10px;

                border-color:pink;

            }
            Name{
                position:absolute;

                left:10%;

                top:11%;

                border-style:solid;

                border-width:10px;

                border-color:pink;

            }
            .row justify-content-center my-5 {
                display: inline-block;
            }

            .row justify-content-center my-5 {
                color: black;
                float: left;
                padding: 50px 50px;
                text-decoration: none;
            }
        </style>

    </head>
    <body>
        <iframe name="dummyframe" id="dummyframe" style="display:none"></iframe>
        <form action="insert.php" method="post" target="dummyframe">
            <b>Insert: </b> <input type="text" name="Name" id="Name" autocomplete="off" size="10"  placeholder="Write Name ">
            <input type="text" name="Surname" id="Surname" autocomplete="off" size="10"   placeholder="Write Surname ">
            <input type="text" name="Birthday" id="Birthday" autocomplete="off" maxlength="10"   placeholder="Write Birthday " size="10">
            <input type="submit" value="Submit">
        </form>

        <form action="update.php" method="post" target="dummyframe">
            <b>Update: </b>
            <input type="text" name="id_ud" id="id_ud" autocomplete="off" maxlength="10"   placeholder="Write id" size="10">
            <input type="text" name="Name_ud" id="Name_ud" autocomplete="off" size="10"  placeholder="Write Name ">
            <input type="text" name="Surname_ud" id="Surname_ud" autocomplete="off" size="10"   placeholder="Write Surname ">
            <input type="text" name="Birthday_ud" id="Birthday_ud" autocomplete="off" maxlength="10"   placeholder="Write Birthday " size="10">
            <input type="submit" value="Update">
        </form>

        <form action="delete.php" method="post" target="dummyframe">
            <b>Delete</b> <input type="text" name="id_del" id="id_del" autocomplete="off" maxlength="10"   placeholder="Write id" size="10">
            <input type="submit" value="Delete">

        </form>


                    <div class="row justify-content-center my-5  ">
            <div class="col-8 text-center">
                <table class="table table-bordered" id="table">
<thead class="bg-primary">
                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                            <th>Surname</th>
                            <th>Birthday</th>
                            
                        </tr>

<tbody class="row_position">

                            <?php
                        $servername = "localhost";
                        $username = "ESP32";
                        $password = "esp32io.com";
                        $database_name = "listofnames";
    $mysqli = new mysqli($servername, $username, $password, $database_name);

// Create connection
                        $conn = mysqli_connect($servername, $username, $password, $database_name);
// Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM people_tbl ORDER BY position_order";
    $users = $mysqli->query($sql);
    //$result = mysqli_query($conn, $sql);
    while ($user = $users->fetch_assoc()) {
        //displaying data in table rows dynamically
                                ?>
        
    <tr  id="<?php echo $user['ID'] ?>">
            <td><?php echo $user['ID'] ?></td>
        <td><?php echo $user['Name'] ?></td>
        <td><?php echo $user['Surname'] ?></td>
            <td><?php echo $user['Birthday'] ?></td>
        </tr>
<?php } ?>

                        </tbody>

                </table>
            </div>
        </div>

        <script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
               console.log(selectedData.push($(this).attr("ID")));
            });
            updateOrder(selectedData);
            
        }
    });

    function updateOrder(data) {
        $.ajax({
            url:"changeOrder.php",
            type:'post',
            data:{position:data},
            success:function(){
                console.log("your change successfully saved");
            }
        })
    }
        </script>  

    </body>


</html>
