    <nav class="navbar navbar-expand-lg navbar-dark trans-navigation fixed-top navbar-togglable">
            <div class="container">
                <a class="navbar-brand" href="index-3.html">
                    <h3>Poliwangi</h3>
                </a>
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                                 <a class="dropdown-item " href="index.html">
                                    Home-1
                                </a>
                                <a class="dropdown-item " href="index-2.html">
                                    Home-2
                                </a> 
                                <a class="dropdown-item " href="index-3.html">
                                    Home-3
                                </a>
                                <a class="dropdown-item " href="index-4.html">
                                    Home-4
                                </a>
                            </div>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url('auth/user') ;?>" class="nav-link js-scroll-trigger">
                                SIRAPAT
                            </a>
                        </li>
                    </ul>
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>