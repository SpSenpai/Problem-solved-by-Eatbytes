//Add map
var map = L.map('map').setView([27.622585, 84.512562], 16);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19, minZoom: 12,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
map.zoomControl.remove();

// Load Profile Details
let profilePic = document.querySelector(".profile-img");
let userId = document.querySelector("#id").innerHTML;


// Load map 
let problemsId = []
var costumeMarker = L.Icon.extend({
    options: {
        iconSize:     [40, 40],
        shadowSize:   [50, 64],
        iconAnchor:   [20, 40],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});
var NullMarkor = L.Icon.extend({
    options: {
        iconSize: [0, 0],
    }
});

var mechanicIcon = new costumeMarker({iconUrl: '../icons/mechanic.png'})
var elecrticianIcon = new costumeMarker({iconUrl: '../icons/electrician.png'})
var doctorIcon = new costumeMarker({iconUrl: '../icons/doctor.png'})
var plumberIcon = new costumeMarker({iconUrl: '../icons/plumber.png'})
var babySitterIcon = new costumeMarker({iconUrl: '../icons/babysitter.png'})
var locationPointer = new costumeMarker({iconUrl: '../icons/location-pointer.png'})
var problemIcon = new costumeMarker({iconUrl: '../icons/problem.png'})
var nullIcon = new NullMarkor()
let tempIcon = locationPointer


loadTalents();
loadProblems();




function loadProblems() {
    fetch('../php/loadproblems.php')
        .then((response) => response.json())
        .then((data) => {
            if (data['empty']) {
                console.log("Empty")
            } else {
                for (let i in data) {
                    problemsId.push(data[i].user_id);
                    tempIcon = problemIcon
                    if(userId == data[i].user_id){
                        tempIcon = locationPointer;
                    }
                    var marker = L.marker([data[i].latitude, data[i].longitude], {
                        title: data[i].pro_title,
                        icon: tempIcon
                    }).bindPopup(`
                <div class="search-profile-box pop-up-box">
                <div class="sp-img"><img src="../image/${data[i].image}" alt=""></div>
                <div class="sp-details">
                    <div class="sp-name">${data[i].name}</div>
                    <div class="sp-proff">
                        <div class="sp-proff-name">${data[i].pro_title}</div>
                    </div>
                </div>
                <div class="sp-options">
                    <div class="sp-option">Hire me</div>
                    <div class="sp-option">Call Now</div>
                    <div class="sp-option">Message</div>
                    <div class="sp-option" onclick="setDetails(${data[i].id}, true)">Details</div>
                </div>
            </div>
                `, {className: "red-popup"}).addTo(map)

                }
            }
        }).catch((error) => {
            console.log("error");
        })
}
function loadTalents() {
    fetch('../php/loadmap.php')
        .then((response) => response.json())
        .then((data) => {
            if (data['empty']) {
                console.log("Empty")
            } else {
                for (let i in data) {
                    switch (data[i].skill) {
                        case 'Doctor':
                            tempIcon = doctorIcon
                            break;
                        case 'Electrician':
                            tempIcon = elecrticianIcon
                            break;
                        case 'Mechanic':
                            tempIcon = mechanicIcon
                            break;
                        case 'Plumber':
                            tempIcon = plumberIcon
                            break;
                        case 'Babysitter':
                            tempIcon = babySitterIcon
                            break;
                    
                        default:
                            tempIcon = nullIcon
                            break;
                    }

                    if(userId == data[i].id){
                        tempIcon = locationPointer;
                    }
                    
                    if (!problemsId.includes(data[i].id) || data[i].skill == "None") {
                        let starCode = ""
                        for (let j = 0; j <= data[i].rating; j++) {
                            starCode += "<i class=\"fa-solid fa-star\"></i>\n"
                        }

                        
                        var marker = L.marker([data[i].latitude, data[i].longitude], {
                            title: data[i].name,
                            icon: tempIcon
                        })
                            .bindPopup(`
                        <div class="search-profile-box pop-up-box">
                        <div class="sp-img"><img src="../image/${data[i].image}" alt=""></div>
                            <div class="sp-details">
                        <div class="sp-name">${data[i].name}</div>
                        <div class="sp-proff">
                            <div class="sp-proff-name">${data[i].skill}</div>
                            <div class="sp-proff-lvl">${data[i].level}</div>
                        </div>
                        <div class="sp-rating">
                            ${starCode}
                        </div>
                        </div>
                        <div class="sp-options">
                            <div class="sp-option">Hire now</div>
                            <div class="sp-option">Call Now</div>
                            <div class="sp-option">Message</div>
                            <div class="sp-option" onclick="setDetails(${data[i].id},false)">Details</div>
                        </div>
                        </div>
                        `,).addTo(map)
                    }
                }
            }
        }).catch((error) => {
            console.log("error");
        })
}


function setDetails(id, isProblem){
    if(!isProblem || isProblem){
        fetch('../php/loadmap.php')
        .then((response) => response.json())
        .then((data) => {
            if (data['empty']) {
                console.log("Empty")
            } else {
                for (let i in data) {
                    if (data[i].id == id){
                        let starCode = ""
                        for (let j = 0; j <= data[i].rating; j++) {
                            starCode += "<i class=\"fa-solid fa-star\"></i>\n"
                        }
                        document.querySelector(".details").innerHTML = `
                        <img class="bis" src="../image/${data[i].image}" alt="img">
                        <div class="rating">
                        ${starCode}
                        </div>
                        <h2>${data[i].name}</h2>
                        <p> <span>Phone</span> : ${data[i].phone}</p>
                        <p><span>Gmail </span>: ${data[i].email}</p>
                        <p><span>Addres</span> : ${data[i].address}</p>
                        <p><span>Joined since</span> : ${data[i].date}</p>
                        <p><span>Skill</span>: ${data[i].skill}</p>
                        <p><span>Level</span>: ${data[i].level}</p>
                        <p><span>Description</span>:
                        <p class="des">
                        ${data[i].description}
                        </p>
                        </p>

                    `
                    document.querySelector(".user-details").style.top = "10px"
                        
                    }
                }
            }
        }).catch((error) => {
            console.log("error");
        })
    }
}


// Post Problem
let postProblemBtn = document.querySelector("#post-problem-btn");
let postProblemDiv = document.querySelector(".post-problem-container");

postProblemBtn.addEventListener("click", () => {
    postProblemDiv.style.display = "block"
    // blackBox.style.opacity = "0"
    // blackBox.style.display = ""
})


// Basic page controls
// Sidebar Menu Open close
let Sidebar = document.querySelector(".sidebar")
let crossBtn = document.querySelector(".cross")
let hamburgerBtn = document.querySelector(".hamburger")
let blackBox = document.querySelector(".black-box");

crossBtn.addEventListener("click", () => {
    Sidebar.style.left = "-25vw"
    blackBox.style.opacity = "0"
    setTimeout("blackBox.style.display = \"none\"", 200);
})

blackBox.addEventListener("click", () => {
    Sidebar.style.left = "-25vw"
    blackBox.style.opacity = "0"
    setTimeout("blackBox.style.display = \"none\"", 200);
})

hamburgerBtn.addEventListener("click", () => {
    Sidebar.style.left = "0"
    blackBox.style.display = ""
    setTimeout("blackBox.style.opacity = \"0.3\"", 0);
})


// Search result box open close
let searchGlass = document.querySelector(".search-glass")
let searchResultContainer = document.querySelector(".search-result-container")
let isSearhOpen = false;

searchGlass.addEventListener("click", () => {
    isSearhOpen ? closeSearchResultBox() : openSearchResultBox()
})


function openSearchResultBox() {
    searchResultContainer.style.height = "90vh"
    searchResultContainer.style.opacity = "1"
    isSearhOpen = true
}
function closeSearchResultBox() {
    searchResultContainer.style.height = "0vh"
    searchResultContainer.style.opacity = "0"
    isSearhOpen = false
}


document.querySelector(".cross-user-details").addEventListener("click",()=>{
    document.querySelector(".user-details").style.top = "-100vh"
})