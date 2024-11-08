// Your data structure for additional options
const additionalOptionsData = {
 'fullDesign': [
     { text: "• Complete Interior & Exterior Package", img: "img/design-consultation.png" },
     { text: "• 3D Visualizations and Design Proposals", img: "img/planproposal.png" },
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
     { text: " Basic Interior Finishing", img: "img/basic interior finishing.png" },
     { text: " Custom Interior Layout", img: "img/Custom Interior Layout.png" },
     { text: "Wall and Partition Painting", img: "img/Customized Lighting Design.png" },
     { text: " Customized Lighting Design", img: "img/Lighting Design.png" },
     { text: " Furniture Arrangement Guidance", img: "img/Furniture Arrangement Guidance.png" },
     { text: " Space Optimization Solutions", img: "img/Space Optimization.png" }
 ],
 'onlyExterior': [
     { text: " Exterior Paint (Weatherproof Options)", img: "img/Exterior Paint (Weatherproof Options).png" },
     { text: " Wall Cladding (Stone, Tile, Brick Veneer)", img: "img/Wall Cladding.png" },
     { text: " Landscaping (Lawn, Garden Design)", img: "img/Landscaping.png" },
     { text: " Driveway and Pathway Layout", img: "img/driveway.png" },
     { text: " Outdoor Lighting Fixtures", img: "img/wall-lamp.png" },
     { text: " Fencing and Gate Design", img: "img/gate.png" }
 ]
};

// Function to toggle selection for each type
function toggleSelection(element, type) {
 const optionsDiv = document.getElementById('additionalOptions');
 const additionalContent = document.getElementById('additionalContent');
 const roomSizeOptions = document.getElementById('roomSizeOptions');
 const dimensionCalculator = document.getElementById('dimensionCalculator');

 const isSelected = element.classList.toggle('selected');

 // Check if additional options are available for the selected type
 if (additionalOptionsData[type]) {
     if (isSelected) {
         // Populate additional options if they exist for the selected type
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
// Function to select room size
function selectRoomSize(button, size) {
 const roomSizeButtons = document.querySelectorAll('.room-size-button');
 roomSizeButtons.forEach(btn => btn.classList.remove('selected'));
 button.classList.add('selected');
 // You can handle room size selection logic here
 console.log(`Selected room size: ${size}`);
}
// Function to calculate area
// Calculate the area when width or height input changes
function calculateArea() {
     // Get the values of width and height
     const width = parseFloat(document.getElementById('widthInput').value);
     const height = parseFloat(document.getElementById('heightInput').value);

     // Check if the values are valid numbers
     if (!isNaN(width) && !isNaN(height)) {
         const totalArea = width * height;
         // Display the calculated total area
         document.getElementById('totalArea').textContent = totalArea.toFixed(2);
     } else {
         // If invalid input, reset the total area display
         document.getElementById('totalArea').textContent = '0';
     }
 }

 // You can also initialize the function when the page loads to avoid errors if inputs are prefilled.
 window.onload = function() {
     calculateArea();
 };
