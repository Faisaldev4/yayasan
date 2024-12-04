

 <header>
	<nav>
        <input type="checkbox" name="toggle-nav">
			<label for="toggle-nav">
				<span class="menu-icon"></span>
			</label>      
			<section class="side-nav-panel">
                <section class="nav-profile">
                    <img src="assets/images/logo899.png" alt="Logo">
                    <section class="profile-info">
                        <h2>ABOUT US</h2>
                        <p>Application developer with too many hobbies.</p>
                    </section>
                </section>
				<ul class="top-nav">
                    <li><a href="">Home</a></li>
					<li class="parent-item"><a href="#">About</a>
						<ul class="submenu">
							<li><a href="#">Leif</a></li>
							<li><a href="https://www.freecodecamp.org/" target="_blank">Coding</a></li>
						</ul>
					</li>
					<li class="parent-item"><a href="#">Projects</a>
						<ul class="submenu">
							<li><a href="#">Websites</a></li>
							<li><a href="#">Apps</a></li>
							<li><a href="#">Toolkits</a></li>
						</ul>
					</li>
					<li><a href="#">Contact</a></li>
				</ul>
                <section class="social-nav social-nav__aside">
                    <a href="#"><i class="fab fa-codepen"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="far fa-envelope"></i></a>
                    
                </section>
				
				<!--		DarkModeJS Toggle Button		 -->
				<button class="dark-mode-button" aria-label="dark mode toggle">
					<span aria-hidden="true" class="dark-toggle">
							<span class="DTspan"></span>
					</span>
				</button>
				
			</section>
	</nav>
	
	
   <div class="header-logo">
    <img alt="Logo of Pondok Pesantren Rajasinga" height="40"
    src="http://localhost:8080/assets/images/logo899.png" width="40"/>
 
    <span class="title-webpage">
     
    </span>
    
    
    <?php if (isset($showLoginButton) && $showLoginButton): ?>
<button class="button-login"
onclick="window.location.href='resources/views/auth/login.php';">Login</button>
<?php endif; ?>

   </div>
   
  

   

</header>


    <script src="http://localhost:8080/resources/views/layouts/layout_script/header.js"></script>