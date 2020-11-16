 import {noActiveEvent} from './noActiveEvent.js';
 
 const validateDni = (dni,e) => {
	console.log(dni);
	let letters = [
		'T',
		'R',
		'W',
		'A',
		'G',
		'M',
		'Y',
		'F',
		'P',
		'D',
		'X',
		'B',
		'N',
		'J',
		'Z',
		'S',
		'Q',
		'V',
		'H',
		'L',
		'C',
		'K',
		'E',
	];

	let intDni = dni.substr(0, dni.length - 1);	
	// I have taked the user letter from variable dni

	let userLetter = dni.substr(dni.length - 1, dni.length);	
	// confirm by dni user letter, it is correct or no

	if (dni.length <= 9) {
		if (intDni < 0 || intDni > 99999999) {
			noActiveEvent(e);
			alert(
				'El numero proporcionado no es valido, no se muestran mas mensajes'
			);
		} else if (isNaN(userLetter)) {

			let res = intDni % 23;
			const result = letters[res];
			console.log(result);
			if(result != userLetter.toUpperCase()){
				noActiveEvent(e);
				alert('¡su numero del dni y letra no es correcto!')
			}			
				
		}else{
			noActiveEvent(e);
			alert('No existe una letra al final de tu dni');
		}
	}
	 else {
		noActiveEvent(e);
		alert('demasiados datos para el dni');
	}
};

export default validateDni;