let year = () => {
    document.querySelector(".copyright span").innerHTML = new Date().getFullYear();
}
    		    		
let menu = () => {
    let button = document.querySelector(".openNav");
    let navigation = document.querySelector("header nav");
    button.addEventListener("click", function(){
        navigation.classList.toggle("show"); 
    	if (button.innerHTML !== "Close") {
    	    button.innerHTML = "Close";
    	} else {
    	    button.innerHTML = "Menu";
    	}
    });
}
			
let hero = () => {
    let heroImg = document.querySelector(".hero img");
    //If it isn't "undefined" and it isn't "null", then it exists.
    if(typeof(heroImg) != 'undefined' && heroImg != null){
        heroImg.removeAttribute("style");
    };
}
			
let centreVideos = () => {	
    let video = document.querySelector("iframe[src^='https://www.youtube.com/embed/']");
    let wrapper = document.createElement("div");
    if(typeof(video) != 'undefined' && video != null){
        video.parentNode.insertBefore(wrapper, video);
        wrapper.appendChild(video);
        wrapper.classList.add('videoWrapper');
    };
}
			
let saveService = () => {
    let service = document.querySelectorAll('article.services');
    for(let i = 0; i < service.length; i++) {
        let heading = service[i].firstChild;
    	let p = heading.nextElementSibling;
    	let link = p.nextElementSibling;;
    	link.addEventListener('click', function() {
    	    window.sessionStorage.setItem('service', heading.textContent);
			window.sessionStorage.setItem('previousPage', document.referrer);
    	})
    }; 
}
    		
let scrollToService = () => {
    if (window.location.pathname === '/what-we-offer/' && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        let service = window.sessionStorage.getItem('service');
    	let headings = document.querySelectorAll('article.services h4');
    	for(let i = 0; i < headings.length; i++) {
    	    let heading = headings[i].textContent;
    		let scrollPosition = headings[i].parentElement;
    		if (heading === service) {
    		    scrollPosition.scrollIntoView();
    		 }
    	}
    }
}
			
let replacePhoneNumber = (phone) => {
    let numberLink = document.querySelector('.section a[href^=tel]');
    let mobileHeader = document.querySelector('header .buttons .mobile');
    numberLink.setAttribute('href', 'tel: ' + phone);
    mobileHeader.setAttribute('href', 'tel:' + phone);
}
			
let contextualPhoneNumbers = () => {
    window.sessionStorage.setItem('previousPage', document.referrer);
    let prev = window.sessionStorage.getItem('previousPage');
    let current = window.location.href;
    if (prev.includes('oxford') && current.includes('what-we-offer')) {
        replacePhoneNumber('01235 355 570');
    } else if (prev.includes('durham') && current.includes('what-we-offer')) {
        replacePhoneNumber('0191 313 0189');
    } else if (prev.includes('tyne') && current.includes('what-we-offer')) {
        replacePhoneNumber('0191 313 0189');
    } else if (current.includes('durham') || current.includes('tyne')) {
        let mobileHeader = document.querySelector('header .buttons .mobile');
        mobileHeader.setAttribute('href', 'tel: 0191 313 0189');
    }
}
    		
let makeItSo = () => {
    document.addEventListener("DOMContentLoaded", function(){
 	   year();
 		menu();
		centreVideos();
		hero();
		saveService();
		scrollToService();
		contextualPhoneNumbers();
 		console.log("This website crafted by hand by Brendan Meachen. Want your own custom website? Contact me - www.brendanmeachen.com");
 	});
};
makeItSo();