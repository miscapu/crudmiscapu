<?php
/**
 * Add Game form to insert data game
 */
$this->extend( 'Templates/Page' ); ?>

<?php $this->section( 'content' ); ?>


<?php
/**
 * Validation
 */
use \Config\Services;
$validation = Services::validation();
?>


<?php
/**
 * @var array $inputNameAddGame
 * @var array $inputDeveloperAddGame
 * @var array $inputPriceAddGame
 * @var array $inputSubmitAddGame
 *
 */
?>

<!-- Form Start -->
<?= form_open( 'Games/addGame' ); ?>
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
        <?= form_input( $inputNameAddGame ); ?>
        <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
        <?= "<strong style='color: red'>".$validation->showError( 'name' )."</strong>" ?>
    </div>

    <div class="form-group">
        <?= form_label( 'Developer', 'developer' );?>
        <?= form_input( $inputDeveloperAddGame ); ?>
        <?= "<strong style='color: red'>".$validation->showError( 'developer' )."</strong>" ?>
    </div>

    <div class="form-group">
        <?= form_label( 'Price', 'price' );?>
        <?= form_input( $inputPriceAddGame ); ?>
        <?= "<strong style='color: red'>".$validation->showError( 'price' )."</strong>" ?>
    </div>


    <?= form_button( $inputSubmitAddGame ); ?>

<?= form_close(); ?>
<!-- Form End -->
<?php $this->endSection(); ?>


