var monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];
var dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

var currentDate = new Date();
var formattedDate = dayNames[currentDate.getDay()] + ", " +
    monthNames[currentDate.getMonth()] + " " +
    currentDate.getDate() + ", " +
    currentDate.getFullYear();

document.getElementById("current-date").innerText = formattedDate;