const jsIsRunning = () => {
	const form = document.querySelector('form.hspot');
	form.removeAttribute('action');
}

const openForm = () => {
	let openSesame = document.querySelector('.notifications a');
	if(openSesame != null){
		openSesame.addEventListener('click', function() {
			let banner = document.querySelector('.banner');
			banner.classList.remove('hidden');
		});
	}
}
		
const closeForm = () => {
	let close = document.querySelector('form.hspot a.close');
	let banner = document.querySelector('.banner');
	if(close != null){
		close.addEventListener('click', function() {
			banner.classList.add('hidden');
		});
	}
}

const newsLetterConsent = () => {
	let consent = document.querySelector('form.hspot label.check');
	let field = document.querySelector('form.hspot input[type=checkbox]');
	field.setAttribute('checked', false);
	consent.addEventListener('click', () => {
		if (field.checked) {
			field.setAttribute('checked', true)
		} else {
			field.setAttribute('checked', false)
		}
	});
}
		
const formHubSpotFieldNames = () => {
		let fields = document.querySelectorAll('form.hspot input[type=text], form.hspot input[type=tel], form.hspot input[type=email], form.hspot input[type=hidden], form.hspot textarea, form.hspot input[type=checkbox]');
	let hubSpotFieldNames = [];
	for (let i = 0; i < fields.length; i++) {
		let name = fields[i].getAttribute("name");
		hubSpotFieldNames.push(name);
	}
	return hubSpotFieldNames;
}
		
const formHubSpotFieldValues = () => {
	let fields = document.querySelectorAll('form.hspot input[type=text], form.hspot input[type=tel], form.hspot input[type=email], form.hspot input[type=hidden], form.hspot textarea');
	let check = document.querySelector('form.hspot input[type=checkbox]');
	let hubSpotFieldValues = []
	for (let i = 0; i < fields.length; i++) {
		let value = fields[i].value;[]
		hubSpotFieldValues.push(value);
	}
	if (check) hubSpotFieldValues.splice(6, 0, check.getAttribute('checked'));
	return hubSpotFieldValues;
}
		
const hubSpotData = () => {
	let names = formHubSpotFieldNames();
	let values = formHubSpotFieldValues();
	let fields = [];
	for (let i = 0; i < names.length; i++) {
		let element = {
			"name": names[i],
			"value": values[i]
		}
		fields.push(element);
	}
	return fields;
}
		
let destroyForm = () => {
	const labels = document.querySelectorAll('form.hspot label');
	const inputs = document.querySelectorAll('form.hspot input, form.hspot textarea, form .subscribe');
	const submit = document.querySelector('form.hspot input[type=submit]'); 
	const captcha = document.querySelector('div.g-recaptcha');
	const content = document.querySelectorAll('form.hspot p');
	submit.classList.add('hidden');
	captcha.classList.add('hidden');
	for (let i = 0; i < labels.length; i++) {
		labels[i].classList.add('hidden');
		inputs[i].classList.add('hidden');
	};
	for (let i = 0; i < content.length; i++) {
		content[i].classList.add('hidden');
	}
}
		
let thankYouMessage = () => {
	document.querySelector('form.hspot').scrollIntoView({ behavior: 'smooth' });
	const form = document.querySelector('form.hspot');
	const div = document.createElement('div');
	div.classList.add('result');
	if (window.location.pathname === "/locations/oxfordshire-homecare/") {
		div.innerHTML = `
	 		<p>Thank you for downloading our brochure. If you have any questions or would like to discuss your home care needs with a member of the team call us today on 01235 355 570</p>
    		<a class='button light' href='https://www.belleviecare.co.uk/wp-content/uploads/2021/06/Brochure-BelleVie-SE.pdf'>Download your free brochure</a>
  	`;
	} else if (window.location.pathname === "/locations/county-durham-homecare/" || window.location.pathname === "/locations/tyne-and-wear-homecare/" || window.location.pathname === "/locations/northumberland-homecare/") {
		div.innerHTML = `
	    	<p>Thank you for downloading our brochure. If you have any questions or would like to discuss your home care needs with a member of the team call us today on 0191 313 0189</p>
    		<a class='button light' href='https://www.belleviecare.co.uk/wp-content/uploads/2021/06/Brochure-BelleVie-NE.pdf'>Download your free brochure</a>
  		`;
	} else if (window.location.pathname === "/younger-people/") {
		div.innerHTML = `
	    	<p>Thank you for downloading our brochure. If you have any questions or would like to discuss how BelleVie can support you call us today on 01235 355 570 if you're in Oxfordshire or 0191 313 0189 if you're in the North East</p>
    		<a class='button light' href='http://www.belleviecare.co.uk/wp-content/uploads/2021/04/Supporting-Young-Adults.pdf'>Download your free brochure</a>
  		`;
	} else if (window.location.pathname === "/chrissy-cares-treatments/") {
		div.innerHTML =`
			<p>Thank you for downloading the BelleVie and Chrissy Cares leaflet. If you have any questions or if you would like to book a treatment please call us on (01235) 355 570.</p>
			<a class='button light' href='https://www.belleviecare.co.uk/wp-content/uploads/2021/08/chrissy-cares-booklet.pdf'>Download your free brochure</a>
			`;
	} else if (window.location.pathname === "/nutrition-yoga/") {
		div.innerHTML =`
			<p>Thank you for downloading the BelleVie and Modern Glow leaflet. If you have any questions or if you would like to book a treatment please call us on (01235) 355 570.</p>
			<a class='button light' href='https://www.belleviecare.co.uk/wp-content/uploads/2021/11/The-Modern-Glow.pdf'>Download your free brochure</a>
			`;
	} else {
		
		div.innerHTML = `
			<p>Thank you for your interest in BelleVie. We'll be in touch shortly</p>
		`;
	}
  	form.appendChild(div);
	let notification = document.querySelector('.notifications');
	if(notification != null){
		notification.classList.add('hidden');
	}
}

