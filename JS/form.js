document.addEventListener("DOMContentLoaded", () => {
    // Toggle Alternate Person Name Fields
    const alternateCheckbox = document.getElementById("alternate-person-name");
    const alternateFields = document.getElementById("alternate-fields");
    const formContainer = document.querySelector(".COSTE-form-container");

    alternateCheckbox.addEventListener("change", () => {
        if (alternateCheckbox.checked) {
            alternateFields.style.display = "block";
            formContainer.classList.add("alternate-fields-visible");
        } else {
            alternateFields.style.display = "none";
            formContainer.classList.remove("alternate-fields-visible");
        }
    });  

    // Toggle Property Type Selection
    const propertyButtons = document.querySelectorAll(".COSTE-property-btn");
    propertyButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            propertyButtons.forEach((button) => button.classList.remove("selected"));          
            btn.classList.add("selected");
        });
    });

    // Toggle Project Selection
    const projectButtons = document.querySelectorAll(".COSTE-project-btn");
    projectButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            projectButtons.forEach((button) => button.classList.remove("selected"));
            btn.classList.add("selected");
        });
    });
});

// ======================================

let roomCounters = { Bedroom: 1, Kitchen: 1, 'Living Room': 1, 'Pooja Room': 1, 'Dining Room': 1 };

// Function to add a room
function addRoom(room) {
    const roomName = `${room} ${roomCounters[room]}`;
    roomCounters[room]++;

    const containerWrapper = document.getElementById('containerWrapper');
    const newRow = document.createElement('div');
    newRow.className = 'EMSS EMSS-COST-container';

    const roomSelectionColumn = document.createElement('div');
    roomSelectionColumn.className = 'EMSS EMSS-COST-room-selection';
    const roomTypeButton = document.createElement('button');
    roomTypeButton.innerHTML = `<span>${roomName}</span>`;
    roomSelectionColumn.appendChild(roomTypeButton);
    newRow.appendChild(roomSelectionColumn);

    const optionsContainer = document.createElement('div');
    optionsContainer.className = 'EMSS EMSS-COST-options-container';

    const roomNameElement = document.createElement('div');
    roomNameElement.className = 'EMSS EMSS-COST-room-name-display';
    roomNameElement.innerText = roomName;
    optionsContainer.appendChild(roomNameElement);

    const table = document.createElement('table');
    table.innerHTML = `
        <thead>
            <tr>
                <th>Furniture & Fixtures</th>
                <th>Sqft</th>
                <th>Quality Type</th>
            </tr>
        </thead>
        <tbody></tbody>
    `;
    const tbody = table.querySelector('tbody');

    const options = {
        'Bedroom': ['Wadrobe Laminate', 'Wadrobe Loft', 'Glass Shutter for Wardrobe', 'Draws 2 Nos', 'TV Unit small', 'Dressing Box with 1 draw & Mirror', 'Closet Mirror', 'Study Unit', 'King Bed', '2 Side Tables'],
        'Kitchen': ['Bottom Cabinet - Chimney Side', 'Bottom Cabinet-Right Side', 'Bottom Cabinet -Fridge Side', 'Middle Cabinet-Right Side', 'Middle Cabinet -Fridge Side', 'Overhead Loft -Chimney Side', 'Overhead Loft -Right Side', 'Overhead Loft -Fridge Side', 'Corner Storage with Glass', 'Cutlery Basket', 'Thali Basket', 'Tandem Basket', 'Jolly Basket (Type 1)'],
        'Living Room': ['T.V.UNIT -Laminate & Side Design', 'T.V.UNIT -Glassdoors with profile', 'T.V.UNIT -Side Design'],
        'Pooja Room': ['Pooja unit near dining area -East Facing design with glass doors', 'Pooja Unit Storage (Drawers, Shelves)'],
        'Dining Room': ['Design Mirror & Lights (2 lights 3000Rs)', 'Dining area storage as per design', 'Dining Table(Wooden)', 'Dining Table (Glass)', 'Extendable Dining Table', 'Crockery Unit With Glass Doors', 'Crockery Unit Open Shelving']
    };

    options[room].forEach(item => {
        const row = document.createElement('tr');

        const furnitureCell = document.createElement('td');
        furnitureCell.innerHTML = `<label><input type="checkbox"> ${item}</label>`;
        row.appendChild(furnitureCell);

        const sqftCell = document.createElement('td');
        sqftCell.innerHTML = ` 
            <input type="number" class="EMSS EMSS-COST-sqft-input" placeholder="W" oninput="calculateSqft(this)"> x
            <input type="number" class="EMSS EMSS-COST-sqft-input" placeholder="H" oninput="calculateSqft(this)"> =
            <span class="EMSS EMSS-COST-total-sqft-box">0</span>
        `;
        row.appendChild(sqftCell);

        const qualityCell = document.createElement('td');
        qualityCell.innerHTML = ` 
            <select class="EMSS EMSS-COST-dropdown">
                <option>Basic</option>
                <option>Premium</option>
                <option>Luxury</option>
            </select>
        `;
        row.appendChild(qualityCell);

        tbody.appendChild(row);
    });

    optionsContainer.appendChild(table);

    const addRoomButton = document.createElement('button');
    addRoomButton.classList.add('EMSS', 'EMSS-COST-add-room-btn');
    addRoomButton.innerHTML = '<span>+</span> Add Room';
    addRoomButton.onclick = function () {
        addRoom(room);
    };
    optionsContainer.appendChild(addRoomButton);

    newRow.appendChild(optionsContainer);
    containerWrapper.appendChild(newRow);
}

// Function to calculate sqft area
function calculateSqft(input) {
    const row = input.closest('tr');
    const widthInput = row.querySelector('.EMSS .EMSS-COST-sqft-input:nth-child(1)'); // Width input
    const heightInput = row.querySelector('.EMSS .EMSS-COST-sqft-input:nth-child(2)'); // Height input
    const totalBox = row.querySelector('.EMSS .EMSS-COST-total-sqft-box');

    const width = parseFloat(widthInput.value) || 0;
    const height = parseFloat(heightInput.value) || 0;

    // Calculate the total square footage
    const totalSqft = width * height;
    totalBox.textContent = totalSqft ? totalSqft : '0';
}