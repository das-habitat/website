(() => {
  const nav = document.querySelector('.header__nav');
  const header = nav.parentElement;
  const menuButton = document.createElement('button');
  const menuButtonText = 'Menü';

  menuButton.setAttribute('type', 'button');
  menuButton.setAttribute('aria-haspopup', true);
  menuButton.classList.add('header__toggle');
  menuButton.id = 'menu-button';

  const menuCallback = () => {
    if (!menuButton.hasAttribute('aria-expanded')) {
      menuButton.setAttribute('aria-expanded', true);
      menuButton.innerText = 'Schließen';
      header.classList.add('header--expanded');
    } else {
      menuButton.removeAttribute('aria-expanded');
      menuButton.innerText = menuButtonText;
      header.classList.remove('header--expanded');
    }
  };

  menuButton.addEventListener('click', menuCallback);
  menuButton.addEventListener('touchdown', menuCallback);

  const container = document.createElement('div');

  container.setAttribute('aria-labelledby', menuButton.id);

  const build = () => {
    container.append(...nav.children);

    menuButton.innerText = menuButtonText;
    header.insertBefore(menuButton, nav);
    nav.append(container);
  };

  const teardown = () => {
    if (!menuButton.parentElement) {
      return;
    }

    header.removeChild(menuButton);
    nav.removeChild(container);
    nav.append(...container.children);
    header.classList.remove('header--expanded');
  };

  const match = window.matchMedia('(max-width:879px)');

  const callback = (mq) => {
    if (mq.matches) {
      build();
    } else {
      teardown();
    }
  };

  match.addListener(callback);

  callback(match);
})();
