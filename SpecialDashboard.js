class SpecialHeader extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `<header id="header" id="home">
  <div class="header-top">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                  <a href="tel:+953 012 3654 896">9908469236</a>
                  <a href="mailto:support@colorlib.com">varnainteriors24@gmail.com</a>					  
                  <a href="mailto:support@colorlib.com">srivarnahomes@gmail.com</a>					  
              </div>
              <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                  </ul>			
              </div>
          </div>			  					
      </div>
  </div>
  <div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
      <!-- <div id="logo">
        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
      </div> -->
      <div id="logo">
        <a href="index.html">Varna Groups</a>
    </div>
    
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="projects.html">gallery</a></li>
          <li class="menu-has-children"><a href="">Portfolio</a>
            <ul>
              <li><a href="Interior-Aboutus.html">Varna Interiors</a></li>
              <li><a href="Homes-AboutUs.html">Varna Homes</a></li>
            </ul>
          </li>	
          <!-- <li class="menu-has-children"><a href="">Pages</a>
            <ul>
                  <li><a href="project-details.html">Project Details</a></li>		
                <li><a href="elements.html">Elements</a></li>
                  <li class="menu-has-children"><a href="">Level 2 </a>
                    <ul>
                      <li><a href="#">Item One</a></li>
                      <li><a href="#">Item Two</a></li>
                    </ul>
                  </li>					                		
            </ul>
          </li>					          					          		           -->
          <li><a href="career.html">Careers</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->		    		
    </div>
  </div>
  </header>`
    }
  }
  customElements.define('specia-header', SpecialHeader);
  
  
  class SpecialFooter extends HTMLElement {
    connectedCallback() {
    this.innerHTML = ` <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>About Us</h6>
              <p>
                Transform Your Home with Varna Groups - Exceptional Interior Design and Comprehensive Home Services to Meet
                Your Needs.
              </p>
              <p class="footer-text">
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o"
                  aria-hidden="true"></i> by <a href="https://saanvikasolutions.com/" target="_blank">Saanvika Softwear
                  Solutions
              </p>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>Quick Links</h6>
              <div class="footer-nav">
                <ul>
                  <li><a href="Interior-Aboutus.html">Varna Interiors</a></li>
                  <li><a href="Homes-AboutUs.html">Varna Homes</a></li>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="services.html">Services</a></li>
                  <li><a href="projects.html">Gallery</a></li>
                  <li><a href="career.html">Career</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
            <div class="single-footer-widget">
              <h6>Follow Us</h6>
              <p>Let us be social</p>
              <div class="footer-social d-flex align-items-center">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>`
    }
    }
    customElements.define('special-footer', SpecialFooter);
  
  
  
  
  class SpecialHeaderx extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `   
      <header id="header" id="home">
          <div class="header-top">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                          <a href="tel:+953 012 3654 896">9908469236</a>
                          <a href="mailto:support@colorlib.com">varnainteriors24@gmail.com</a>					  
                          <a href="mailto:support@colorlib.com">srivarnahomes@gmail.com</a>					  
                      </div>
                      <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                          <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                          </ul>			
                      </div>
                  </div>			  					
              </div>
          </div>
          <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
              <!-- <div id="logo">
                <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
              </div> -->
              <div id="logo">
                <a href="index.html">Varna Groups</a>
            </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="index.html">Home</a></li>
             
                 
                  <li class="menu-has-children"><a href="">Portfolio</a>
                    <ul>
                      <li><a href="Interior-Aboutus.html">Varna Interiors</a></li>
                      <li><a href="Homes-AboutUs.html">Varna Homes</a></li>
                    </ul>
                  </li>	
                  <!-- <li class="menu-has-children"><a href="">Pages</a>
                    <ul>
                          <li><a href="project-details.html">Project Details</a></li>		
                        <li><a href="elements.html">Elements</a></li>
                          <li class="menu-has-children"><a href="">Level 2 </a>
                            <ul>
                              <li><a href="#">Item One</a></li>
                              <li><a href="#">Item Two</a></li>
                            </ul>
                          </li>					                		
                    </ul>
                  </li>					          					          		           -->
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav><!-- #nav-menu-container -->		    		
            </div>
          </div>
  
  
          <!-- <div class="container main-menu">
              <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                  <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                  <ul class="nav-menu">
                    <li class="menu-active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="projects.html">Projects</a></li>
                  </ul>
                </nav>		    		
              </div>
            </div> -->
          </header>
  `
    }
  }
  customElements.define('special-headerx', SpecialHeaderx);