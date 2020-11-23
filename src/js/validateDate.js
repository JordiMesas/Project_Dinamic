

const lessThan10 = (dateUser,gender) => {

	let messageDate = document.getElementById('date');
	let repeatText = 'Te hemos inscrito en la categoria: ';

	let today = new Date();
	let birthdate = new Date(dateUser);

	let age = today.getFullYear() - birthdate.getFullYear();

	if (today.getDate() < birthdate.getDate()) {		
		messageDate.innerText = 'Pon una fecha antes de la fecha actual';		
	}

	if (age < 10) {		
		messageDate.innerText = 'Si tienes menos edad de 10 años no puedes participar';		
	}
	if (age > 90) {		
		messageDate.innerText = 'Si tienes mas edad de 90 años no puedes participar';		
	}

	if(age > 65 && gender === 'masculino'){
		messageDate.innerText = `${repeatText}jubilados`;
	}else if(age > 65 && gender === 'femenino'){
		messageDate.innerText = `${repeatText}jubiladas`;
	}else if(age < 18 && gender === 'masculino'){
		messageDate.innerText = `${repeatText}Niños`;
	}else if(age < 18 && gender === 'femenino'){
		messageDate.innerText = `${repeatText}Niñas`;
	}else if((age > 40 && age < 65) && gender ===  'masculino'){
		messageDate.innerText = `${repeatText}Adultos`;
	}else if((age > 40 && age < 65) && gender ===  'femenino'){
		messageDate.innerText = `${repeatText}Adultas`;
	}else if((age > 18 && age < 40) && gender ===  'masculino'){
		messageDate.innerText = `${repeatText}jovenes-hombres`;
	}else if((age > 18 && age < 40) && gender ===  'femenino'){
		messageDate.innerText = `${repeatText}jovenes-chicas`;
	}
	
};
export default lessThan10;
