<?php
require_once 'template/header.php';
?>


<h2 class="text-center">Bienvenue dans la partie financière de votre ferme</h2>
<!-- <div class="container">
    <div class="row">
        <div class="col-3">
            <canvas id='$dollars' width="500px" height="500px">
            </canvas>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col">
        <h3 class="text-center">Banque</h3>
        <?php
            $req=$bdd->prepare('SELECT * FROM bank');
            $req->execute(array());
            $loan=$req->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <table class="table" id="loan">
            <thead>
            <th scope="col" class="text-center">Montant</th>
            <th scope="col" class="text-center">action</th>
            </thead>
            <tbody>
            <?php foreach($loan as $loan): ?>
            <tr>
                <td align="center"><?= $loan['bank_amount'] ?></td>
                <td align="center"><a href='controller/loan.php?value=<?= $loan['bank_id']?>&& amount=<?= $loan['bank_amount'] ?>'class= "btn btn-success mr-3">Emprunter</a><a href='controller/refund.php?amount=<?= $loan['bank_amount'] ?>'class='btn btn-primary  ml-3 '>Rembourser</a></td>
            </tr>
            <?php endforeach?>
            </tbody>
            
            </table>

        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>

<script>

</script>