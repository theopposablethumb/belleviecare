    		let year = () => {
				document.querySelector(".copyright span").innerHTML = new Date().getFullYear();
			}
			
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
    		
    		let job = () => {
    		    let job = document.querySelectorAll(".job");
    		    for (let i = 0; i < job.length; i++) {
    		        let plus = job[i].querySelector("img");
    		        let show = job[i].querySelector(".hidden");
    		        job[i].addEventListener("click", function(){
    		            show.classList.toggle("hidden");
    		            show.classList.toggle("show");
    		            plus.classList.toggle("rotate");
    		        });
    		    }
    		}
    		
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
    			modalOpen();
    			modalClose();
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
    		
    		let makeItSo = () => {
    			document.addEventListener("DOMContentLoaded", function(){
 					year();
					accordion();
 					job();
 					modal();
 					menu();
					hero();
					centreVideos();
 					console.log("This website crafted by hand by Brendan Meachen. Want your own custom website? Contact me - www.brendanmeachen.com");
				});
			};
			makeItSo();