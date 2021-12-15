const locations = [
    {'town': 'abingdon', 'coords': [[-1.2878968802672597, 51.67178136767836]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4}, 
    
    {'town': 'henley', 'coords': [[-0.9507074332891099, 51.55757105161443], [-0.9033067471332705, 51.53710356800439], [-1.1341020269749407, 51.59872979357713]], 
        'poly': [ [-0.7592037803144338, 51.580766802234486], [-0.7819074832866925, 51.53339784776886], [-0.8439060567946842,  51.49862019448358], [-0.9882055558017482, 51.512480097652535], [-1.0805485033121092, 51.53081760574023], [-1.1566748749688944, 51.548992981377864], [-1.1984845393389434, 51.59537056443809], [-1.1488355627162887, 51.63719608051453], [-0.9737575883456787, 51.62331860922664] ], 
        'coverage': 10000, 'zoom': 11.2, 'mobileZoom': 10.2}, 
         
    {'town': 'oxford', 'coords': [[-1.2577162566127518, 51.754024253642946], [-1.1295704752768438, 51.74759431783926]],  
        //'poly': [[-1.3459197875612496, 51.74722719738821], [-1.329981755362802, 51.771610700407194], [-1.3107358296892047, 51.784262594788444], [-1.2662296265690112, 51.79691094193973], [-1.2139047661439188, 51.79449314980552], [-1.1690978454350756, 51.78575081973474], [-1.1254937950808321, 51.765655640234286], [-1.1137658091234839, 51.74201374820367], [-1.1275988182013816, 51.719849876729135], [-1.1633842112507264, 51.71370166811616], [-1.2304442335196664, 51.70773897056377], [-1.2981065956167754, 51.71049245146419], [-1.3372587633969883, 51.722620857951874], [-1.3459317119558964, 51.74088409000216]], 
        'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4},
    
    {'town': 'wantage', 'coords': [[-1.3717347141334826, 51.597216945388894], [-1.244473657464929, 51.609463155428145]], 
        'poly': [ [-1.5497656550123002, 51.587459292889626], [-1.51812683884379, 51.615255071505295], [-1.4505736908083227, 51.626227062602894], [-1.3288640105925227, 51.6297658486665], [-1.2350876996065783, 51.62109533248394], [-1.2177006024328925, 51.607997942685], [-1.22682170258958, 51.589053141196494], [-1.2638761719761233, 51.57665506935983], [-1.3060612602008035, 51.56620263868103], [-1.4254906653774317, 51.55946929219609], [-1.4884832633345555, 51.55822883014586], [-1.5338037297380969, 51.57258067882719] ], 
        'coverage': 10000, 'zoom': 12, 'mobileZoom': 10.7},
     
    {'town': 'witney', 'coords': [[-1.4848687355795065, 51.78721320217527]],
        'poly': [[-1.4082263945217046, 51.842837262356966], [-1.3659018792727902, 51.813750226252985], [-1.3655632831507987, 51.79071839276456], [-1.3659018792727902, 51.765998434571465], [-1.3858790504702776, 51.74923143716919], [-1.4793315801398808, 51.73161938889406], [-1.598856011202815, 51.74587729056837], [-1.6574331403073124, 51.76054984330244], [-1.6645436588691302, 51.78757677652059], [-1.6486296411355383, 51.81919239501956], [-1.5859893585671447, 51.83781638189745], [-1.4921377676092342, 51.85168113810102]],
      'coverage': 15000, 'zoom': 11.5, 'mobileZoom': 10.5}, 
      
    {'town': 'woodstock', 'coords': [[-1.354313034285376, 51.84827550604427]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4},
	
	    {'town': 'chipping', 'coords': [[-1.545096541619718, 51.94178349059665]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4}, 
    
    {'town': 'banbury', 'coords': [[-1.3363048235129844, 52.06253317772462]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4},
	{'town': 'pangbourne', 'coords': [[-1.08625986607806, 51.48397345295721]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4},
	{'town': 'wallingford', 'coords': [[-1.1253473105170122, 51.60059578137141]], 'coverage': 10000, 'zoom': 11.8, 'mobileZoom': 11.4},
    
    {'town': 'tyne', 'coords': [[-1.6104738816917203, 54.97425221783778]], 'coords2': [-1.3819818112287672, 54.90604092140663], 'coords3': [-1.6844101533295905, 55.172155708210624], 'coverage': 5000, 'zoom': 11, 'mobileZoom': 10.2}, 
    {'town': 'county', 'coords': [[-1.579665316617739, 54.77780957949464]], 'coverage': 20000, 'zoom': 10.8, 'mobileZoom': 10.6},
    {'town': 'northumberland', 'coords': [[-1.891220362683515, 54.96716311153304]], 'coverage': 26000, 'zoom': 10.4, 'mobileZoom': 10.6},
];

let isMobile = () => {
    let hasTouchScreen = false;
    if ("maxTouchPoints" in navigator) {
        hasTouchScreen = navigator.maxTouchPoints > 0;
    } else if ("msMaxTouchPoints" in navigator) {
        hasTouchScreen = navigator.msMaxTouchPoints > 0;
    } else {
        let mQ = window.matchMedia && matchMedia("(pointer:coarse)");
        if (mQ && mQ.media === "(pointer:coarse)") {
            hasTouchScreen = !!mQ.matches;
        } else if ('orientation' in window) {
            hasTouchScreen = true; // deprecated, but good fallback
        } else {
            // Only as a last resort, fall back to user agent sniffing
            let UA = navigator.userAgent;
            hasTouchScreen = (
                /\b(BlackBerry|webOS|iPhone|IEMobile)\b/i.test(UA) ||
                /\b(Android|Windows Phone|iPad|iPod)\b/i.test(UA)
            );
        }
    }
    if (hasTouchScreen) return hasTouchScreen;
}

let getTown = () => {
	let path = window.location.pathname;
	path = path.replace(/\/$/, "");
	let towns = path.split('/');
	let town = towns.pop();
	return town;
}

let massageTown = () => {
    let town = getTown();
    if (town.includes('-')) {
        let towns = town.split('-');
        return towns[0];
    } else {
        return town;
    }
}

let findTown = (town) => {
    for (let i = 0; i <= locations.length; i++) {
        if (locations[i].town === town) {
            return locations[i];
        }
    }
}

let getCoords = () => {
	let town = massageTown();
	let loc = findTown(town);
	let coords = loc.coords;
	return coords;
}

let getCoords2 = () => {
	let town = massageTown();
	let loc = findTown(town);
	let coords = loc.coords2;
	return coords;
}

let getPolygon = () => {
    let town = massageTown();
    let loc = findTown(town);
    let poly = loc.poly;
    return poly;
}

let getCoverage = () => {
	let town = massageTown();
	let radius = findTown(town);
	let coverage = radius.coverage;
	return coverage;
}

let getZoom = () => {
	let town = massageTown();
	let level = findTown(town);
	let zoom;
	if (isMobile()) {
	    zoom = level.mobileZoom;
	} else {
	    zoom = level.zoom;
	}
	return zoom;
}

const maps = () => {	
	let coords = getCoords();
	let zoom = getZoom();
	let map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })],
        view: new ol.View({
          center: ol.proj.fromLonLat(coords[0]),
              zoom: zoom,
          minZoom: 10,
          maxZoom: 14,
        })
      });
      
      let view = map.getView();
      
      let circleCoords = view.getCenter();
      let circleCoords2 = getCoords2();
      let circleRadius = getCoverage();
      let circle = new ol.geom.Circle(circleCoords, circleRadius); // radius uses the units of the projection
      let circle2;
      let circleFeature = new ol.Feature(circle); // each shape has to be added to a feature, the feature is what takes style and gets rendered
      let circleFeature2;
         
       let polyCoords = getPolygon();
      
      let circleStyle = () => {
          return new ol.style.Style({ 
    		fill: new ol.style.Fill({ color: 'rgba(24, 93, 111, 0.4)'}), 
    		stroke: new ol.style.Stroke({ color: 'rgba(24, 93, 111, 0.8)', width: 3 })
      	});
      };
 
 	  circleFeature.setStyle(circleStyle()); 
 	  
 	  if (circleCoords2) {
          circle2 = new ol.geom.Circle(ol.proj.fromLonLat(circleCoords2), circleRadius); 
          circleFeature2 = new ol.Feature(circle2);
          circleFeature2.setStyle(circleStyle()); 
      }
  	  
      
      let vectorSource = new ol.source.Vector({ 
   		projection: 'EPSG:4326' //determines units for circle radius
  	  });
  	    	  
  	  if (!polyCoords) {
  	      if (circleCoords2) {
  	          vectorSource.addFeatures([ circleFeature, circleFeature2 ] );    
  	      } else {
  	          vectorSource.addFeature(circleFeature);    
  	      }
  	  } else {
  	      let poly = polyCoords.map( coords => ( ol.proj.fromLonLat(coords) ));
          let polyFeature = new ol.Feature( {geometry: new ol.geom.Polygon( [ poly ] )} ); 
          polyFeature.setStyle(circleStyle());
  	      vectorSource.addFeature( polyFeature );
  	  }
  	  //vectorSource.addFeatures([circleFeature, secondCircleFeature]); //add feature to vector source
  	   
  	  
  	  let vectorLayer = new ol.layer.Vector({ //vectors won't render unless they're added to a vector layer
    	map: map,
    	source: vectorSource,
	  });
 }

 let warpFactor = () => {
	document.addEventListener("DOMContentLoaded", function(){
		maps();
	});
};
warpFactor();