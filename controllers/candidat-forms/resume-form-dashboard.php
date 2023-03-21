

<?php


require_once './send-resume.php';
$formSend = new CandidatsResume();
$userInfo = $_SESSION['user'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu | Side Navigation Bar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../public/stylesheets/resume-form.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    
  </script>
  
  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


  <!-- CSS -->
  <link rel="stylesheet" href="/RecruitMe/public/stylesheets/dashboard.css" />

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
</head>
<body>
    <header>

        <div class="pattern"></div>

        <div class="pattern1">
        </div>

    </header>

    <script>
        var user = <?php echo json_encode($userInfo); ?>;
        console.log(user);

 
    </script>
    <div style="margin-top:100px" class="side-bar-wrapper">

        <div class="side-bar-container">
            <ul class="nav-follow" id="nav-follow">
                <li class="nav-follow-item side-bar-clicked" id="pers-scroll">
                    <i class="fa-regular fa-user"></i>
                </li>
                <li class="nav-follow-item" id="educ-scroll">
                    <i class="fa-regular fa-graduation-cap"></i>

                </li>

                <li class="nav-follow-item" id="exp-scroll">
                    <i class="fa-regular fa-briefcase"></i>

                </li>
                <li class="nav-follow-item" -item id="skill-scroll">
                    <i class="fa-regular fa-computer-mouse"></i>


                </li>
                <li class="nav-follow-item" id="lang-scroll">
                    <i class="fa-light fa-language"></i>

                </li>
            </ul>
            <form class="row g-3 needs-validation formPers" action="/RecruitMe/controllers/candidat-forms/send-resume.php" method="POST" novalidate id="pers-form">

                <div class="container">
                    <div class="form-section form-resume" id="form-resume">
                        <div class="first-inputs">
                            <div class="upload-image">
                                <img src="<?php echo $userInfo["user"]["photo"]?>" width="100px" height="100px" alt="" id="preview">
                                <div class="round">
                                    <input type="file" accept="image/*" onchange="previewImage(event)">
                                    <i class="fa fa-camera" style="color: #fff;"></i>
                                </div>
                            </div>
                            <div class="name">
                                <div class="col-md-4" style="width: 100%;">

                                    <label for="validationCustom01" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $userInfo["user"]["fname"];?>"required>
                                    <div class="invalid-feedback">
                                        Veuillez entrer un prénom.
                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 100%;">
                                    <label for="validationCustom02" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $userInfo["user"]["lname"] ;?>" required>
                                    <div class="invalid-feedback">
                                        Veuillez entrer un nom.
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="email-num">
                            <div class="col-md-4" style="width: 50%;">
                                <label for="validationCustomUsername" class="form-label">E-mail</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" id="validationCustomUsername" value="<?php echo $userInfo["user"]["email"] ;?>" aria-describedby="inputGroupPrepend" required data-ddg-inputtype="identities.emailAddress">
                                    <div class="invalid-feedback">
                                        Veuillez entrer un e-mail valide.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="width: 50%;">
                                <label for="validationCustomUsername" class="form-label">Numéro de telephone</label>
                                <div class="input-group">
                                    <input type="tel" id="phone" class="form-control" value="<?php echo $userInfo["user"]["phone"] ;?>" style="width: 100%;">


                                    <div class="invalid-feedback">
                                        Veuillez entrer un numéro valide.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6" style="width: 100%;">
                            <label for="validationCustom03" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="validationCustom03"  value="<?php echo $userInfo["user"]["adress"] ;?>" required>
                            <div class="invalid-feedback">
                                Veuillez entrer une adresse valide.
                            </div>
                        </div>
                        <div class="pers-inputs-wrap">

                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom04" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="validationCustom05" value="<?php echo $userInfo["user"]["city"] ;?>" required>

                                <div class="invalid-feedback">
                                    Veuillez entrer une ville valide.
                                </div>
                            </div>
                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom05" class="form-label">Code Postale</label>
                                <input type="number" class="form-control" id="validationCustom05" value="<?php echo $userInfo["user"]["zip_code"] ;?>" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer un code valide.
                                </div>
                            </div>

                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom04" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control datepicker" value="<?php echo $userInfo["user"]["birth_date"] ;?>" placeholder="14/10/2001">

                                <div class="invalid-feedback">
                                    Veuillez entrer une date valide.
                                </div>
                            </div>
                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom05" class="form-label">Ville de naissance</label>
                                <input type="text" class="form-control" id="validationCustom05" value="<?php echo $userInfo["user"]["birth_city"] ;?>" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer un code postal valide.
                                </div>
                            </div>

                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom04" class="form-label">Nationalité</label>
                                <input type="text" class="form-control" id="validationCustom05" value="<?php echo $userInfo["user"]["origin"] ;?>" required>

                                <div class="invalid-feedback">
                                    Veuillez entrer une nationalité.
                                </div>

                            </div>
                            <div class="col-md-3" style="width: 49%;">
                                <label for="validationCustom05" class="form-label">Genre</label>
                                <select class="form-select" id="validationCustom04"  required>
                                    <option selected disabled value="">Choisir...</option>
                                    <option value="Homme" <?=$userInfo["user"]["gender"] == 'Homme' ? ' selected="selected"' : '';?>>Homme</option>
                                    <option value="Femme" <?=$userInfo["user"]["gender"] == 'Femme' ? ' selected="selected"' : '';?>>Femme</option>
                                    <option value="Autre" <?=$userInfo["user"]["gender"] == 'Autre' ? ' selected="selected"' : '';?>>Autre</option>
                                </select>
                                <div class="invalid-feedback">
                                    Veuillez entrer un code postal.
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="form-section form-education" id="form-education">
                        <div class="edu-header">
                            <i class="fa-regular fa-graduation-cap"></i>
                            <h1>Education</h1>
                        </div>
                        <div class="row g-4 formEduc " id="educ-form">

                            <div class="form-educ" id="edu-form-0">
                                <input type="hidden" name="form" value="educ-form">

                                <div class="first-inputs">
                                    <div class="degree-city">
                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom01" class="form-label">Diplôme</label>
                                            <select type="text" class="form-select"selected="<?php echo $userInfo["edu"][0]["diplomat"] ;?>" id="validationCustom01" required>
                                                <option value="" selected disabled>Choisissez...</option>
                                                <option value="bac"<?=$userInfo["edu"][0]["diplomat"] == 'bac' ? ' selected="selected"' : '';?>>Bac</option>
                                                <option value="bac2"<?=$userInfo["edu"][0]["diplomat"] == 'bac2' ? ' selected="selected"' : '';?>>Bac+2</option>
                                                <option value="bac3"<?=$userInfo["edu"][0]["diplomat"] == 'bac3' ? ' selected="selected"' : '';?>>Bac+3</option>
                                                <option value="bac5"<?=$userInfo["edu"][0]["diplomat"] == 'bac5' ? ' selected="selected"' : '';?>>Bac+5</option>
                                                <option value="ing"<?=$userInfo["edu"][0]["diplomat"] == 'ing' ? ' selected="selected"' : '';?>>Ingenieur</option>
                                                <option value="doctorat"<?=$userInfo["edu"][0]["diplomat"] == 'doctorat' ? ' selected="selected"' : '';?>>Doctorat</option>
                                            
                                    
                                            </select>

                                        </div>
                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom02" class="form-label">Ville</label>
                                            <input type="text" class="form-control" value="<?php echo $userInfo['edu'][0]["city"] ;?>" id="validation" required>

                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-4" style="width: 100%;">
                                    <label for="validationCustomUsername" class="form-label">Établissement</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" value="<?php echo $userInfo['edu'][0]["establishment"] ;?>" id="validationCustom" required data-ddg-inputtype="identities.addressCity">


                                    </div>
                                </div>
                                <div class="edu-dates">
                                    <div class="col-md-3" style="width: 49%;">
                                        <label for="validationCustom04" class="form-label">Date de debut</label>
                                        <input type="date" class="form-control edu-date" value="<?php echo $userInfo['edu'][0]["b_date"] ;?>"placeholder="14/10/2001">


                                    </div>
                                    <div class="col-md-3" style="width: 49%;">
                                        <label for="validationCustom04" class="form-label">Date d'obtention</label>
                                        <input type="date" class="form-control edu-date" value="<?php echo $userInfo['edu'][0]["f_date"] ;?>"placeholder="14/10/2001">

                                    </div>
                                </div>



                                <div class="col-md-6" style="width: 100%;">
                                    <label for="validationCustom03" class="form-label">Déscription</label>
                                    <textarea type="textarea" class="form-control"  id="validationCustom03"><?php echo $userInfo['edu'][0]["description"] ;?></textarea>

                                </div>



                                <div class="btns">

                                    <button class="delete-btn" type="button">
                                        Supprimer</button>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="add-btn-edu">
                        <button class="btn btn-primary add-btn-edu">
                            <i class="fa-regular fa-circle-plus"></i>
                            Ajouter un diplôme</button>
                    </div>

                    <!-- EXP FORM -->

                    <div class="form-section form-experience" id="form-experience">

                        <div class="exp-header">
                            <i class="fa-regular fa-briefcase"></i>
                            <h1>Éxperience</h1>

                        </div>
                        <div class="row g-4 formExp " id="exp-form">

                            <div class="form-exp" id="exp-form-0">

                                <input type="hidden" name="form" value="exp-form">

                                <div class="first-inputs">
                                    <div class="degree-city">

                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom01" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" value="<?php echo $userInfo['exp'][0]["role"] ;?>" id="validationCustom01" required>

                                        </div>
                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom02" class="form-label">Ville</label>
                                            <input type="text" class="form-control" id="validation" value="<?php echo $userInfo['exp'][0]["city"] ;?>" required>


                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-4" style="width: 100%;">
                                    <label for="validationCustomUsername" class="form-label">Entreprise</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="validationCustom" value="<?php echo $userInfo['exp'][0]["entreprise"] ;?>" required data-ddg-inputtype="identities.addressCity">


                                    </div>
                                </div>
                                <div class="exp-dates">
                                    <div class="col-md-2" style="width: 49%;">
                                        <label for="validationCustom04" class="form-label">Date de début</label>
                                        <input type="date" class="form-control edu-date" value="<?php echo $userInfo['exp'][0]["b_date"] ;?>" placeholder="14/10/2001">

                                    </div>
                                    <div class="col-md-3" style="width: 49%;">
                                        <label for="exp-end-date" class="form-label">Date de fin</label>
                                        <input type="date" class="form-control edu-date" id="exp-end-date" value="<?php echo $userInfo['exp'][0]["f_date"] ;?>" placeholder="14/10/2001">

                                    </div>
                                </div>



                                <div class="col-md-6" style="width: 100%;">
                                    <label for="exp-desc" class="form-label">Déscription</label>
                                    <textarea type="textarea" class="form-control"  id="exp-desc"><?php echo htmlspecialchars($userInfo['exp'][0]["description"]) ;?></textarea>


                                </div>

                                <div class="btns">
                                    <button class="delete-btn-exp" type="button">Supprimer</button>

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="add-btn-exp">
                        <button class="btn btn-primary add-btn-exp">
                            <i class="fa-regular fa-circle-plus"></i>

                            Ajouter une éxperience</button>
                    </div>



                    <!-- COMPS FORM -->

                    <div class="form-section form-competence" id="form-competence">

                        <div class="comp-header">
                            <i class="fa-regular fa-computer-mouse"></i>
                            <h1>Compétences</h1>

                        </div>
                        <div class="row g-4 formSkill lang-form" id="skills-form">

                            <div class="form-comp" id="comp-form-0">
                                <input type="hidden" name="form" value="skills-form">
                                <div class="first-inputs">
                                    <div class="degree-city">

                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="" class="form-label">Compétence</label>
                                            <input type="text" class="form-control" value="<?php $userInfo["skills"][0]["skill_name"];?>" id="validationCustom01" required>

                                        </div>
                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom02" class="form-label">Niveau</label>
                                            <select class="form-select skill-select" id="validationCustom04" required>
                                                <option selected disabled value="">Choisissez...</option>
                                                <option value="100">Expert</option>
                                                <option value="80">Expérimenté</option>
                                                <option value="60">Habile</option>
                                                <option value="40">Intermediere</option>
                                                <option value="20">Debutant</option>
                                            </select>

                                        </div>


                                    </div>

                                </div>

                                <div class="btns">
                                    <button class="delete-btn-comp" type="button">Supprimer</button>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="add-btn-comp">
                        <button class="btn btn-primary add-btn-comp">
                            <i class="fa-regular fa-circle-plus"></i>

                            Ajouter une compétence</button>
                    </div>


                    <!-- LANGUAGE FORM -->

                    <div class="form-section form-language" id="form-language">

                        <div class="lang-header">
                            <i class="fa-light fa-language"></i>
                            <h1>Langues</h1>

                        </div>
                        <div class="row g-4 formlang lang-form" id="lang-form">

                            <div class="form-lang" id="lang-form-0">

                                <div class="first-inputs">
                                    <div class="degree-city">

                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom01" class="form-label">Langue</label>
                                            <input type="text" class="form-control" value="<?php $userInfo["lang"][0]["lang"];?>" name="lang-input-0" id="lang-input-0">

                                        </div>
                                        <div class="col-md-4" style="width: 50%;">
                                            <label for="validationCustom02" class="form-label">Niveau</label>
                                            <select class="form-select lang-select" id="validationCustom04">
                                                <option selected disabled value="">Choisissez...</option>
                                                <option value="C2">Compétent/Courant (C2)</option>
                                                <option value="C1">Avancé (C1)</option>
                                                <option value="B2">Intermédiaire supérieur (B2)</option>
                                                <option value="B1">Intermédiaire (B1)</option>
                                                <option value="A2">Pré-intermédiaire (A2)</option>
                                                <option value="A1">Élémentaire (A1)</option>
                                                <option value="A0">Débutant (A0)</option>
                                            </select>

                                        </div>


                                    </div>

                                </div>

                                <div class="btns">
                                    <button class="delete-btn-lang" type="button">Supprimer</button>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="add-btn-lang">
                        <button class="btn btn-primary add-btn-lang">
                            <i class="fa-regular fa-circle-plus"></i>

                            Ajouter une langue</button>
                    </div>
                    <div class="final-sub">
                        <button class="btn btn-primary final-submit" type="submit">Sauvgarder</button>
                    </div>


                </div>

            </form>


        </div>
    </div>


    <footer>

    </footer>

    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input);
    </script>

    <!-- <script src="../../public/javascript/resume-form.js"></script> -->




</body>

</html>