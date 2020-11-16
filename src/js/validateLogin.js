 import validateDni from './validatedni.js';
 import lessThan10 from './validateDate.js';
 import {noActiveEvent} from './noActiveEvent.js';
 import {effectForm, effectFormInit} from './validateEffectForm.js';

window.addEventListener('load', () => {
	
	document.getElementById('sub').addEventListener('click', (e) => {
		let fields = document.getElementsByClassName('validate');
		let message = document.getElementById('message');

		message.style.color = 'red';
		message.innerText = '';

		if(fields[3].value != ''){
			validateDni(fields[3].value,e);
		}
		
		lessThan10(fields[4].value,e);

		for (let i = 0; i < fields.length - 1; i++) {
			if (fields[i].value == '') {
				noActiveEvent(e);
				effectForm(fields[i], fields[i].placeholder);
			} else if (fields[i].value != '') {				
				effectFormInit(fields[i]);				
			}
		}
		if (fields[fields.length - 1].value == '') {
			noActiveEvent(e);
			effectForm(
				fields[fields.length - 1],
				fields[fields.length - 1].getElementsByTagName('option')[0].innerText
			);
		}else{
            effectFormInit(fields[fields.length - 1]);
        }
	});
});






