class SpecialHeader extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `         <header class="Dashboard-topbar light">
        <div class="Dashboard-hamburger-menu" onclick="toggleSidebar()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="Dashboard-logo">EMS</div>
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
`
    }
  }
  
 customElements.define('specia-header', SpecialHeader);


class SpecialNavbar extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `  <div class="Dashboard-dashboard">
        <nav id="sidebar" class="Dashboard-sidebar light">
            <ul>
                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('profile-dropdown')">
                        <i class="fa-solid fa-users Dashboard-icon-small"></i> Profile
                    </a>
                    <ul id="profile-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Create Profile</a></li>
                        <li><a href="#">View Profile</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('leads-dropdown')">
                        <i class="fa-regular fa-address-card Dashboard-icon-small"></i> Leads
                    </a>
                    <ul id="leads-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Create Lead</a></li>
                        <li><a href="#">View Lead</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('costs-dropdown')">
                        <i class="fa-solid fa-calculator Dashboard-icon-small"></i> Cost Estimation
                    </a>
                    <ul id="costs-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Cost</a></li>
                        <li><a href="#">Costs</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('tickets-dropdown')">
                        <i class="fa-solid fa-ticket Dashboard-icon-small"></i> Tickets
                    </a>
                    <ul id="tickets-dropdown" class="Dashboard-submenu">
                        <li><a href="#">View Tickets</a></li>
                        <li><a href="#">Assign Tickets</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="javascript:void(0);" onclick="toggleDropdown('payroll-dropdown')">
                        <i class="fa-regular fa-credit-card Dashboard-icon-small"></i> Payroll
                    </a>
                    <ul id="payroll-dropdown" class="Dashboard-submenu">
                        <li><a href="#">Add Payroll</a></li>
                        <li><a href="#">View Payroll</a></li>
                    </ul>
                </li>

                <li class="Dashboard-dropdown">
                    <a href="#">
                        <i class="fa-solid fa-book Dashboard-icon-small"></i> Report
                    </a>
                </li>

                <li>
                    <button class="Dashboard-logout-button">Logout</button>
                </li>
            </ul>
        </nav>

        <main class="Dashboard-main-content">
            <h1>Dashboard Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            <p>... (Add more content for testing scrolling) ...</p>
        </main>
    </div>

    
`
    }
  }

 customElements.define('specia-navbar', SpecialNavbar);  
  
  