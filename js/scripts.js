let covid = () => {
    let main = document.querySelector("main");
    let tel = covidNumber();
    const covidPop = document.createElement('div');
    covidPop.classList.add('covid');
    covidPop.innerHTML = `<div class="pop shadow border">
            <a class="close">Close</a>
            <h3>How we are keeping people safe during lockdown</h3>
            <p>In line with the government guidelines, we have been supporting people to live well in their own homes since the beginning of the pandemic, and will continue to do so during the lockdown. We'd like to thank our amazing key workers for all of their hard work and support to make this happen.</p> 
            <p>As always, our priority is the wellbeing and safety of the people we support, and our Wellbeing Support Workers. If you are concerned about home support during the pandemic, please call us on ${tel} to find out more about our response to Covid-19.</p>
        </div>`;
    main.appendChild(covidPop);
    covidVaccine();
}

let covidNumber = () => {
    let page = document.URL;
    if (page.includes('durham') || page.includes('tyne') || page.includes('northumberland')) {
        return '0191 313 0189';
    } else {
        return '01235 355 570';
    }
    
}

let covidVaccine = () => {
    let close = document.querySelector(".covid a.close");
    let container = document.querySelector('.covid');
    close.addEventListener('click', function() {
        container.classList.add('hidden');
    });
}

let displayCovid = () => {
    let domain = (new URL(document.URL)).hostname;
    let prevDomain;
    if (document.referrer) 
        {prevDomain = (new URL(document.referrer)).hostname;}
    if (prevDomain === null || prevDomain !== domain) { 
        covid();
    } else{
        return null;
    }
}


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
    //let video = document.querySelector("iframe[src^='https://www.youtube.com/embed/']");
    let video = document.querySelector(".cmplz-video");
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

let replaceCheckList = (area) => {
    let checkListLink = document.querySelector('.compare a.button');
    checkListLink.setAttribute('href', '/wp-content/uploads/2020/12/BelleVie-Checklist-' + area);
}

let contextualPhoneNumbers = () => {
    window.sessionStorage.setItem('previousPage', document.referrer);
    let prev = window.sessionStorage.getItem('previousPage');
    let current = window.location.href;
    if (prev.includes('oxford') && current.includes('what-we-offer')) {
        replacePhoneNumber('01235 355 570');
		replaceCheckList('SE');
    } else if (prev.includes('durham') && current.includes('what-we-offer')) {
        replacePhoneNumber('0191 313 0189');
		replaceCheckList('NE');
    } else if (prev.includes('tyne') && current.includes('what-we-offer')) {
        replacePhoneNumber('0191 313 0189');
		replaceCheckList('NE');
	} else if(prev.includes('northumberland') && current.includes('what-we-offer')) {
        replacePhoneNumber('0191 313 0189');
        replaceCheckList('NE');
    } else if (current.includes('durham') || current.includes('tyne') || current.includes('northumberland')) {
        let mobileHeader = document.querySelector('header .buttons .mobile');
        mobileHeader.setAttribute('href', 'tel: 0191 313 0189');
    } else if (prev.includes('oxford') && current.includes('home-care')) {
        replacePhoneNumber('01235 355 570');
        document.querySelector('.section a[href^=tel]').innerHTML = '01235 355 570';
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
		displayCovid();
 		console.log("This website crafted by hand by Brendan Meachen. Want your own custom website? Contact me - www.brendanmeachen.com");
 	});
};
makeItSo();