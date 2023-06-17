//Add map
var map = L.map('map').setView([27.62330, 84.50931], 17);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
map.zoomControl.remove();






// Basic page controls
// Sidebar Menu Open close
let Sidebar = document.querySelector(".sidebar")
let crossBtn = document.querySelector(".cross")
let hamburgerBtn = document.querySelector(".hamburger")
let blackBox = document.querySelector(".black-box");

crossBtn.addEventListener("click",() => {
    Sidebar.style.left = "-25vw"
    blackBox.style.opacity = "0"
    setTimeout("blackBox.style.display = \"none\"", 200);
})

blackBox.addEventListener("click",() => {
    Sidebar.style.left = "-25vw"
    blackBox.style.opacity = "0"
    setTimeout("blackBox.style.display = \"none\"", 200);
})

hamburgerBtn.addEventListener("click",() => {
    Sidebar.style.left = "0"
    blackBox.style.display = ""
    setTimeout("blackBox.style.opacity = \"0.3\"", 0);
})


// Search result box open close
let searchGlass = document.querySelector(".search-glass")
let searchResultContainer = document.querySelector(".search-result-container")
let isSearhOpen = false;

searchGlass.addEventListener("click",()=>{
    isSearhOpen ? closeSearchResultBox() : openSearchResultBox()
})


function openSearchResultBox(){
    searchResultContainer.style.height = "90vh"
    searchResultContainer.style.opacity = "1"
    isSearhOpen = true
}
function closeSearchResultBox(){
    searchResultContainer.style.height = "0vh"
    searchResultContainer.style.opacity = "0"
    isSearhOpen = false
}
