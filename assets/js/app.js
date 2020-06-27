
const DOMLIBELLE = document.getElementById('tableNameLibelle');
const DOMDESCRIPTION = document.getElementById('tableNameDescription');
const DOMREFERENCE = document.getElementById('tableNameReference');
const DOMCOMMANDE = document.getElementById('tableNameCommande');
const DOMAPERCUE = document.getElementById('tableNameApercue');

		const MINWIDTH1200 = window.matchMedia('(min-width: 1200px)');
		const MAXWIDTH1200 = window.matchMedia('(max-width: 1200px)');

		const MINWIDTH992 = window.matchMedia('(min-width: 992px)');
		const MAXWIDTH992 = window.matchMedia('(max-width: 992px)');

		const MINWIDTH768 = window.matchMedia('(min-width: 768px)');
		const MAXWIDTH768 = window.matchMedia('(max-width: 768px)');

		const MINWIDTH576 = window.matchMedia('(min-width: 576px)');
		const MAXWIDTH576 = window.matchMedia('(max-width: 576px)');

		const MINWIDTH320 = window.matchMedia('(min-width: 320px)');
		const MAXWIDTH320 = window.matchMedia('(max-width: 320px)');


window.onload = function() {
	window.addEventListener('resize', function() {

		if(MINWIDTH992.matches) {
			DOMREFERENCE.innerHTML = 'Référence';

		} else if(MAXWIDTH1200.matches) {
			DOMREFERENCE.innerHTML = 'Ref..';
		}

		if(MINWIDTH992.matches) {

			DOMLIBELLE.innerHTML = 'Libellé';
			DOMDESCRIPTION.innerHTML = 'Description';
			DOMREFERENCE.innerHTML = 'Référence';
			DOMCOMMANDE.innerHTML = 'Commande';
			DOMAPERCUE.innerHTML = 'Aperçue';

		} else if(MAXWIDTH992.matches){
			DOMLIBELLE.innerHTML = 'Lib..';
			DOMDESCRIPTION.innerHTML = 'Desc..';
			DOMREFERENCE.innerHTML = 'Ref..';
			DOMCOMMANDE.innerHTML = 'Cmd..';
			DOMAPERCUE.innerHTML = 'Img..';
		}
	})


}

	/*function WidthChange(WIDTH992) {
			if(WIDTH992.matches('Libellé')) {
				var nodeLibelle = document.getElementById('tableNameLibelle').innerHTML = 'Libellé';
			} else {
				var nodeLibelle = document.getElementById('tableNameLibelle').innerHTML ='Lib';
					console.log('mesure minimum a 992');
			}

	}*/
