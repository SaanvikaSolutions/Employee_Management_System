 const cityData = {
    "Andhra Pradesh": [
        "Amaravati", "Visakhapatnam", "Vijayawada", "Guntur",
        "Nellore", "Tirupati", "Kakinada", "Rajahmundry",
        "Chittoor", "Anantapur", "Kadapa (Cuddapah)", "Eluru",
        "Kurnool", "Srikakulam", "Vizianagaram", "Mahbubnagar",
        "Narasaraopet", "Peddapuram", "Tenali"
    ],
    "Telangana": [
        "Hyderabad", "Warangal", "Nizamabad", "Khammam",
        "Karimnagar", "Mahbubnagar", "Adilabad", "Ranga Reddy",
        "Medak", "Suryapet", "Nalgonda", "Peddapalli",
        "Jagtial", "Jagitial", "Vikarabad"
    ],
    "Karnataka": [
        "Bengaluru (Bangalore)", "Mysuru (Mysore)", "Hubballi-Dharwad",
        "Mangaluru (Mangalore)", "Belagavi (Belgaum)", "Tumakuru",
        "Kalaburagi (Gulbarga)", "Ballari (Bellary)"
    ],
    "Arunachal Pradesh": [
        "Anjaw", "Changlang", "Dibang Valley", "East Kameng",
        "East Siang", "Kurung Kumey", "Lohit", "Lower Dibang Valley",
        "Lower Subansiri", "Papum Pare", "Upper Siang", "Upper Subansiri",
        "West Kameng", "West Siang"
    ],
    "Assam": [
        "Baksa", "Barpeta", "Bongaigaon", "Cachar",
        "Darrang", "Dhemaji", "Dhubri", "Dibrugarh",
        "Goalpara", "Golaghat", "Jorhat", "Kamrup",
        "Karimganj", "Kokrajhar", "Nagaon", "Nalbari",
        "Sivasagar", "Sonitpur", "Tinsukia", "Udalguri"
    ],
    "Bihar": [
        "Araria", "Arwal", "Aurangabad", "Bhabhua",
        "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga",
        "Gaya", "Gopalganj", "Katihar", "Khagaria",
        "Madhubani", "Munger", "Muzaffarpur", "Nalanda",
        "Nawada", "Patna", "Purnia", "Rohtas",
        "Saharsa", "Samastipur", "Saran", "Sheikhpura",
        "Sitamarhi", "Siwan", "Vaishali", "West Champaran"
    ],
    "Chhattisgarh": [
        "Balod", "Baloda Bazar", "Bastar", "Bilaspur",
        "Dantewada", "Dhamtari", "Durg", "Janjoir-Champa",
        "Korba", "Koriya", "Mahasamund", "Raigarh",
        "Raipur", "Rajnandgaon", "Sukma", "Surguja"
    ],
    "Goa": [
        "North Goa", "South Goa"
    ],
    "Gujarat": [
        "Ahmedabad", "Anand", "Aravalli", "Banaskantha",
        "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur",
        "Dahod", "Dangs", "Gandhinagar", "Kutch",
        "Mahisagar", "Mehsana", "Narmada", "Navsari",
        "Panchmahal", "Patan", "Porbandar", "Rajkot",
        "Sabarkantha", "Surat", "Surendranagar", "Vadodara",
        "Valsad"
    ],
    "Haryana": [
        "Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad",
        "Fatehabad", "Gurugram", "Hisar", "Jhajjar",
        "Jind", "Kaithal", "Karnal", "Kurukshetra",
        "Mahendragarh", "Panchkula", "Panipat", "Rewari",
        "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"
    ],
    "Himachal Pradesh": [
        "Bilaspur", "Chamba", "Hamirpur", "Kinnaur",
        "Kullu", "Lahaul and Spiti", "Mandi", "Shimla",
        "Sirmaur", "Solan", "Una"
    ],
    "Jharkhand": [
        "Bokaro", "Chatra", "Deoghar", "Dhanbad",
        "Dumka", "East Singhbhum", "Giridih", "Godda",
        "Gumla", "Jamtara", "Khunti", "Koderma",
        "Latehar", "Lohardaga", "Palamu", "Ranchi",
        "Sahibganj", "Saraikela Kharsawan", "West Singhbhum"
    ],
    "Kerala": [
        "Alappuzha", "Ernakulam", "Idukki", "Kannur",
        "Kasaragod", "Kollam", "Kottayam", "Kozhikode",
        "Malappuram", "Pathanamthitta", "Thrissur",
        "Thiruvananthapuram", "Wayanad"
    ],
    "Madhya Pradesh": [
        "Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar",
        "Balaghat", "Barwani", "Betul", "Bhind",
        "Bhopal", "Burhanpur", "Chhindwara", "Damoh",
        "Datia", "Dewas", "Dindori", "Guna",
        "Gwalior", "Hoshangabad", "Indore", "Jabalpur",
        "Katni", "Khandwa", "Khargone", "Mandla",
        "Mandsaur", "Morena", "Neemuch", "Panna",
        "Raisen", "Rajgarh", "Ratlam", "Rewa",
        "Sagar", "Satna", "Sehore", "Shahdol",
        "Shajapur", "Sheopur", "Shivpuri", "Sidhi",
        "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
    ],
    "Maharashtra": [
        "Ahmednagar", "Akola", "Amravati", "Aurangabad",
        "Beed", "Bhandara", "Buldhana", "Chandrapur",
        "Dhule", "Gadchiroli", "Gondia", "Jalna",
        "Kolhapur", "Latur", "Mumbai", "Nagpur",
        "Nashik", "Osmanabad", "Palghar", "Pune",
        "Raigad", "Ratnagiri", "Sangli", "Satara",
        "Sindhudurg", "Solapur", "Thane", "Wardha",
        "Washim", "Yavatmal"
    ],
    "Manipur": [
        "Bishnupur", "Chandel", "Churachandpur", "Imphal East",
        "Imphal West", "Jiribam", "Kangpokpi", "Noney",
        "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal",
        "Ukhrul"
    ],
    "Meghalaya": [
        "East Garo Hills", "East Khasi Hills", "North Garo Hills",
        "Ri Bhoi", "South Garo Hills", "West Garo Hills", "West Khasi Hills"
    ],
    "Mizoram": [
        "Aizawl", "Champhai", "Kolasib", "Lawngtlai",
        "Lunglei", "Mamit", "Saiha", "Serchhip"
    ],
    "Nagaland": [
        "Dimapur", "Kohima", "Mokokchung", "Mon",
        "Peren", "Phek", "Tuensang", "Wokha",
        "Zunheboto"
    ],
    "Odisha": [
        "Angul", "Balangir", "Balasore", "Bargarh",
        "Bhadrak", "Boudh", "Cuttack", "Deogarh",
        "Dhenkanal", "Ganjam", "Gajapati", "Jharsuguda",
        "Kalahandi", "Kandhamal", "Kendrapara", "Keonjhar",
        "Khurda", "Malkangiri", "Mayurbhanj", "Nabarangpur",
        "Nayagarh", "Nuapada", "Puri", "Rayagada",
        "Sambalpur", "Sonepur", "Sundargarh"
    ],
    "Punjab": [
        "Amritsar", "Barnala", "Bathinda", "Faridkot",
        "Fatehgarh Sahib", "Ferozepur", "Gurdaspur", "Hoshiarpur",
        "Jalandhar", "Kapurthala", "Ludhiana", "Mansa",
        "Muktsar", "Patiala", "Ropar", "Sangrur",
        "Shaheed Bhagat Singh Nagar", "Tarn Taran"
    ],
    "Rajasthan": [
        "Ajmer", "Alwar", "Banswara", "Baran",
        "Barmer", "Bharatpur", "Bhilwara", "Bikaner",
        "Bundi", "Chittorgarh", "Churu", "Dausa",
        "Dholpur", "Dungarpur", "Jaipur", "Jaisalmer",
        "Jalore", "Jodhpur", "Karoli", "Kota",
        "Nagaur", "Pali", "Rajsamand", "Sikar",
        "Sirohi", "Tonk", "Udaipur"
    ],
    "Sikkim": [
        "East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"
    ],
    "Tamil Nadu": [
        "Ariyalur", "Chennai", "Coimbatore", "Cuddalore",
        "Dharmapuri", "Dindigul", "Erode", "Kanchipuram",
        "Kanniyakumari", "Karur", "Krishnagiri", "Madurai",
        "Nagapattinam", "Namakkal", "Perambalur", "Pudukkottai",
        "Ramanathapuram", "Salem", "Sivagangai", "Thanjavur",
        "Theni", "Tiruchirappalli", "Tirunelveli", "Tiruppur",
        "Vellore", "Villupuram", "Virudhunagar"
    ],
    "Tripura": [
        "Dhalai", "Gomati", "Khowai", "North Tripura",
        "Sepahijala", "South Tripura", "Unakoti", "West Tripura"
    ],
    "Uttar Pradesh": [
        "Agra", "Aligarh", "Ambedkarnagar", "Auraiya",
        "Azamgarh", "Badaun", "Bagpat", "Bahraich",
        "Ballia", "Balrampur", "Banda", "Barabanki",
        "Bareilly", "Bijnor", "Budaun", "Bulandshahr",
        "Chitrakoot", "Deoria", "Etah", "Etawah",
        "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad",
        "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda",
        "Gorakhpur", "Hamirpur", "Hardoi", "Hathras",
        "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar",
        "Kasganj", "Kaushambi", "Kushinagar", "Lalitpur",
        "Lucknow", "Maharajganj", "Mahoba", "Mainpuri",
        "Mathura", "Mau", "Meerut", "Mirzapur",
        "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh",
        "Rae Bareli", "Rampur", "Saharanpur", "Sant Ravidas Nagar",
        "Shahjahanpur", "Shamli", "Siddharthnagar", "Sitapur",
        "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"
    ],
    "Uttarakhand": [
        "Almora", "Bageshwar", "Chamoli", "Champawat",
        "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal",
        "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar",
        "Uttarkashi"
    ],
    "West Bengal": [
        "Alipurduar", "Bankura", "Bardhaman", "Birbhum",
        "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah",
        "Jalpaiguri", "Jhargram", "Malda", "Murshidabad",
        "Nadia", "North 24 Parganas", "Paschim Medinipur",
        "Purba Medinipur", "Purulia", "South 24 Parganas", "Kolkata"
    ]
};


    // Function to populate city dropdown based on selected state
    function populateCities() {
        const citySelect = document.getElementById('city');
        const state = document.getElementById('state').value;

        

        // Clear existing options
        citySelect.innerHTML = '<option value="">Select</option>';

        if (state) {
            cityData[state].forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            });
        }
    }

    document.querySelector('.lead-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Lead created successfully!');
        // Here you can add code to handle form submission (e.g., sending data to a server)
    });
