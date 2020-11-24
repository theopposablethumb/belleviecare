let modalOpen = () => {
	let article = document.querySelectorAll(".standards");
    for (let i = 0; i < article.length; i++) {
    	let modal = article[i].querySelector('section.hidden');
    	let open = article[i].querySelector("a.open");
    	open.addEventListener("click", function(){
    		modal.classList.remove("hidden");
    		modal.classList.add("show");
    	});
    }
}

let modalClose = () => {
	let modal = document.querySelectorAll(".modal");
    for (let i = 0; i < modal.length; i++) {
    	let close = modal[i].querySelector("a.close");
    	close.addEventListener("click", function(){
    	modal[i].classList.add("hidden");
    	});
 	}
}

let modal = () => {
	document.addEventListener("DOMContentLoaded", function(){
		modalOpen();
		modalClose();
	});
}
modal();
