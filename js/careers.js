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
let captainsLog = () => {
    document.addEventListener("DOMContentLoaded", function(){
		job();
	});
}
captainsLog();