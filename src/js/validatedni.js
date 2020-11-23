 import {noActiveEvent} from './noActiveEvent.js';
 
 const validateDni = (dni,e,input) => {
	console.log(dni);
	console.log(input);
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
			input.style.border = '1px solid red';
			message.innerText = `-El numero proporcionado no es valido, no se muestran mas mensajes.\n`;
			
		} else if (isNaN(userLetter)) {

			let res = intDni % 23;
			const result = letters[res];
			console.log(result);
			if(result != userLetter.toUpperCase()){
				noActiveEvent(e);
				input.style.border = '1px solid red';
				message.innerText = `-¡su numero del dni y letra no es correcto! \n`;				
			}else{
				input.style.border = '1px solid green';
			}			
				
		}else{
			noActiveEvent(e);
			input.style.border = '1px solid red';
			message.innerText = `-¡La letra de su dni no es correcta!\n`;			
		}
	}
	 else {
		noActiveEvent(e);
		input.style.border = '1px solid red';
		message.innerText = `-demasiados datos para el dni\n`;		
	}	
};

export default validateDni;