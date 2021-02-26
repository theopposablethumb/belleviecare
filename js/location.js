let locationToolTip = () => {
    let locations = document.querySelectorAll('.local ul li');
    let toolTip = document.querySelector('.tooltip');
    let toolTipText = document.querySelector('.tooltip p')
    let toolTipLocal = toolTipText.textContent;
    for(let i = 0; i < locations.length; i++) {
        let location = locations[i];
        let locationName = locations[i].textContent;
        let localise = toolTipLocal.replace("locationName", locationName);
        location.addEventListener('click', function() {
            for(let i = 0; i < locations.length; i++) {
                locations[i].removeAttribute('style');    
            }
            toolTipText.innerText = localise;
            toolTip.classList.remove('hidden');
            this.appendChild(toolTip);
            this.style.cssText = 'z-index: 2';
        })
    }
}
    	
let maximumWarp = () => {
    document.addEventListener("DOMContentLoaded", function(){
		locationToolTip();
 	});
};
maximumWarp();