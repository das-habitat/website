    </div>

    <footer class="footer">
      <div class="footer__inner">
        <div class="footer__info">
          <img
            class="footer__logo"
            src="/assets/logo.svg"
            alt="Das Habitat"
            width="207"
            height="80"
          />

          <blockquote class="footer__claim">
            <p>Nährboden für die Zukunft.<br />Deine offene Werkstatt.</p>
          </blockquote>
          
          <?php snippet('contact-info') ?>
        </div>

        <nav>
          <div>
            <h3>Werkstätten</h3>
            <ul>
              <li>
                <a href="/bueros/">Büros</a>
              </li>
              <li>
                <a href="/schreinerei/">Schreinerei</a>
              </li>
              <li>
                <a href="/schlosserei/">Schlosserei</a>
              </li>
              <li>
                <a href="/siebdruck/">Siebdruck</a>
              </li>
            </ul>
          </div>
          <div>
            <h3>Events</h3>
            <ul>
              <li>
                <a href="/repaircafe/">Repair-Café</a>
              </li>
            </ul>
          </div>
          <div>
            <h3>Informationen</h3>
            <ul>
              <li>
                <a href="/ueber-uns/">Über uns</a>
              </li>
              <li>
                <a href="/preise/">Preise &amp; Angebot</a>
              </li>
              <li>
                <a href="/kontakt">Kontakt &amp; Anfahrt</a>
              </li>
              <li>
                <a href="/verhaltenskodex">Verhaltenskodex</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <aside class="footer__sponsors">
        <div class="footer__inner">
          <h3>
            Unsere Sponsoren, Unterstützer, Stifter, Gönner und einfach fantastischen Partner.
          </h3>

          <ul class="sponsors">
            <?php 
              foreach($site->page('sponsoren')->files() as $sponsor):
            ?>
            <li>
              <a href="<?= $sponsor->Link() ?>" target="_blank" rel="noopener">
                <img
                  src="<?= $sponsor->url() ?>"
                  alt="<?= $sponsor->Title()->html() ?> <?= $sponsor->Description()->html() ?>"
                  height="50"
                />
              </a>
            </li>
            <?php endforeach ?>
          </ul>

          <p>
            Du oder dein Unternehmen wollt uns und unser Projekt unterstützen?
            <a href="/kontakt">Meldet euch bei uns.</a>
          </p>
        </div>
      </aside>

      <aside class="footer__note">
        <div class="footer__inner">
          <p class="footer__copyright">
            &copy; 2018–<?php echo date("Y"); ?> Das Habitat Augsburg e.V.
          </p>

          <p class="footer__legal">
            <a href="/kontakt#kontoverbindung">Kontoverbindung</a>
            <a href="/impressum/">Impressum</a>
            <a href="/datenschutz/">Datenschutzerklärung</a>
          </p>
        </div>
      </aside>
    </footer>
		</div>
    <?= js('assets/main.js') ?>
    <?php if (!$kirby->option('isDevelopment')): ?>
		<noscript><img src="https://statistik.das-habitat.de/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></noscript>
		<script src="https://rabbit.das-habitat.de/script.js" included-domains="das-habitat.de" site="LGSVGZYI" defer></script>
		<?php endif ?>
	</body>
</html>
