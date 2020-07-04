/*
	polyfill
*/

if(window.NodeList && !window.NodeList.prototype.forEach) {
	NodeList.prototype.forEach = function (callback, arg) {
		arg = arg || window;
		for(var i = 0;i < this.length; i++) {
			callback.call(arg.this[i], i, this);
		}
	};
}


/*const DOMLIBELLE = document.getElementById('tableNameLibelle');
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
*/
/*window.onload = function() {
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
		} else {
			return false;
		}
	})

}*/
/*class App {
	/*
	* bind le selecteur, recheche le selecteur, crée un nouvelle objet par selecteur trouver
	*//*
	static bind (selecteur) {
		document.querySelectorAll(selecteur).forEach(elem => new App(elem));
	}
	//@param (html) element
	constructor (elem) {
		this.elem = elem;
		let target = this.elem.getAttribute('data-bulle');
		if(target) {
			this.title = document.querySelector(target).innerHTML;
		} else {
			this.title = elem.getAttribute('title');
		}

		this.bulle = null;
		this.elem.addEventListener('mouseover', this.survole.bind(this));
		this.elem.addEventListener('mouseout', this.survoleFin.bind(this));
	}

	survole () {
		let bulle = this.createInfobulle();
		
		let width = this.bulle.offsetWidth;
		let height = this.bulle.offsetHeight;
		let left = this.elem.offsetWidth / 2 - width / 2 + this.elem.getBoundingClientRect().left + document.documentElement.scrollTop;
		let top = this.elem.getBoundingClientRect().top - height - 15 + document.documentElement.scrollTop;
		bulle.style.left = left + 'px';
		bulle.style.top = top + 'px';
		bulle.classList.add('animation');

	}

	survoleFin () {
		if (this.bulle !== null) {
			this.bulle.classList.remove('animation');
			document.body.removeChild(this.bulle);
			this.bulle = null;
		}
	}

	createInfobulle() {
		if (this.bulle === null) {
			let bulle = document.createElement('div');
			bulle.innerHTML = this.title;
			bulle.classList.add('infobulle');
			document.body.appendChild(bulle);
			this.bulle = bulle;	
		}
		return this.bulle;
	}
}
App.bind('img[title]');*/


	/*function WidthChange(WIDTH992) {
			if(WIDTH992.matches('Libellé')) {
				var nodeLibelle = document.getElementById('tableNameLibelle').innerHTML = 'Libellé';
			} else {
				var nodeLibelle = document.getElementById('tableNameLibelle').innerHTML ='Lib';
					console.log('mesure minimum a 992');
			}

	}*/
