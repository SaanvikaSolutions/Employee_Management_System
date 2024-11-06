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
