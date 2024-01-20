(function(Drupal) {
	Drupal.behaviors.myModuleBehavior = {
		attach: function(context, settings) {
			const Menus = context.querySelector ? context.querySelectorAll('.container-menus') : null;
			if (Menus) {
				Menus.forEach((menu) => {
					const hamburger = menu.querySelector('.input-hamburger');
					hamburger.addEventListener('click', () => {
						menu.querySelector('.main-menu').classList.toggle("open")
					});
				});
			}
		},
	};
	//
})(Drupal);