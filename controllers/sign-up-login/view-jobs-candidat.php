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

        <table class="table">
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
                <?php
                include_once('./db_classes.php');
                $id_candidat = $_SESSION["user"];
                $database = new Dbhandler();
                $db = $database->connect();
                try {
                    $sql = 'SELECT * FROM job_list';
                    foreach ($db->query($sql) as $row) {
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
                                echo '<a href="' . $url . '" class="btn btn-success btn-sm" name="view" id="' . $row["id"] . '">Postuler</a>';
                ?>
                            </td>
                            <?php include('./edit_delete_modal_candidate.php'); ?>
                        </tr>
                <?php
                    }
                } catch (PDOException $e) {
                    echo "There is some problem in connection: " . $e->getMessage();
                }



                ?>
            </tbody>

        </table>
    </div>
    <!-- <script src="/RecruitMe/public/javascript/view-resume.js"></script> -->
</body>

</html>