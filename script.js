document.addEventListener("click" , (e) => {
    const {target} = e;
    if(!target.matches("div a")){
        return;
    }
    e.preventDefault();
    urlRoute();
})

const urlRoutes = {
    404:{
        template: "/iot_farm_monitoring/templates/404.html",
        title: "",
        description: ""
    },
    "/":{
        template: "/iot_farm_monitoring/index.php",
        title: "",
        description: ""
    },
    "/temp":{
        template: "/iot_farm_monitoring/templates/temp.php",
        title: "",
        description: ""
    },
    "/rain":{
        template: "/iot_farm_monitoring/templates/rain.php",
        title: "",
        description: ""
    },
    "/gas":{
        template: "/iot_farm_monitoring/templates/gas.php",
        title: "",
        description: ""
    }
}

const urlRoute = (event) => {
    event = event || window.event;
    event.preventDefault();
    window.history.pushState({}, "", event.target.href);
    urlLocationHandler();
}


const urlLocationHandler = async () => {

    const location = window.location.pathname;
    if(location.length == 0){
        location = "/";
    }
    const route = urlRoutes[location] || urlRoutes[404];
    const html = await fetch(route.template).then((response) => 
    response.text());
    document.getElementById("content").innerHTML = html;
}
window.onpopstate = urlLocationHandler;
window.route = urlRoute;
urlLocationHandler();
