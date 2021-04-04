import Splide from '@splidejs/splide';

const splideOptions = {
	type: 'loop',
	heightRatio: 1,
	i18n: {
		prev: 'Zurücl',
		next: 'Weiter',
		first: 'Anfang',
		last: 'Ende',
		slideX:'Zu Bild %s springen',
		pageX:'Zu Seite %s springen',
		play: 'Starten',
		pause:'Pausieren'
	},
  lazyLoad: 'nearby',
}

document.querySelectorAll('[data-splide]').forEach((element) => {
  element.classList.add('splide');
  element.querySelector('div').classList.add('splide__track');
  element.querySelector('ul').classList.add('splide__list');
  element.querySelectorAll('li').forEach(li => {
    li.classList.add('splide__slide');
  })

	new Splide(element, splideOptions).mount();
});

document.documentElement.dataset.js = true;

document.querySelectorAll('[data-loading]').forEach(element => {
  delete element.dataset.loading;
})
