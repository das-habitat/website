(() => {
  const nav = document.querySelector('.top_nav');
  const header = nav.parentElement;
  const menuButton = document.createElement('button');
  const menuButtonText = 'Menü';
  const container = document.createElement('div');

  menuButton.setAttribute('type', 'button');
  menuButton.setAttribute('aria-haspopup', true);
  menuButton.classList.add('top_toggle');
  menuButton.id = 'menu-button';

  const menuCallback = () => {
    if (!menuButton.hasAttribute('aria-expanded')) {
      menuButton.setAttribute('aria-expanded', true);
      menuButton.innerText = 'Schließen';
      header.classList.add('top-expanded');
    } else {
      menuButton.removeAttribute('aria-expanded');
      menuButton.innerText = menuButtonText;
      header.classList.remove('top-expanded');
    }
  };

  menuButton.addEventListener('click', menuCallback);
  menuButton.addEventListener('touchdown', menuCallback);

  container.setAttribute('aria-labelledby', menuButton.id);
  container.classList.add('top_mobilenav');

  const build = () => {
    menuButton.innerText = menuButtonText;
    header.insertBefore(menuButton, nav);
    header.insertBefore(container, nav);
    container.append(nav);
  };

  const teardown = () => {
    if (!menuButton.parentElement) {
      return;
    }

    header.removeChild(menuButton);
    container.after(nav);
    header.removeChild(container);
    header.classList.remove('top-expanded');
    menuButton.removeAttribute('aria-expanded');
  };

  const match = window.matchMedia('(max-width:989px)');

  const callback = (mq) => {
    if (mq.matches) {
      build();
    } else {
      teardown();
    }
  };

  match.addEventListener('change', callback);

  callback(match);
})();
