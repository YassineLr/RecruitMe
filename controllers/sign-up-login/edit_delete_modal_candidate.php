<!-- edit_delete_modal.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</head>

<body>

  <div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/RecruitMe/controllers/sign-up-login/edit.php?id=<?php echo $row['id']; ?>">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Catégorie</label>
              <div class="col-sm-10">

                <select name="categorie" id="categorie" class="form-control" value="<?php echo $row['categorie']; ?>">
                  <option value="IT">IT</option>
                  <option value="marketing-digital">Marketing Digital</option>
                  <option value="développement Web">Développement Web</option>
                  <option value="Finance">Finance</option>
                  <option value="HR">HR</option>
                </select><br><br>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Titre d'emploi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="titre_emploi" value="<?php echo $row['titre_emploi']; ?>">
              </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Type d'emploi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="type_emploi" value="<?php echo $row['type_emploi']; ?>">
                </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label">Compétences Requises</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['competence']; ?>">
                  </div>
                  </div>



                  <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Salaire</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="salaire" value="<?php echo $row['salaire']; ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Années d'Expérience</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="annee" value="<?php echo $row['annee']; ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Adresse</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="adresse" value="<?php echo $row['adresse']; ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Date d'Expiration</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date" value="<?php echo $row['expiration']; ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="description"
                        value="<?php echo $row['description']; ?>">
                    </div>
                  </div>


           
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="edit" class="btn btn-primary">Update</a>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">Are you sure you want to Delete</p>
          <h4 class="text-center">
            <?php echo $row['titre_emploi'] . ' '; ?>
          </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/RecruitMe/controllers/sign-up-login/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Yes</a>
        </div>
      </div>
    </div>
  </div>



</body>

</html>