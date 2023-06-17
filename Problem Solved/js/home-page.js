//Add map
var map = L.map('map').setView([27.622585, 84.512562], 16);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19, minZoom: 12,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
map.zoomControl.remove();

// Load Profile Details
let profilePic = document.querySelector(".profile-img");


// Load map 
let problemsId = []

loadProblems();
loadTalents();




function loadProblems() {
    fetch('../php/loadproblems.php')
        .then((response) => response.json())
        .then((data) => {
            if (data['empty']) {
                console.log("Empty")
            } else {
                for (let i in data) {
                    problemsId.push(data[i].user_id);
                    // var marker = L.marker([data[i].latitude, data[i].longitude]).addTo(map)
                    var marker = L.marker([data[i].latitude, data[i].longitude], {
                        title: data[i].pro_title
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
                    <div class="sp-option">Details</div>
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
                    console.log(data[i].id)
                    console.log(!problemsId.includes(data[i].id))
                    if (!problemsId.includes(data[i].id)) {
                        let starCode = ""
                        for (let j = 0; j <= data[i].rating; j++) {
                            starCode += "<i class=\"fa-solid fa-star\"></i>\n"
                        }

                        // console.log(data[i].latitude + ", " + data[i].longitude + "\n")
                        var marker = L.marker([data[i].latitude, data[i].longitude], {
                            title: data[i].name,
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
                            <div class="sp-option">Details</div>
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
