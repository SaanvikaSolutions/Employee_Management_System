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

let roomCounters = { Bedroom: 1, Hall: 1, Kitchen: 1, Balcony: 1 };

function selectRoom(room) {
    const optionsContainer = document.querySelector('.EMS-COST-options-container');
    optionsContainer.innerHTML = ''; // Clear previous content

    // Create room name display
    const roomNameElement = document.createElement('div');
    roomNameElement.className = 'EMS-COST-room-name-display';
    roomNameElement.innerText = room;  // Display room name (e.g., "Bedroom")
    optionsContainer.appendChild(roomNameElement);

    // Create a table to hold the content for furniture, sqft, and quality columns
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

    // Customize options for each room type
    const options = {
        'Bedroom': ['Wood work', 'Bed', 'Wall paneling', 'Paints', 'Study table', 'Dressing'],
        'Hall': ['T.V.UNIT - Laminate & Side Design', 'T.V.UNIT - Glassdoors with profile', 'T.V.UNIT - Side Design', 'Lighting'],
        'Kitchen': ['Cabinets', 'Countertop', 'Appliances', 'Sink'],
        'Balcony': ['Plants', 'Seating', 'Flooring', 'Lighting']
    };

    // Add rows with corresponding data for each room
    options[room].forEach(item => {
        const row = document.createElement('tr');

        const furnitureCell = document.createElement('td');
        furnitureCell.innerHTML = `<label><img src="images/${item.toLowerCase().replace(/\s+/g, '-')}-icon.png" alt="${item} Icon"> ${item} <input type="checkbox"></label>`;
        row.appendChild(furnitureCell);

        const sqftCell = document.createElement('td');
        sqftCell.innerHTML = ` 
                <input type="number" class="EMS-COST-sqft-input" placeholder="W" oninput="calculateSqft(this)"> x
                <input type="number" class="EMS-COST-sqft-input" placeholder="H" oninput="calculateSqft(this)"> =
                <span class="EMS-COST-total-sqft-box">0</span>
            `;
        row.appendChild(sqftCell);

        const qualityCell = document.createElement('td');
        qualityCell.innerHTML = ` 
                <select class="EMS-COST-dropdown">
                    <option>Basic</option>
                    <option>Premium</option>
                    <option>Luxury</option>
                </select>
            `;
        row.appendChild(qualityCell);

        tbody.appendChild(row);
    });

    // Append the table to options container
    optionsContainer.appendChild(table);

    // Add the "Add Room" button below
    const addRoomButton = document.createElement('button');
    addRoomButton.classList.add('EMS-COST-add-room-btn');
    addRoomButton.innerHTML = '<img src="images/plus-icon.png" alt="Add Room"> Add Room';
    addRoomButton.onclick = function () {
        addRoom(room);
    };
    optionsContainer.appendChild(addRoomButton);
}

function addRoom(room) {
    // Increment the room counter for the selected room type
    const roomName = `${room}${roomCounters[room]}`;
    roomCounters[room]++;

    // Get the container that holds the room options (the main container for rooms)
    const containerWrapper = document.getElementById('containerWrapper');

    // Create a new row for the new room options
    const newRow = document.createElement('div');
    newRow.className = 'EMS-COST-container';  // Apply the new row's class

    // Create a new room selection column
    const roomSelectionColumn = document.createElement('div');
    roomSelectionColumn.className = 'EMS-COST-room-selection';
    const roomTypeButton = document.createElement('button');
    roomTypeButton.innerHTML = `<span>${roomName}</span>`;
    roomSelectionColumn.appendChild(roomTypeButton);

    // Add this room selection column to the new row
    newRow.appendChild(roomSelectionColumn);

    // Create the options container for furniture, sqft, and quality columns
    const optionsContainer = document.createElement('div');
    optionsContainer.className = 'EMS-COST-options-container';

    // Create a new room name display
    const roomNameElement = document.createElement('div');
    roomNameElement.className = 'EMS-COST-room-name-display';
    roomNameElement.innerText = roomName;  // Display updated room name
    optionsContainer.appendChild(roomNameElement);

    // Create a table to hold the content for furniture, sqft, and quality columns
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

    // Customize options for each room type
    const options = {
        'Bedroom': ['Wood work', 'Bed', 'Wall paneling', 'Paints', 'Study table', 'Dressing'],
        'Hall': ['Sofa', 'Center Table', 'Wall Paints', 'Lighting'],
        'Kitchen': ['Cabinets', 'Countertop', 'Appliances', 'Sink'],
        'Balcony': ['Plants', 'Seating', 'Flooring', 'Lighting']
    };

    // Add rows with corresponding data for each room
    options[room].forEach(item => {
        const row = document.createElement('tr');

        const furnitureCell = document.createElement('td');
        furnitureCell.innerHTML = `<label><img src="images/${item.toLowerCase().replace(/\s+/g, '-')}-icon.png" alt="${item} Icon"> ${item} <input type="checkbox"></label>`;
        row.appendChild(furnitureCell);

        const sqftCell = document.createElement('td');
        sqftCell.innerHTML = ` 
                <input type="number" class="EMS-COST-sqft-input" placeholder="W" oninput="calculateSqft(this)"> x
                <input type="number" class="EMS-COST-sqft-input" placeholder="H" oninput="calculateSqft(this)"> =
                <span class="EMS-COST-total-sqft-box">0</span>
            `;
        row.appendChild(sqftCell);

        const qualityCell = document.createElement('td');
        qualityCell.innerHTML = ` 
                <select class="EMS-COST-dropdown">
                    <option>Basic</option>
                    <option>Premium</option>
                    <option>Luxury</option>
                </select>
            `;
        row.appendChild(qualityCell);

        tbody.appendChild(row);
    });

    // Append the table to options container
    optionsContainer.appendChild(table);

    // Add the "Add Room" button below
    const addRoomButton = document.createElement('button');
    addRoomButton.classList.add('EMS-COST-add-room-btn');
    addRoomButton.innerHTML = '<img src="images/plus-icon.png" alt="Add Room"> Add Room';
    addRoomButton.onclick = function () {
        addRoom(room);
    };
    optionsContainer.appendChild(addRoomButton);

    // Add the options container to the new row
    newRow.appendChild(optionsContainer);

    // Append the new row to the container wrapper
    containerWrapper.appendChild(newRow);
}

function calculateSqft(element) {
    const parentDiv = element.parentNode;
    const width = parentDiv.querySelector('input:nth-child(1)').value;
    const height = parentDiv.querySelector('input:nth-child(2)').value;
    const totalSqft = width && height ? width * height : 0;
    parentDiv.querySelector('.EMS-COST-total-sqft-box').innerText = totalSqft;
}


// ======================================


