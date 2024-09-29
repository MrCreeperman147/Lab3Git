<header>
    <img id = "header_logo" src = "../../ressources/images/website/KEKtapeLogo.png"/>
    <!-- barre de recherche-->
    <form id = "header_search" method = "post" action = "index.php?controller=BaseController&action=researchAction">
        <input type = "search" id = "search_query" name = "searchQuery" placeholder="votre recherche...">
        <button type="submit" class = "btn_search"><i class = "fa fa-search" aria-hidden="true"></i></button>
    </form>
            
    <!--navbar-->
    <nav id = "header_nav" class = "header_dropdown_content">
        <!--navlist-->
        <!--si il est connecté-->

        <a class = "header_nav_button" href="index.php">ACCUEIL</a>
        <a class = "header_nav_button" href="index.php?controller=BaseController&action=catalogAction">CATALOGUE</a>
        <a class = "header_nav_button dropbtn" onclick="dropdown()">
            TYPE
            <form id = "nav_dropdown" class = "dropdown_content" method="POST" action="index.php?controller=BaseController&action=catalogTypeAction">
                <button type = "submit" class = "header_nav_button header_type_button" name = "idType" value = 1>
                    GILETS TACTIQUES
                </button>
                <button type = "submit" class = "header_nav_button header_type_button" name = "idType" value = 2>
                    GILET PARE-BALLES
                </button>
                <button type = "submit" class = "header_nav_button header_type_button" name = "idType" value = 3>
                    CASQUE AUDIO
                </button>
                <button type = "submit" class = "header_nav_button header_type_button" name = "idType" value = 4>
                    CASQUE BALLISTIQUES
                </button>
                <button type = "submit" class = "header_nav_button header_type_button" name = "idType" value = 5>
                    SACS A DOS
                </button>
            </form>
        </a>

        <a class = "header_nav_button " id = "connect1" href=#>PANIER</a>
        <a class = "header_nav_button " id = "connect2" href="index.php?controller=UserController&action=AccountAction">COMPTE</a>
        <a class = "header_nav_button " id = "connect3" href="index.php?controller=UserController&action=disconnectAction">DECONNEXION</a>

        <a class = "header_nav_button " id = "connect4" href="index.php?controller=BaseController&action=loginAction">CONNEXION</a>
        <a class = "header_nav_button " id = "connect5" href="index.php?controller=BaseController&action=registerAction">INSCRIPTION</a>

    </nav>
    <?php
        if(isset($_COOKIE['token']))
        {
            echo '<script>
                document.getElementById("connect1").style.display = "unset";
                document.getElementById("connect2").style.display = "unset";
                document.getElementById("connect3").style.display = "unset";
                document.getElementById("connect4").style.display = "none";
                document.getElementById("connect5").style.display = "none";
            </script>';
        }
    ?>
    <script>
        //when dropbtn is clicked
        function dropdown()
        {
            document.getElementById("nav_dropdown").classList.toggle("show");
        }

        //close the dropmenu if clicked outside
        window.onclick = function(event)
        {
        if(!event.target.matches('.dropbtn'))
            {
                var dropdowns = document.getElementsByClassName("dropdown_content");
                for(var i = 0; i < dropdowns.length; i++)
                {
                    var openDropdown = dropdowns[i];
                    if(openDropdown.classList.contains('show'))
                    {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        //when logged
        function logged()
        {
            document.getElementById("connect1").style.display = "unset";
            document.getElementById("connect2").style.display = "none";
            document.getElementById("connect3").style.display = "none";
        }
    </script>
</header>