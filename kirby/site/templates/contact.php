<?php snippet('header'); ?>

<main class="main grid">
  <div class="column-start1 column-span3">
    <h2>Das Wichtigste auf einen Blick</h2>

    <?php snippet('partials/address'); ?>
  </div>

  <div class="column-start4 column-span3">
    <h2>E-Mail schreiben</h2>

    <?php if ($success): ?>
      <div class="message message-success">
          <p>Vielen Dank für Ihre Nachricht! Wir melden uns so bald wie möglich zurück.</p>

          <p><a href="<?= $page->url() ?>">Weitere Nachricht senden</a></p>
      </div>
    <?php else: ?>
    <?php if (isset($alert['error'])): ?>
      <div class="message message-error">
        <?= $alert['error'] ?>
      </div>
    <?php endif; ?>

    <form class="form-contact" method="post" action="<?= $page->url() ?>">
      <p>
        <label for="contact-name">Name</label>
        <input 
          class="form-control" 
          type="text" 
          id="contact-name" 
          name="name" 
          required 
          value="<?= esc($data['name'] ?? '', 'attr') ?>" 
          autocomplete="name"
        >
        <?= isset($alert['name'])
          ? '<span class="form-error">' . esc($alert['name']) . '</span>'
          : '' ?>
      </p>

      <p>
        <label for="contact-email">E-Mail</label>
        <input 
          class="form-control" 
          type="email" 
          id="contact-email" 
          name="email" 
          required 
          value="<?= esc($data['email'] ?? '', 'attr') ?>" 
          autocomplete="email"
        >
        <?= isset($alert['email'])
          ? '<span class="form-error">' . esc($alert['email']) . '</span>'
          : '' ?>
      </p>

      <p>
        <label for="contact-subject">In welcher Stadt ist das Habitat?</label>
        <input 
          class="form-control" 
          type="text" 
          id="contact-subject"
          name="subject" 
          required 
          value="<?= esc($data['subject'] ?? '', 'attr') ?>" 
          autocomplete="off"
        >
        <?= isset($alert['subject'])
          ? '<span class="form-error">' . esc($alert['subject']) . '</span>'
          : '' ?>
      </p>

      <p>
        <label for="contact-body">Deine Nachricht an das Habitat</label>
        <textarea 
          class="form-control" 
          name="body" 
          required 
          id="contact-body" 
          rows="12" 
          placeholder=""
        ><?= esc($data['text'] ?? '') ?></textarea>
        <?= isset($alert['body'])
          ? '<span class="form-error">' . esc($alert['body']) . '</span>'
          : '' ?>
      </p>

      <p>
        <button type="submit">Senden</button>
      </p>

      <p>
        <small>
          Alle Felder müssen ausgefüllt sein.
        </small>
      </p>
    </form>

    <?php endif; ?>
  </div>

  <div class="column-start1 column-span3 lg:mt:xl">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('footer');
?>
