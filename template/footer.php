<!-- Modal connection -->
<div class="modal fade" id="connectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/ctrllogin.php" method="POST">
                    <input type="email" placeholder="email" name="connect_email">
                    <input type="password" placeholder="Mot de Passe" name="passwordSend">
                    <p>Pas encore inscrit?<a href="createAccount.php">Créé un compte</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name='btnconnect'>Se Connecter</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="disconnectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Déconnexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/logout.php" method='post'>

                    <p>Vous allez être déconnecter</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Déconnexion</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal pour l'achat de batiment-->
<div class="modal fade" id="buildingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Batiment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/addbuild.php" method='post'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ferme disponible</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='farm_id'>
                            <?php
                        
                            $req2 = $bdd->prepare('SELECT farm_id, farm_name FROM farm WHERE connect_id=? LIMIT 1');
                            $req2->execute(array($_SESSION['user']['connect_id']));
                            $data2 = $req2->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($data2 as $farm) : ?>
                                <option value="<?= $farm['farm_id'] ?>"><?= $farm['farm_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">batiment disponible</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='building'>
                            <?php
                        $req = $bdd->prepare('SELECT account_amount FROM account WHERE connect_id=? LIMIT 1');
                        $req->execute(array($_SESSION['user']['connect_id']));
                        $data = $req->fetch();
                            $req = $bdd->prepare('SELECT building_id, building_name from building WHERE building_price <=?');
                            $req->execute(array($data['account_amount']));
                            $building = $req->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($building as $b) : ?>
                                <option value="<?= $b['building_id'] ?>"><?= $b['building_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php var_dump($building);
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Acheter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour l'achat de techno-->
<div class="modal fade" id="TechModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Batiment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/addbuild.php" method='post'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">ferme disponible</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='farm_id'>
                            <?php
                        
                            $req2 = $bdd->prepare('SELECT farm_id, farm_name FROM farm WHERE connect_id=? LIMIT 1');
                            $req2->execute(array($_SESSION['user']['connect_id']));
                            $data2 = $req2->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($data2 as $farm) : ?>
                                <option value="<?= $farm['farm_id'] ?>"><?= $farm['farm_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">batiment disponible</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='building'>
                            <?php
                        $req = $bdd->prepare('SELECT account_amount FROM account WHERE connect_id=? LIMIT 1');
                        $req->execute(array($_SESSION['user']['connect_id']));
                        $data = $req->fetch();
                            $req = $bdd->prepare('SELECT building_id, building_name from building WHERE building_price <=?');
                            $req->execute(array($data['account_amount']));
                            $building = $req->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($building as $b) : ?>
                                <option value="<?= $b['building_id'] ?>"><?= $b['building_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php var_dump($building);
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Acheter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </body>

    </html>