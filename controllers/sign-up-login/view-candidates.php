<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/RecruitMe/public/stylesheets/view-applies.css">
    <link rel="stylesheet" href="/RecruitMe/public/stylesheets/dashboard.css">
  </head>
  <body>
    <div class="container-wrapper">

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
            <th scope="col">Score/100:</th>
            <!-- <th scope="col">delete:</th> -->

        </thead>

        <tbody>
          <?php
                  
                        $e = $_GET["id"];
                        include_once('./db_classes.php');

                        $database = new Dbhandler();
                        $db = $database->connect();

                        try{    
                            $sql = 'SELECT candidats.*, job_list.id
                            FROM candidats
                            JOIN applies ON candidats.id_candidat = applies.id_candidat
                            JOIN job_list ON applies.id_job = job_list.id
                            WHERE job_list.id = ? ;';
                            $stmt = $db->prepare($sql);
                            $stmt->execute([$e]);

                            foreach ($stmt as $row) {
                                ?>
                                <tr>
                                  
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['birth_date']; ?></td>
                                    <td><a href="/RecruitMe/controllers/sign-up-login/download-resume.php?idcandidat=<?php echo $row["id_candidat"]?>" class="btn btn-success btn-sm" style="background-color: #00b4ff; border:none;"><i style="font-size:15px; font-weight: 500;" class="fa-light fa-cloud-arrow-down"></i></a></td>
                                    <td><?php echo $row['score']; ?></td>
                                    
                                    <td>
                                        <a href="#" onclick="loadContent();" class="btn btn-success btn-sm" ><i class="fa-regular fa-eye"></i></a>
                                        <a href="/RecruitMe/controllers/sign-up-login/accept-candidat.php?idcandidat=<?php echo $row['id_candidat']; ?>&idjob=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm" >Accepter</a>
                                        <a href="#refuser_<?php echo $row['id_candidat']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal">Refuser</a>
                                    </td>
                                    <?php include('/RecruitMe/views/recruters/edit_delete_modal_candidate.php'); ?>
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

      <div id="resume-content" class="resume-content-wrapper">

      </div>
    </div>

  </body>
  <script src="/RecruitMe/public/javascript/view-candidate.js"></script>
</html>




