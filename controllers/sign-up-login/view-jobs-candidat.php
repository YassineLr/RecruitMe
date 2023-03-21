<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/RecruitMe/public/stylesheets/view-applies.css">
</head>

<body>
    <div class="container-wrapper">

        <table style="margin-bottom:20px;" class="table">
            <thead>
                <th scope="col">Catégorie:</th>
                <th scope="col">Titre d'Emploi</th>
                <th scope="col">Type d'emploi:</th>
                <th scope="col">Compétences Requises:</th>
                <th scope="col">Salaire:</th>
                <th scope="col">Années d'Expérience:</th>
                <th scope="col">Adresse:</th>
                <th scope="col">Date d'Expiration:</th>
            </thead>
            <tbody>
            <h1>Opportunites</h1>
                
                <?php
                include_once('./db_classes.php');
                $id_candidat = $_SESSION["user"];
                $database = new Dbhandler();
                $db = $database->connect();
                try {
                    $sql = 'SELECT * FROM job_list where id not in (select id_job from applies where id_candidat=? );';
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$id_candidat["user"]["id_candidat"]]);

                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                   
                        $url = "/RecruitMe/controllers/sign-up-login/apply.php?idjob=".$row["id"]. "&idcandidat=" .$id_candidat["user"]["id_candidat"];
?>
                        
                        <tr>

                            <td><?php echo $row['categorie']; ?></td>
                            <td><?php echo $row['titre_emploi']; ?></td>
                            <td><?php echo $row['competence']; ?></td>
                            <td><?php echo $row['salaire']; ?></td>
                            <td><?php echo $row['annee']; ?></td>
                            <td><?php echo $row['adresse']; ?></td>
                            <td><?php echo $row['description']; ?></td>

                            <td><?php
                                echo '<a href="' . $url . '" class="btn btn-success btn-sm" name="view" id="' . $row["id"] . '" >Postuler</a>';
                                ?>
                            </td>
                        </tr>
                <?php

                    }
                  ?>

            </tbody>
           
        </table>
        <h1>Accepté</h1>

        <table  class="table">
            <thead >
                <th scope="col">Catégorie:</th>
                <th scope="col">Titre d'Emploi</th>
                <th scope="col">Type d'emploi:</th>
                <th scope="col">Compétences Requises:</th>
                <th scope="col">Salaire:</th>
                <th scope="col">Années d'Expérience:</th>
                <th scope="col">Adresse:</th>
                <th scope="col">Date d'Expiration:</th>
            </thead>
            <tbody>

            <?php
                    $sql_accepted = $db->prepare('SELECT * from job_list where id in( SELECT id_job FROM applies where accepted=1 and id_candidat=?);');
                        $sql_accepted->execute([$id_candidat["user"]["id_candidat"]]);
                    
                    
                        foreach ($sql_accepted->fetchAll(PDO::FETCH_ASSOC) as $accepted_user) {
         
                        $style = "pointer-events: none; background-color:grey;";
                ?>
                        <tr>

                            <td><?php echo $accepted_user['categorie']; ?></td>
                            <td><?php echo $accepted_user['titre_emploi']; ?></td>
                            <td><?php echo $accepted_user['competence']; ?></td>
                            <td><?php echo $accepted_user['salaire']; ?></td>
                            <td><?php echo $accepted_user['annee']; ?></td>
                            <td><?php echo $accepted_user['adresse']; ?></td>
                            <td><?php echo $accepted_user['description']; ?></td>
                            <td>Accepté <i class="fa-solid fa-badge-check " style="margin-left:5px; font-size: 20px; color: green;"></i></td>


                        </tr>

                <?php


                }} catch (PDOException $e) {
                    echo "There is some problem in connection: " . $e->getMessage();
                }



                ?>
            </tbody>

            </table>
    </div>
    <!-- <script src="/RecruitMe/public/javascript/view-resume.js"></script> -->
</body>

</html>