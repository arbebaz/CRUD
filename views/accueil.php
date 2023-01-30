<?php require_once('../controller/membreController.php'); ?>
<?php require_once('./header.php'); ?>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Inscription">
    Inscription
</button>

<!-- Modal -->
<div class="modal fade" id="Inscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="pseudo">pseudo</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="nom">nom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="prenom">prenom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="prenom">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="email">email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="civilité">civilite :</label>
                        <select name="civilité" id="">
                            <option value="f">FEMME</option>
                            <option value="h">HOMME</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" name="statut">Statut :</label>
                        <select name="statut" id="">
                            <option value="0">Membres</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" name="mdp">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-primary" name="valider_membre">Valider</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php require_once('./footer.php'); ?>