let formErrorMessage = (errorMessage) => {
	let displayMessage = document.createElement('p');
	displayMessage.classList.add('error');
	let form = document.querySelector('form.hspot');
	let p = errorMessage; 
	displayMessage.innerHTML = p;
	form.prepend(displayMessage);
}

let fieldErrorMessage = (fieldName, errorMessage) => {
	let displayMessage = document.createElement('p');
	displayMessage.classList.add('error');
	let field = document.querySelector(fieldName);
	field.classList.add('error');
	let p = errorMessage;
	displayMessage.innerHTML = p;
	field.insertAdjacentElement("afterend", displayMessage);
} 

let errorMessages = (errorType) => {
	const form = document.querySelector('form.hspot');
	switch(errorType) {
		case 'INVALID_EMAIL':
			document.querySelector('input[name=email]').scrollIntoView({ behavior: 'smooth' });
			fieldErrorMessage('input[name=email]', 'Please use a valid email address');
			break;
		case 'BLOCKED_EMAIL':
			document.querySelector(form).scrollIntoView({ behavior: 'smooth' });
			formErrorMessage('Unfortunately we are unable to process your message');
			break;
		case 'NUMBER_OUT_OF_RANGE':
			document.querySelector('input[name=mobilephone]').scrollIntoView({ behavior: 'smooth' });
			fieldErrorMessage('input[name=mobilephone]', 'Please use a valid UK phone number');
			break;
		case 'INPUT_TOO_LARGE':
			document.querySelector(form).scrollIntoView({ behavior: 'smooth' });
			formErrorMessage('Something went wrong, please try again');
			break;
	}
}
		
let errorMessage = (error) => {
	for (let i = 0; i < error.length; i++) {
		let errorType = error[i].errorType;
		errorMessages(errorType);
	}
}

let youShallNotPass = () => {
	const button = document.querySelector('input[type=submit]');
	const form = document.querySelector('form.hspot');
	const p = document.createElement('p');
	p.classList.add('error');
	form.insertBefore(p, button)
	p.innerHTML = 'Please prove that you are a human being first.';
}

let fetchHspot = (endpoint, data) => {
	fetch(endpoint, {
  		method: 'POST',
  		headers: {'Content-Type': 'application/json',},
  		body: JSON.stringify(data),
	})
	.then(response => response.json())
	.then(data => {
  		if (data.status === "error") {
  			let errors = data.errors;
  			errorMessage(errors);
  		} else {
  			destroyForm();
			thankYouMessage();
		}
	})
	.catch((error) => {
  		destroyForm();
	});
}

let submitForm = () => { 
	const form = document.querySelector('form.hspot');
	form.addEventListener('submit', function() {
		event.preventDefault();
		
		let data = {fields: []}
		data.fields = hubSpotData();
		let formId = form.dataset.form;
		let endpoint = 'https://api.hsforms.com/submissions/v3/integration/submit/6461446/' + formId;
		
		let bouncer = grecaptcha.getResponse();
  		if(bouncer.length == 0) {
  			youShallNotPass();
    	} else {
    		fetchHspot(endpoint, data);
    	};
	});
}
		
let fireWhenReady = () => {
	document.addEventListener("DOMContentLoaded", function(){
		jsIsRunning();
    	openForm();
    	closeForm();
		submitForm();
    	newsLetterConsent();
   		//getCookie(hutk);
	});
};
fireWhenReady();