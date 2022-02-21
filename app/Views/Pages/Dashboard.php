<?php
/**
 * Page Games
 *
 * @var array $games
 */
$this->extend( 'Templates/Page' );?>

<?php $this->section( 'content' ); ?>


<!-- Table start -->
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Developer</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
    <?php if ( ! empty( $games ) && is_array( $games ) ): ?>
        <?php foreach ( $games as $game ):?>
            <tr>
                <th scope="row"><?= $game[ 'id' ]; ?></th>
                <td><?= $game[ 'name' ]; ?></td>
                <td><?= $game[ 'developer' ]; ?></td>
                <td><?= $game[ 'price' ] ; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<!-- Table End -->

<!-- Count fields -->
<strong>Number of fields: <?= count( $games ); ?></strong>

<?php $this->endSection(); ?>