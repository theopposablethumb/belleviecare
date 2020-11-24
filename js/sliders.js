let accordion = () => {
    let article = document.querySelectorAll(".faq");
    for (let i = 0; i < article.length; i++) {
    	let plus = article[i].querySelector("img");
    	article[i].addEventListener("click", function(){
    		this.classList.toggle("closed");
        	this.classList.toggle("open");
        	plus.classList.toggle("rotate");
    	});
    }
};

let loadPhotonTorpedoes = () => {
	document.addEventListener("DOMContentLoaded", function(){
		accordion();
	});
};
loadPhotonTorpedoes();
