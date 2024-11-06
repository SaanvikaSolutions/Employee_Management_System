

// Data for additional options for each room type
const Final_additionalOptionsData = {
    'kitchen': [
        { text: "• Modular Kitchen Cabinets", img: "img/kitchen-cabinet.png" },
        { text: "• Countertops (Granite, Quartz)", img: "img/countertop.png" },
        { text: "• Backsplash Designs", img: "img/back-splash.png" },
        { text: "• Appliances (Built-in Fridge, Oven)", img: "img/appliance.png" }
    ],
    'livingRoom': [
        { text: "• Sofa and Seating Layouts", img: "img/sofa.png" },
        { text: "• TV Unit and Storage", img: "img/tv-unit.png" },
        { text: "• Lighting Options", img: "img/lighting.png" }
    ],
    'bedroom': [
        { text: "• Bed and Mattress Options", img: "img/bed.png" },
        { text: "• Wardrobe and Closet", img: "img/wardrobe.png" },
        { text: "• Lighting Fixtures", img: "img/bedroom-lighting.png" }
    ],
    'bathroom': [
        { text: "• Shower Area and Bathtubs", img: "img/shower.png" },
        { text: "• Toilet and Vanity", img: "img/toilet.png" },
        { text: "• Bathroom Fixtures", img: "img/bathroom-fixtures.png" }
    ],
    'studyRoom': [
        { text: "• Desk and Chair Options", img: "img/study-desk.png" },
        { text: "• Bookshelf Design", img: "img/bookshelf.png" },
        { text: "• Lighting and Decor", img: "img/study-lighting.png" }
    ],
    'homeTheater': [
        { text: "• Projector and Screen", img: "img/projector.png" },
        { text: "• Seating Layout", img: "img/theater-seating.png" },
        { text: "• Sound Systems", img: "img/sound-system.png" }
    ]
};

// Toggles selection of the room
function toggleSelection(element, roomType) {
    element.classList.toggle("selected");
    const isRoomSelected = element.classList.contains("selected");

    // Show additional options for the selected room
    if (isRoomSelected) {
        showAdditionalOptions(roomType);
        if (roomType === 'studyRoom' || roomType === 'homeTheater') {
            document.getElementById("Final-roomSizeOptions").style.display = "block";
        }
    } else {
        hideAdditionalOptions();
        if (roomType === 'studyRoom' || roomType === 'homeTheater') {
            document.getElementById("Final-roomSizeOptions").style.display = "none";
        }
    }
}

// Show additional options for selected room
function showAdditionalOptions(roomType) {
    const Final_additionalContent = document.getElementById('Final-additionalContent');
    const optionsData = Final_additionalOptionsData[roomType];
    let htmlContent = '';

    if (optionsData) {
        optionsData.forEach(item => {
            htmlContent += `  
                <div class="Final-EMS-additional-option" onclick="toggleOptionSelection(this)">
                    <img src="${item.img}" alt="">
                    <span>${item.text}</span>
                </div>`;
        });
        document.getElementById('Final-additionalOptions').style.display = 'block';
        Final_additionalContent.innerHTML = htmlContent;
    }
}

// Hide additional options if no room is selected
function hideAdditionalOptions() {
    document.getElementById('Final-additionalOptions').style.display = 'none';
}

// Toggle selection for additional options
function toggleOptionSelection(option) {
    option.classList.toggle("selected");
}

// Handle room size selection
function selectRoomSize(element, size) {
    const buttons = document.querySelectorAll('.Final-room-size-button');
    buttons.forEach(btn => btn.classList.remove('selected'));
    element.classList.add('selected');
    console.log(`Room size selected: ${size}`);
    checkForQuotation();
}

// Check for completed selections to show generate quotation button
function checkForQuotation() {
    const roomSelected = document.querySelectorAll('.Final-room-option.selected').length > 0;
    const roomSizeSelected = document.querySelectorAll('.Final-room-size-button.selected').length > 0;

    if (roomSelected && roomSizeSelected) {
        document.querySelector('.Final-generate-quotation-button').style.display = 'block';
    }
}

// Generate quotation function (for demonstration purposes)
// function generateQuotation() {
//     alert("Quotation Generated! (Please wait.)");
// }