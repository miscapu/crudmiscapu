<?php
/**
 * Add Game form to insert data game
 */
$this->extend( 'Templates/Page' ); ?>

<?php $this->section( 'content' ); ?>


<?php
/**
 * Validation
// */
//use \Config\Services;
//$validationEdit = Services::validation();
?>


<?php
/**
 * @var array $inputNameEditGame
 * @var array $inputDeveloperEditGame
 * @var array $inputPriceEditGame
 * @var array $inputSubmitEditGame
 * @var array $gameEdit
 * @var array $errors
 * @
 */
?>

<!-- Form Start -->
<?= form_open( 'Games/editGame/'.$gameEdit['id'] ); ?>
<!--<form>-->

<?php csrf_field(); ?>
<?php if (! empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $field => $error): ?>
            <p><?= $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>


<div class="form-group">
    <?= form_label( 'Name', 'name' );?>
    <?= form_input( $inputNameEditGame, $gameEdit[ 'name' ] ); ?>
    <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>

</div>

<div class="form-group">
    <?= form_label( 'Developer', 'developer' );?>
    <?= form_input( $inputDeveloperEditGame, $gameEdit[ 'developer' ] ); ?>
</div>

<div class="form-group">
    <?= form_label( 'Price', 'price' );?>
    <?= form_input( $inputPriceEditGame, $gameEdit[ 'price' ] ); ?>
</div>


<?= form_button( $inputSubmitEditGame ); ?>

<?= form_close(); ?>
<!-- Form End -->
<?php $this->endSection(); ?>