export default function menu() {
	const nav = document.querySelector('#nav');
	const menuButton = document.createElement('button');

	menuButton.setAttribute('type', 'button');
	menuButton.setAttribute('aria-haspopup', true);
	menuButton.classList.add('menu__toggle');
	menuButton.innerText = 'Menü';
	menuButton.id = 'menu-button';

	const menuCallback = () => {
		if (!menuButton.hasAttribute('aria-expanded')) {
			menuButton.setAttribute('aria-expanded', true);
		} else {
			menuButton.removeAttribute('aria-expanded');
		}
	};

	menuButton.addEventListener('click', menuCallback);
	menuButton.addEventListener('touchdown', menuCallback);

	const container = document.createElement('div');

	container.setAttribute('aria-labelledby', menuButton.id);

	const build = () => {
		container.append(...nav.children);

		nav.prepend(menuButton);
		nav.append(container);
	};

	const teardown = () => {
		if (!menuButton.parentElement) {
			return;
		}

		nav.removeChild(container);
		nav.removeChild(menuButton);
		nav.append(...container.children);
	};

	const match = window.matchMedia('(max-width:887px)');

	const callback = mq => {
		if (mq.matches) {
			build();
		} else {
			teardown();
		}
	};

	match.addListener(callback);

	callback(match);
}
