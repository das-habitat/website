<?php snippet('header'); ?>

<p></p>

<nav class="nav nav--up t-machine__up">
  <a href="../">&larr; Schreinerei</a>
</nav>
<figure class="stage t-machine__stage">
  <img src="https://res.cloudinary.com/das-habitat/image/upload/w_1000,h_750,c_fill,f_auto/maschinen/holz_hobel_hofmann.jpg" alt="Blick auf den Hobel" width="1000" height="750">
</figure>

<div class="t-machine__technical">
  <h1><?= $page->title()->html() ?></h1>
  <table class="table table--technical">
    <tbody>
      <?php foreach ($page->data()->yaml() as $entry): ?>
      <tr>
        <th><?= $entry['label'] ?></th>
        <td><?= $entry['value'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div>
<?= $page->text()->kirbytext() ?>
</div>


<?php snippet('footer'); ?>
