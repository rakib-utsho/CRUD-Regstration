<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/table.css">
    <title>user</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>DELETE</th>
                <th>EDIT</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require('./conection.php');
            $p=crud::selectdata();
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if(count( $p)>0){
                for($i=0; $i<count( $p);$i++){
                    echo '<tr>';
                    foreach( $p[$i] as $key =>$value){
                        if($key!='id'){
                            echo '<td>'.$value.'</td>';
                        }
                    }
                    ?>

                    <td><a href="user.php?id=<?php echo $p[$i]['id'] ?>"><img src="./style/img/trash.svg" alt=""></a></td>
                    <td><a href="update.php?id_up=<?php echo $p[$i]['id'] ?>"><img src="./style/img/edit.svg" alt=""></a></td>

                    <?php
                    echo '</tr>';
                }
            }

    ?> 
        </tbody>
    </table>
</body>
</html>