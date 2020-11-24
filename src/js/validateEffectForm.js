

export const effectForm = (input, text) => {
	input.style.border = '1px solid red';
	message.innerText += `-Rellena el campo ${text}.\n`;
};

export const effectFormInit = (input) =>{
    input.style.border = '1px solid green';
}
