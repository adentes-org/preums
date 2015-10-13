G.res = {
        tmpl : {
          info_bulle : function(val){
                                //console.log(val)
                                var html = "<div class='popup'><h3>" + val.name + "</h3>" +
                                "<div class='time'>le : " + (new Date(parseInt(val.update))).toLocaleString()+"</div><br>"+
                                "<div class='status'>" + val.status +"</div></div><ul>";
                                if( typeof val.membres != "undefined") {
                                    $.each(val.membres, function(key, val) {
                                        html += "<li>"+val.prenom+" "+val.nom+" "+val.niveau+" "+val.numero+"</li>";
                                    });
                                }
                                
                                html += "</ul>";
                                
                                return html;
          }  
        },
		img : {
    	    plan_global : function(){
                //* Coupe droite convert -sample 4000 -rotate 180 -transparent "#fff" -fuzz 20% -alpha set plan.pdf plan-global.png
                var southWest = new L.LatLng(45.223564, -0.747075 ),
                    northEast = new L.LatLng(45.210064, -0.759075);
                //*/
                
                /* Coupe droite convert -sample 4000 -rotate 181 -transparent "#fff" -fuzz 20% -alpha set plan.pdf plan-global.png 
                //convert -sample 3000 -flop -transparent "#fff" -fuzz 20% -alpha set -auto-level -define png:preserve-colormap plan.pdf plan-global.png
                var southWest = new L.LatLng(45.223564, -0.74699 ),
                    northEast = new L.LatLng(45.210064, -0.75899);
                //*/
                return L.imageOverlay('/ui/img/plan-global-more.png', new L.LatLngBounds(southWest, northEast), {opacity : 0.75 });   
    	    }   
		},
        status : {
           "dispo" : { color : "green", msg : "Disponible a la base", position : {lat: 45.21824521, lng: -0.74869304} },
           "depinter" :  { color : "blue", msg : "Part en intervention" },
           "retsans" :  { color : "blue", msg : "Victime laissée sur place" },
           "codevert" :  { color : "blue", msg : "Pas de victime" },
           "patrouille" :  { color : "blue", msg : "Part en patrouille" },
           "surinter" :  { color : "red", msg : "Arrive sur intervention" },
           "retvicti" :  { color : "red", msg : "Repart avec victime" },
           "pecvicti" :  { color : "red", msg : "Prend en charge une victime" },
           "incompma" :  { color : "red", msg : "Arrive sur PMA" },
           "renfcrf" :  { color : "red", msg : "Demande renfort CRf" },
           "renfsecu" :  { color : "red", msg : "Demande renfort Secu" },
            "renfmed" :  { color : "red", msg : "Demande renfort Medicalisé" },
           "renfencad" :  { color : "red", msg : "Demande presence Encadrement" },
           "bilan" :  { color : "red", msg : "Passe bilan victime" },
           "evac" :  { color : "red", msg : "Evacue une victime" , position : {lat: 45.210064, lng: -0.759075} },
           "indispo" :  { color : "grey", msg : "A la base, indisponible", position : {lat: 45.223564, lng: -0.747075}  },
            },
		item : { 
			unit : {},
			victim : {},
			poi : {}
		},
		icon : {
			Human : {
				green : function(){
					return L.icon({
						iconUrl: '/ui/img/human-green.png',
						//iconSize: [48, 48]
                        iconSize: [32, 32]
					});
				},
				red : function(){
					return L.icon({
						iconUrl: '/ui/img/human-red.png',
                        iconSize: [32, 32]
					});
				},
    			blue : function(){
					return L.icon({
						iconUrl: '/ui/img/human-blue.png',
                        iconSize: [32, 32]
					});
				},
    			green_out : function(){
					return L.icon({
						iconUrl: '/ui/img/human-green-out.png',
						//iconSize: [48, 48]
                        iconSize: [32, 32]
					});
				},
				red_out : function(){
					return L.icon({
						iconUrl: '/ui/img/human-red-out.png',
                        iconSize: [32, 32]
					});
				},
    			blue_out : function(){
					return L.icon({
						iconUrl: '/ui/img/human-blue-out.png',
                        iconSize: [32, 32]
					});
				},
    			grey : function(){
					return L.icon({
						iconUrl: '/ui/img/human-grey.png',
                        iconSize: [32, 32]
					});
				},
			}
		}
}
