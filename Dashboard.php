<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
    <link rel="stylesheet" href="CSS/EmployeesTable.css">

</head>

<body class="Dashboard light"> -->
<header class="Dashboard-topbar light">
        <div class="Dashboard-hamburger-menu" onclick="toggleSidebar()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="Dashboard-logo">EMS</div>
        <div class="Dashboard-search-container">
            <input type="text" placeholder="Search...">
        </div>
        <div class="Dashboard-right-icons">
            <div class="Dashboard-circle Dashboard-notification-icon">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div class="Dashboard-circle Dashboard-user-profile">
                <i class="fa-regular fa-user"></i>
            </div>
            <div class="Dashboard-circle" onclick="toggleTheme()" style="cursor: pointer;">
                <i class="fa-solid fa-moon" id="theme-icon"></i>
            </div>
        </div>
    </header>

    <div class="Dashboard-dashboard">
        <nav id="sidebar" class="Dashboard-sidebar light">
            <ul>
                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('profile-dropdown')">
                        <i class="fa-solid fa-users Dashboard-icon-small"></i> Profile
                        <!-- <div class="Dashboard-arrow"></div> -->
                    </a>
                    
                    <ul id="profile-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Create Profile</a></li>
                        <li><a href="#">View Profile</a></li>
                    </ul>
                </li>
 
                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('leads-dropdown')">
                        <i class="fa-regular fa-address-card Dashboard-icon-small"></i> Leads
                        <!-- <div class="Dashboard-arrow"></div> -->
                    </a>
                    <ul id="leads-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Create Lead</a></li>
                        <li><a href="#">View Lead</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('costs-dropdown')">
                        <i class="fa-solid fa-calculator Dashboard-icon-small"></i> Cost Estimation
                        <!-- <div class="Dashboard-arrow"></div> -->
                    </a>
                    <ul id="costs-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Cost</a></li>
                        <li><a href="#">Costs</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('tickets-dropdown')">
                        <i class="fa-solid fa-ticket Dashboard-icon-small"></i> Tickets
                        <!-- <div class="Dashboard-arrow"></div> -->
                    </a>
                    <ul id="tickets-dropdown" class="Dashboard-submenu">
                        <li><a href="#">View Tickets</a></li>
                        <li><a href="#">Assign Tickets</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('expenses-dropdown')">
                        <i class="fa-solid fa-wallet Dashboard-icon-small"></i> Expenses
                        <!-- <div class="Dashboard-arrow"></div> -->
                    </a>
                    <ul id="expenses-dropdown" class="Dashboard-submenu">
                        <li><a href="#">View Expenses</a></li>
                        <li><a href="#">Create Expenses</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('WorkFlow-dropdown')">
                        <i class="fa-solid fa-sitemap Dashboard-icon-small"></i>Workflow
                    </a>
                    <ul id="WorkFlow-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Flow</a></li>
                        <li><a href="#">Flows</a></li>
                    </ul>
                </li>
            </ul>
            <button class="Dashboard-logout-button">Logout</button>
        </nav>

        <!-- <div  class="master-table"> -->

 
