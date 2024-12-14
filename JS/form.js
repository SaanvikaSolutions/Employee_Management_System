document.addEventListener("DOMContentLoaded", () => { 
    // ===========================
    // Toggle Alternate Fields
    // ===========================
    const alternateCheckbox = document.getElementById("alternate-person-name");
    const alternateFields = document.getElementById("alternate-fields");
    const formContainer = document.querySelector(".form-container");

    if (alternateCheckbox && alternateFields && formContainer) {
        alternateCheckbox.addEventListener("change", () => {
            const isVisible = alternateCheckbox.checked;
            alternateFields.style.display = isVisible ? "block" : "none";
            formContainer.classList.toggle("alternate-fields-visible", isVisible);
        });
    }

    // ===========================
    // Toggle Button Selection
    // ===========================
    const toggleSelection = (selector, activeClass) => {
        const buttons = document.querySelectorAll(selector);
        if (buttons.length > 0) {
            buttons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    buttons.forEach((button) => button.classList.remove(activeClass));
                    btn.classList.add(activeClass);
                });
            });
        }
    };

    toggleSelection(".property-btn", "selected");
    toggleSelection(".project-btn", "selected");

    // ===========================
    // Room Management
    // ===========================
    const roomCounters = {
        Bedroom: 1,
        Kitchen: 1,
        "Living Room": 1,
        "Pooja Room": 1,
        "Dining Room": 1,
    };

    const selectedRooms = []; // Store selected room data

    function addRoom(roomType) {
        if (!roomType) {
            console.error("Room type is undefined or null!");
            return;
        }

        selectedRooms.push(roomType);
        console.log(`${roomType} added!`);
        console.log("Selected Rooms:", selectedRooms);
    }

    // Add Room
    window.addRoom = function (room) {
        if (!room || !roomCounters[room]) {
            console.error("Invalid room type!");
            return;
        }

        const roomName = `${room} ${roomCounters[room]}`;
        roomCounters[room]++;

        const containerWrapper = document.getElementById("containerWrapper");
        if (!containerWrapper) {
            console.error("Container Wrapper not found!");
            return;
        }

        const newRow = document.createElement("div");
        newRow.className = "EMSS EMSS-COST-container";

        const roomSelectionColumn = document.createElement("div");
        roomSelectionColumn.className = "EMSS EMSS-COST-room-selection";
        roomSelectionColumn.innerHTML = `<button><span>${roomName}</span></button>`;
        newRow.appendChild(roomSelectionColumn);

        const optionsContainer = document.createElement("div");
        optionsContainer.className = "EMSS EMSS-COST-options-container";

        const roomNameElement = document.createElement("div");
        roomNameElement.className = "EMSS EMSS-COST-room-name-display";
        roomNameElement.innerText = roomName;
        optionsContainer.appendChild(roomNameElement);

        const options = {
            Bedroom: ["Wardrobe Laminate", "TV Unit Small", "King Bed"],
            Kitchen: ["Bottom Cabinet", "Overhead Loft"],
            "Living Room": ["TV Unit - Laminate", "TV Unit - Glass Doors"],
            "Pooja Room": ["Pooja Unit Near Dining Area", "Pooja Unit Storage"],
            "Dining Room": ["Design Mirror & Lights", "Dining Table"],
        };

        const table = document.createElement("table");
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
        const tbody = table.querySelector("tbody");

        options[room].forEach((item) => {
            const row = document.createElement("tr");

            const furnitureCell = document.createElement("td");
            furnitureCell.innerHTML = `<label><input type="checkbox" onchange="handleSelection(this, '${roomName}', '${item}')"> ${item}</label>`;
            row.appendChild(furnitureCell);

            const sqftCell = document.createElement("td");
            sqftCell.innerHTML = `
                <input type="number" class="EMSS-COST-sqft-input" placeholder="W" oninput="updateSqft(this)"> x
                <input type="number" class="EMSS-COST-sqft-input" placeholder="H" oninput="updateSqft(this)"> =
                <span class="EMSS-COST-total-sqft-box">0</span>
            `;
            row.appendChild(sqftCell);

            const qualityCell = document.createElement("td");
            qualityCell.innerHTML = `
                <select class="EMSS-COST-dropdown">
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                    <option value="Luxury">Luxury</option>
                </select>
            `;
            row.appendChild(qualityCell);

            tbody.appendChild(row);
        });

        optionsContainer.appendChild(table);

        const addRoomButton = document.createElement("button");
        addRoomButton.className = "EMSS EMSS-COST-add-room-btn";
        addRoomButton.innerHTML = "<span>+</span> Add Room";
        addRoomButton.onclick = () => addRoom(room);
        optionsContainer.appendChild(addRoomButton);

        newRow.appendChild(optionsContainer);
        containerWrapper.appendChild(newRow);
    };

    // Update Square Feet
    window.updateSqft = function (input) {
        const row = input.closest("tr");
        const sqftInputs = row.querySelectorAll(".EMSS-COST-sqft-input");
        const width = parseFloat(sqftInputs[0].value) || 0;
        const height = parseFloat(sqftInputs[1].value) || 0;
        const totalSqft = width * height;
        row.querySelector(".EMSS-COST-total-sqft-box").innerText = totalSqft || "0";
    };

    // Handle Selection
    window.handleSelection = function (checkbox, roomName, itemName) {
        if (!roomName || !itemName) {
            console.error("Invalid room or item name!");
            return;
        }

        const row = checkbox.closest("tr");
        const sqftInputs = row.querySelectorAll(".EMSS-COST-sqft-input");
        const qualityDropdown = row.querySelector(".EMSS-COST-dropdown");

        const updateValues = () => {
            const width = parseFloat(sqftInputs[0].value) || 0;
            const height = parseFloat(sqftInputs[1].value) || 0;
            const quality = qualityDropdown.value;

            const index = selectedRooms.findIndex(
                (selection) => selection.room === roomName && selection.item === itemName
            );

            if (index > -1) {
                selectedRooms[index] = { room: roomName, item: itemName, width, height, quality };
            }
        };

        if (checkbox.checked) {
            selectedRooms.push({
                room: roomName,
                item: itemName,
                width: parseFloat(sqftInputs[0].value) || 0,
                height: parseFloat(sqftInputs[1].value) || 0,
                quality: qualityDropdown.value,
            });
            sqftInputs.forEach((input) => input.addEventListener("input", updateValues));
            qualityDropdown.addEventListener("change", updateValues);
        } else {
            const index = selectedRooms.findIndex(
                (selection) => selection.room === roomName && selection.item === itemName
            );
            if (index > -1) selectedRooms.splice(index, 1);
        }

        console.log("Updated Selections:", selectedRooms);
    };

    // Handle Form Submission
    const form = document.getElementById("client-form");
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from submitting normally

        const formData = new FormData(form);
        const clientData = {};
        formData.forEach((value, key) => {
            clientData[key] = value;
        });

        const payload = {
            client: clientData,
            roomDetails: selectedRooms,
        };

        console.log("Payload to send:", payload);

        fetch('submit_form.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
        })
        .then((response) => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then((data) => {
            console.log('Server response:', data);
            if (data.success) {
                alert("Data submitted successfully!");
            } else {
                alert("Failed to submit data: " + data.message);
            }
        })
        .catch((error) => {
            console.error('Error during fetch:', error);
            alert("An error occurred while submitting the data.");
        });
    });
});

// Add click event listener for project buttons
projectButtons.forEach(button => {
    button.addEventListener('click', () => {
        projectButtons.forEach(btn => btn.classList.remove('selected')); // Remove selected class from all
        button.classList.add('selected'); // Add selected class to clicked button
    });
});

/* ---------------------------------------------------- */
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
/* ---------------------------------------------------- */
