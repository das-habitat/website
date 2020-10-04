window._paq &&
	window._paq.push([
		function () {
			const target = document.getElementById('matomo-opt-out');

			const updateUI = (isOptedOut) => {
				if (isOptedOut) {
					target.innerHTML =
						'<button type="button" data-action="forgetUserOptOut">Tracking aktivieren (Opt-in)</button>';
				} else {
					target.innerHTML =
						'<button type="button" data-action="optUserOut">Tracking deaktivieren (Opt-out)</button>';
				}
			};

			if (!target) {
				return;
			}

			const isOptedOut = this.isUserOptedOut();

			updateUI(isOptedOut);

			target.addEventListener('click', (event) => {
				event.preventDefault();

				if (!event.target.dataset.action) {
					return;
				}

				_paq.push([event.target.dataset.action]);

				updateUI(!isOptedOut);
			});
		},
	]);
