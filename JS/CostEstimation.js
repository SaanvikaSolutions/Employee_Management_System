

function selectProperty(element, propertyType) {
    // Highlight the selected property
    document.querySelectorAll('.cost-estimation-property-option').forEach(option => option.classList.remove('selected'));
    element.classList.add('selected');

    // Display default options when a residential property type is selected
    if (propertyType === 'residential') {
        showDefaultOptions();
    } else if (propertyType === 'office') {
        showOfficeOptions();
    }
}

function showDefaultOptions() {
    const defaultOptions = ['1BHK', '2BHK', '3BHK', '4BHK', '5BHK', '6BHK', '7BHK', '8BHK', '9BHK'];
    const container = document.getElementById('dynamic-options-container');
    container.style.display = 'flex';
    container.innerHTML = '';

    defaultOptions.forEach(option => {
        const button = document.createElement('button');
        button.className = 'cost-estimation-option-button';
        button.innerText = option;
        button.onclick = () => {
            toggleSelection(button); // Highlight selection
            toggleRoomSelection(option); // Show the room selection container
        };
        container.appendChild(button);
    });
}

function showOfficeOptions() {
    const officeOptions = ['Small Office', 'Medium Office', 'Large Office', 'Customize'];
    const container = document.getElementById('dynamic-options-container');
    container.style.display = 'flex';
    container.innerHTML = '';

    officeOptions.forEach(option => {
        const button = document.createElement('button');
        button.className = 'cost-estimation-option-button';
        button.innerText = option;
        button.onclick = () => {
            toggleSelection(button); // Highlight selection
            toggleRoomSelection(option); // Show the room selection container
        };
        container.appendChild(button);
    });
}

function toggleSelection(button) {
    // Remove selected class from all buttons and add to the clicked one
    document.querySelectorAll('.cost-estimation-option-button').forEach(opt => opt.classList.remove('selected'));
    button.classList.add('selected');
}

function showDynamicOptions(projectType, element) {
    const container = document.getElementById('dynamic-options-container');
    container.style.display = 'flex';
    container.innerHTML = '';

    // Highlight selected project type
    document.querySelectorAll('.cost-estimation-project-option').forEach(option => option.classList.remove('selected'));
    element.classList.add('selected');

    const selectedProperty = document.querySelector('.cost-estimation-property-option.selected');
    const propertyType = selectedProperty ? selectedProperty.getAttribute('aria-label') : '';

    // Check for combinations of property type and project type
    if (projectType === 'Interior') {
        if (propertyType.includes('Flat') || propertyType.includes('Villa') || propertyType.includes('Apartment') || propertyType.includes('Individual House') || propertyType.includes('Office')) {
            showDefaultOptions(); // Show BHK options
        }
    } else if (projectType === 'Construction') {
        // If the selected property type is Office, show office options
        if (propertyType.includes('Office')) {
            showOfficeOptions();
        } else {
            showDefaultOptions(); // Show BHK options for other properties
        }
    }
}

function toggleRoomSelection(option) {
    const roomOptionsContainer = document.getElementById('room-options');
    roomOptionsContainer.innerHTML = ''; // Clear previous options
    document.getElementById('room-selection-container').style.display = 'flex';

    let roomData = [];
    
    if (option.includes('Office')) {
        // Specific rooms for office selections
        roomData = [
            { name: 'Conference Room', img: 'img/meeting-room.png' },
            { name: 'Reception', img: 'img/reception.png' },
            { name: 'Work Area', img: 'img/office.png' },
            { name: 'Manager cabin', img: 'img/workplace.png' },
            { name: 'Pantry', img: 'img/pantry (1).png' },
            { name: 'Restroom', img: 'img/reception.png' },
        ];
    } else if (option.includes('BHK')) {
        // Specific rooms for BHK selections
        roomData = [
            { name: 'Bedroom', img: 'img/bedroom.png' },
            { name: 'Living room', img: 'img/living-room.png' },
            { name: 'Kitchen', img: 'img/kitchen.png' },
            { name: 'Balcony', img: 'img/balcony.png' },
            { name: 'Bathroom', img: 'img/bathroom.png' },
            { name: 'Pooja Room', img: 'img/agni-pooja.png' },
            { name: 'Dining Room', img: 'img/dining-table.png' },
            { name: 'Home Theater', img: 'img/home-theater.png' },
            { name: 'Study Room', img: 'img/study.png' },
            { name: 'Utility Room', img: 'img/utility-room.png' },
            { name: 'Office', img: 'img/meeting-room-home.png' },
        ];
    }

    roomData.forEach(room => {
        const roomDiv = createRoomOption(room.name, room.img);
        roomOptionsContainer.appendChild(roomDiv);
    });
}

