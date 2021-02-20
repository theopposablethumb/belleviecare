const locations = [{'town': 'abingdon', 'coords': [-1.2878968802672597, 51.67178136767836]}, {'town': 'henley', 'coords': [-0.9033067471332705, 51.53710356800439]}, {'town': 'oxford', 'coords': [-1.2577162566127518, 51.754024253642946]}, {'town': 'wantage', 'coords': [-1.426433149561529, 51.59018592067826]}, {'town': 'witney', 'coords': [-1.4848687355795065, 51.78721320217527]}, {'town': 'woodstock', 'coords': [-1.354313034285376, 51.84827550604427]}];

let getTown = () => {
	let path = window.location.pathname;
	path = path.replace(/\/$/, "");
	let towns = path.split('/');
	let town = towns.pop()
	return town;
}

let findCoords = (town) => {
    for (let i = 0; i <= locations.length; i++) {
        if (locations[i].town === town) {
            return locations[i];
        }
    }
}

let getCoords = () => {
	town = getTown();
	let loc = findCoords(town);
	let coords = loc.coords;
	return coords;
}



const maps = () => {	
	let coords = getCoords();
	console.log(coords);
	let map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })],
        view: new ol.View({
          center: ol.proj.fromLonLat(coords),
          zoom: 12,
          minZoom: 11,
          maxZoom: 14,
        })
      });
      
      let view = map.getView();
      let center = view.getCenter();
      let circle = new ol.geom.Circle(center, 10000); // radius uses the units of the projection
      let circleFeature = new ol.Feature(circle); // each shape has to be added to a feature, the feature is what takes style and gets rendered
      
 	  circleFeature.setStyle(new ol.style.Style({ 
    		fill: new ol.style.Fill({ color: 'rgba(24, 93, 111, 0.4)'}), 
    		stroke: new ol.style.Stroke({ 
    			color: 'rgba(24, 93, 111, 0.8)', width: 3 
      		})
      })); 
      
      let vectorSource = new ol.source.Vector({ 
   		projection: 'EPSG:4326' //determines units for circle radius
  	  });
  	    	  
  	  vectorSource.addFeature(circleFeature); //add feature to vector source
  	  
  	  let vectorLayer = new ol.layer.Vector({ //vectors won't render unless they're added to a vector layer
    	map: map,
    	source: vectorSource 
	  });
  	  
 }



 let warpFactor = () => {
	document.addEventListener("DOMContentLoaded", function(){
		maps();
	});
};
warpFactor();