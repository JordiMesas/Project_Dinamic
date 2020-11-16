import {noActiveEvent} from './noActiveEvent.js';

const lessThan10 = (dateUser, e)=>{
	let today = new Date();
	let birthdate = new Date(dateUser);

	let age = today.getFullYear() - birthdate.getFullYear();

	if(today.getDate() < birthdate.getDate()){
		
		noActiveEvent(e);
		alert('Pon una fecha antes de la fecha actual');
		return false;
	}
	
	if(age < 10){
		noActiveEvent(e);
		alert('Los participantes tienen que tener como minimo 10 años para participar');
	}

	if(age > 90){
		noActiveEvent(e);
		alert('Los participantes tienen que tener como maximo 90 años para participar');
	}

	console.log(age);
		
}
export default lessThan10;