function createRoomOption(roomName, imageUrl) {
    const roomOption = document.createElement('div');
    roomOption.className = 'room-option';
    roomOption.onclick = () => toggleRoom(roomOption);
    roomOption.innerHTML = `
        <img src="${imageUrl}" alt="${roomName}">
        <span>${roomName}</span>
        <div>
            <button class="minus-button" onclick="changeCount(event, this, -1)">-</button>
            <span class="count">0</span>
            <button class="plus-button" onclick="changeCount(event, this, 1)">+</button>
        </div>
    `;
    return roomOption;
}

function toggleRoom(element) {
    // Toggle room selection
    element.classList.toggle('selected');
}

function changeCount(event, element, increment) {
    // Prevent triggering toggleRoom when clicking on count buttons
    event.stopPropagation();

    // Update the count
    const countSpan = element.parentNode.querySelector('.count');
    let count = parseInt(countSpan.innerText);
    count = Math.max(0, count + increment); // Prevent negative count
    countSpan.innerText = count;
}

// function continueSelection() {
//     alert("Continuing to next step...");
// }

// ----------------------- 2nd code------------------


// Your data structure for additional options
const additionalOptionsData = {
'fullDesign': [
{ text: "• Complete Interior & Exterior Package", img: "img/design-consultation.png" },
{ text: "• 3D Visualizations and Design Proposals", img: "img/material-selections.png" },
{ text: "• Space Planning and Zoning", img: "img/furniture-layout.png" },
{ text: "• Structural Modifications", img: "img/design-consultation.png" },
{ text: "• Color and Material Coordination", img: "img/material-selections.png" },
{ text: "• Decorative Wall Features (3D Panels, Wallpapers)", img: "img/furniture-layout.png" }
],
'woodwork': [
{ text: "• Custom Wardrobes (Walk-in, Hinged, Sliding)", img: "img/custom-cabinetry.png" },
{ text: "• Modular Kitchen Cabinets (Base, Wall-mounted)", img: "img/trim-molding.png" },
{ text: "• TV Units (With/Without Storage)", img: "img/built-in-furniture.png" },
{ text: "• Pooja Mandir Units", img: "img/wood-flooring.png" },
{ text: "• Custom Shelving Units", img: "img/trim-molding.png" },
{ text: "• Partitions and Dividers (Glass/Wood)", img: "img/built-in-furniture.png" },
{ text: "• Bookshelves and Study Tables", img: "img/wood-flooring.png" },
{ text: "• Decorative Wooden Wall Panels", img: "img/wood-flooring.png" }
],
'ceiling': [
{ text: "• Gypsum False Ceiling", img: "img/ceiling-design.png" },
{ text: "• Wooden Panels with Designs", img: "img/crown-molding.png" },
{ text: "• Pop Ceiling Designs", img: "img/lighting-integration.png" },
{ text: "• Decorative Ceiling Elements (Beams, Molding)", img: "img/ceiling-design.png" }
],
'flooring': [
{ text: "• Tandoor Stone Flooring", img: "img/flooring-options.png" },
{ text: "• Terracotta and Ceramic Tiles", img: "img/carpet.png" },
{ text: "• Marble (Polished, Matte Finish)", img: "img/vinyl.png" },
{ text: "• Granite (Black, Grey, White)", img: "img/flooring-options.png" },
{ text: "• Wooden Flooring (Engineered/Hardwood)", img: "img/carpet.png" },
{ text: "• Laminate and Vinyl Flooring", img: "img/vinyl.png" },
{ text: "• Epoxy Coating for Custom Designs", img: "img/carpet.png" },
{ text: "• Outdoor Deck Flooring (Composite Wood)", img: "img/vinyl.png" }
],
'furniture': [
{ text: "• Sofa Options: Sectional, Sleeper Sofa, Recliners, Leather/Fabric/Vinyl", img: "img/living-room-furniture.png" },
{ text: "• Tables: Central Coffee Table, End Tables, Console Tables", img: "img/bedroom-furniture.png" },
{ text: "• Dining Tables: Extendable, Glass Top, Marble Top", img: "img/office-furniture.png" },
{ text: "• Chairs: Armchairs, Benches, Accent Chairs, Bar Stools", img: "img/bedroom-furniture.png" },
{ text: "• Storage Furniture: Bookshelves, Chest of Drawers, Side Tables", img: "img/bedroom-furniture.png" },
{ text: "• Cots/Beds: King, Queen, Bunk Beds, Daybeds", img: "img/bedroom-furniture.png" },
{ text: "• Wardrobes: Built-In, Modular, with Mirrors, Pull-Out Storage", img: "img/bedroom-furniture.png" },
{ text: "• Quality Levels: Basic, Premium, Luxury", img: "img/bedroom-furniture.png" }
],
'decor': [
{ text: "• Wall Art: Photo Frames, Metal Art Pieces, Wooden Art", img: "img/wall-art.png" },
{ text: "• Home Accessories: Vases, Flower Pots, Statues, Candles", img: "img/lighting-fixtures.png" },
{ text: "• Lighting Decor: Hanging Pendants, Table Lamps, Floor Lamps", img: "img/lighting-fixtures.png" },
{ text: "• Soft Furnishings: Cushions, Throws, Curtains", img: "img/lighting-fixtures.png" },
{ text: "• Rugs and Carpets: Area Rugs, Runners, Mats", img: "img/lighting-fixtures.png" },
{ text: "• Decorative Mirrors: Framed, Wall-mounted, Vanity Mirrors", img: "img/lighting-fixtures.png" },
{ text: "• Additional Options: Planters, Terrariums, Display Trays", img: "img/lighting-fixtures.png" },
{ text: "• Quality Levels: Basic, Premium, Luxury", img: "img/indoor-plants.png" }
],
'designPainting': [
{ text: "• Matte, Gloss, Satin Finishes", img: "img/painting-services.png" },
{ text: "• Accent Wall Patterns (Stencils, Geometric)", img: "img/design-consultation.png" },
{ text: "• Custom Murals and Graffiti Walls", img: "img/painting-services.png" },
{ text: "• Venetian Plaster (Textured Look)", img: "img/painting-services.png" },
{ text: "• Faux Finish Painting (Marble, Stone Look)", img: "img/painting-services.png" },
{ text: "• Chalkboard Paint for Walls", img: "img/painting-services.png" },
{ text: "• Quality Levels: Basic, Premium, Luxury", img: "img/painting-services.png" }
],
'onlyInterior': [
{ text: "• Basic Interior Finishing", img: "img/room-layout.png" },
{ text: "• Custom Interior Layout", img: "img/lighting-design.png" },
{ text: "• Wall and Partition Painting", img: "img/color-schemes.png" },
{ text: "• Customized Lighting Design", img: "img/furniture-selection.png" },
{ text: "• Furniture Arrangement Guidance", img: "img/accessories.png" },
{ text: "• Space Optimization Solutions", img: "img/window-treatments.png" }
],
'onlyExterior': [
{ text: "• Exterior Paint (Weatherproof Options)", img: "img/exterior-paint.png" },
{ text: "• Wall Cladding (Stone, Tile, Brick Veneer)", img: "img/wall-cladding.png" },
{ text: "• Landscaping (Lawn, Garden Design)", img: "img/landscaping.png" },
{ text: "• Driveway and Pathway Layout", img: "img/driveway-layout.png" },
{ text: "• Outdoor Lighting Fixtures", img: "img/outdoor-lighting.png" },
{ text: "• Fencing and Gate Design", img: "img/fencing.png" }
]
};

