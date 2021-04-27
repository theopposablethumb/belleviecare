let covid = () => {
    let main = document.querySelector("main");
    let tel = covidNumber();
    const covidPop = document.createElement('div');
    covidPop.classList.add('covid');
    covidSEContent = ``;
    covidNEContent = ``;
    covidPop.innerHTML = `<div class="pop shadow border">
            <a class="close">Close</a>
            <h3>100% of our Wellbeing Support Workers in Oxfordshire have had their first vaccination.</h3>
            <p>We can’t wait to hug our loved ones, laugh with friends and experience days out again - which is why we are so proud to have made the first step on the journey to life after the pandemic. Our Wellbeing Support Workers have worked tirelessly to keep the people we support safe, and while they will still take the necessary precautions, we are very happy to hit this milestone.</p>
            <p>As our thoughts turn to post-pandemic life, will your elderly loved one need a bit of extra support to do the activities and hobbies they love?</p>
            <p><img src="http://belleviecare.co.uk/wp-content/uploads/2021/01/Jill-270x300.jpg" alt="Jill, Wellbeing and Family Communication Lead" width="75px" height="80px" />Our flexible packages are tailored to the needs and aspirations of the people we support, whether that’s returning to the local bingo hall or having a trip to the cafe for a cup of tea. Call Jill, our dedicated Wellbeing and Family Communication Lead today to discuss your needs <a href="tel: ${tel}">${tel}</a></p>
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
	container.addEventListener('click', function(e) {
        e.stopPropagation();
        if(e.target === e.currentTarget) container.classList.add('hidden');
    })
}

let displayCovid = () => {
    let domain = (new URL(document.URL)).hostname;
    let prevDomain;
    let page = document.URL;
    if (document.referrer) 
        {prevDomain = (new URL(document.referrer)).hostname;}
//    if (prevDomain === null || prevDomain !== domain) { 
        if (page.includes('oxfordshire') && !page.includes('job')) {
            covid();
//        }
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
    let header = document.querySelectorAll('header .buttons a');
    header.forEach (el => {
        el.setAttribute('href', 'tel:' + phone);
        el.innerText = phone;
    })
    numberLink.setAttribute('href', 'tel: ' + phone);
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
        let header = document.querySelectorAll('header .buttons a');
        header.forEach (el => {
            el.setAttribute('href', 'tel:0191 313 0189');
            el.innerText = '0191 313 0189';
        })
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