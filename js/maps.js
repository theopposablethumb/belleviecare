const locations = [{'town': 'abingdon', 'coords': [-1.2878968802672597, 51.67178136767836], 'coverage': 10000}, {'town': 'henley', 'coords': [-0.9033067471332705, 51.53710356800439], 'coverage': 10000}, {'town': 'oxford', 'coords': [-1.2577162566127518, 51.754024253642946], 'coverage': 10000}, {'town': 'wantage', 'coords': [-1.426433149561529, 51.59018592067826], 'coverage': 10000}, {'town': 'witney', 'coords': [-1.4848687355795065, 51.78721320217527], 'coverage': 15000}, {'town': 'woodstock', 'coords': [-1.354313034285376, 51.84827550604427], 'coverage': 10000}];

let getTown = () => {
	let path = window.location.pathname;
	path = path.replace(/\/$/, "");
	let towns = path.split('/');
	let town = towns.pop()
	return town;
}

let findTown = (town) => {
    for (let i = 0; i <= locations.length; i++) {
        if (locations[i].town === town) {
            return locations[i];
        }
    }
}

let getCoords = () => {
	let town = getTown();
	let loc = findTown(town);
	let coords = loc.coords;
	return coords;
}

let getCoverage = () => {
	let town = getTown();
	let radius = findTown(town);
	let coverage = radius.coverage;
	return coverage;
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
      let circleRadius = getCoverage();
      let circle = new ol.geom.Circle(center, circleRadius); // radius uses the units of the projection
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