// Function to toggle selection for each type
function selectOption(element, type) {
const optionsDiv = document.getElementById('additionalOptions');
const additionalContent = document.getElementById('additionalContent');
const roomSizeOptions = document.getElementById('roomSizeOptions');
const dimensionCalculator = document.getElementById('dimensionCalculator');

const isSelected = element.classList.toggle('selected');

// Check if additional options are available for the selected type
if (additionalOptionsData[type]) {
if (isSelected) {
    // Populate additional options if they exist for the selected type
    console.log(additionalOptionsData[type]);
    additionalContent.innerHTML = additionalOptionsData[type]
        .map(option => `
            <div class="EMS-additional-option" onclick="selectAdditionalOption(this)">
                <img src="${option.img}" alt="${option.text}">
                <span>${option.text}</span>
            </div>
        `).join('');
    optionsDiv.style.display = 'block';  // Show additional options section
} else {
    additionalContent.innerHTML = '';  // Clear additional options
    optionsDiv.style.display = 'none';  // Hide additional options section
}

// Always show room size options if any room selection is made
roomSizeOptions.style.display = 'block';
dimensionCalculator.style.display = 'block';  // Show dimension calculator as well
} else {
// If no additional options for this type, hide the additional options section
optionsDiv.style.display = 'none';
dimensionCalculator.style.display = 'none';  // Hide dimension calculator if no relevant selection
}
}

// Function to select an additional option
function selectAdditionalOption(option) {
option.classList.toggle('selected');
}
function selectRoomSize(button, size) {
const roomSizeButtons = document.querySelectorAll('.room-size-button');
roomSizeButtons.forEach(btn => btn.classList.remove('selected'));
button.classList.add('selected');
console.log(`Selected room size: ${size}`);

}
function calculateArea() {
const width = parseFloat(document.getElementById('widthInput').value);
const height = parseFloat(document.getElementById('heightInput').value);

if (!isNaN(width) && !isNaN(height)) {
    const totalArea = width * height;
    document.getElementById('totalArea').textContent = totalArea.toFixed(2);
} else {
    document.getElementById('totalArea').textContent = '0';
}
}
window.onload = function() {
calculateArea();
};
// ----------------------- 3nd code------------------


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
function generateQuotation() {
    alert("Quotation Generated! (This is just a demo)");
}
