<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  </head>
  <body>
    <table class="table">
        <thead>
            <th scope="col">Prénom:</th>
            <th scope="col">Nom</th>
            <th scope="col">Téléphone:</th>
            <th scope="col">E-mail:</th>
            <th scope="col">Ville:</th>
            <th scope="col">Sexe:</th>
            <th scope="col">Date de naissance:</th>
            <th scope="col">CV:</th>
            <th scope="col">Score:</th>
            <!-- <th scope="col">delete:</th> -->

        </thead>
        <tbody>
          <?php
                        include_once('/RecruitMe/controllers/sign-up-login/db_classes.php');
 
                        $database = new Dbhandler();
                        $db = $database->connect();
                        try{    
                            $sql = 'SELECT * FROM candidats';
                            foreach ($db->query($sql) as $row) {
                                ?>
                                <tr>
                                    
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['birth_date']; ?></td>
                                    <td><?php echo $row['resume']; ?></td>
                                    <td><?php echo $row['score']; ?></td>
                                    
                                    <td>
                                        <!-- <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-bs-toggle="modal">Edit</a> -->
                                        <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal">Delete</a>
                                    </td>
                                    <?php include('edit_delete_modal_candidate.php'); ?>
                                </tr>
                                <?php 
                            }
                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }
 

 
                    ?> 
        </tbody>
       
      </table>
  </body>
</html>




