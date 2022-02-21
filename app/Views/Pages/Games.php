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
        <th scope="col">Actions</th>

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
        <td>
            <a href="<?= site_url( 'Games/showFormEditGame/'.$game[ 'id' ].'' ); ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil btn-sm"></i></a>
            <a href="<?= site_url( 'Games/removeGame/'.$game[ 'id' ].'' ); ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash btn-sm"></i></a>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<!-- Table End -->

<p><!-- Add Game Button -->
    <a href="<?= site_url( 'Games/showFormAddGame' )?>" class="btn btn-lg btn-primary"><i class="bi bi-plus-lg"></i></a>
</p>

<!-- Count fields -->
<p><strong>Number of fields: <?= count( $games ); ?></strong></p>


<?php $this->endSection(); ?>
