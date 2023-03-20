<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/RecruitMe/public/stylesheets/recruter-jobs.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>



    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <form action="/RecruitMe/controllers/sign-up-login/add.php" method="post">
                    <div class="field input-field">
                        <div class="line">
                            <div class="flex-column">
                                <label for="categorie">Catégorie:</label>
                                <select name="categorie" id="categorie" class="form-select">
                                    <option value="IT">IT</option>
                                    <option value="marketing-digital">Marketing Digital</option>
                                    <option value="développement Web">Développement Web</option>
                                    <option value="Finance">Finance</option>
                                    <option value="HR">HR</option>
                                </select>
                            </div>

                            <div class="flex-column">
                                <label for="titre">Titre d'emploi:</label>
                                <input type="text" class="input" name="titre">
                            </div>

                        </div>

                        <div class="line">
                            <div class="flex-column">
                                <label for="type-emploi">Type d'emploi:</label>
                                <select name="type-emploi" id="type-emploi" class="form-select">
                                    <option value="temps-plein">à temps plein</option>
                                    <option value="temps-partiel">à temps partiel</option>
                                </select>
                            </div>
                            <div class="flex-column">
                                <label for="competence">Compétences Requises:</label>
                                <input type="text" class="input" name="competence">
                            </div>
                        </div>


                        <div class="line">
                            <div class="flex-column">
                                <label for="salaire">Salaire:</label>
                                <input type="text" class="input" name="salaire">
                            </div>

                            <div class="flex-column">
                                <label for="experience">Années d'Expérience:</label>
                                <input type="number" class="input" name="experience">
                            </div>

                        </div>

                        <div class="line">
                            <div class="flex-column">
                                <label for="adresse">Adresse:</label>
                                <input type="text" class="input" name="adresse">
                            </div>
                            <div class="flex-column">
                                <label for="date">Date d'Expiration:</label>
                                <input type="date" class="input " name="date">
                            </div>

                        </div>


                        <div class="line">
                            <div class="flex-column">
                                <label for="Description">Description:</label>
                                <textarea id="Description" class="input" name="description"></textarea>
                            </div>

                        </div>

                        <div class="field button-field">
                            <button type="submit" name="submit">Ajouter</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>