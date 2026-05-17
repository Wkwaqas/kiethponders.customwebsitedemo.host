<!-- Navigation Bar -->
<nav class="main-nav navbar navbar-expand-lg sticky-top" style="background-color: red; padding: 10px 0;">
    <div class="container">

        <!-- Mobile View Only Row -->
        <div class="d-lg-none d-flex justify-content-between align-items-center w-100">
            
            <!-- Left: Language Dropdown -->
                <div id="google_translate_element"></div>


            <!-- Center: Title -->
            <div class="head-1 text-white fw-bold small text-center">
                New York, US • 31°C
            </div>

            <!-- Right: Hamburger Icon -->
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <!-- Desktop / Menu Section -->
        <div class="collapse navbar-collapse mt-2 mt-lg-0" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white" href="#">Latest News</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Business</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Finance</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Health</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Politics</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Fashion</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Real Estate</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Travel</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Entertainment</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Sports</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Tech</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Podcast</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="categoryDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu bg-red" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item text-white bg-red" href="#">Science</a></li>
                        <li><a class="dropdown-item text-white bg-red" href="#">Weather</a></li>
                        <li><a class="dropdown-item text-white bg-red" href="#">Opinion</a></li>
                        <li><a class="dropdown-item text-white bg-red" href="#">World</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Icons for Desktop -->
                <div class="d-lg-flex align-items-center gap-3">
                    <div id="google_translate_element"></div>
                
                    <div class="d-flex align-items-center position-relative">
                        <i class="fas fa-search text-white me-2"
                           id="searchToggle"
                           style="cursor:pointer;"></i>
                
                        <input type="text"
                               id="navbarSearch"
                               class="form-control form-control-sm"
                               placeholder="Search..."
                               style="width: 200px; display: none;">
                    </div>
                </div>

        </div>
    </div>
</nav>

    <!-- marquee -->
    <div class="container-fluid marque-one">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <marquee width="100%" direction="left" height="20px">
                    <span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi distinctio deleniti tempora
                        assumenda, necessitatibus libero sapiente quasi ut. Sit quia aspernatur maxime accusamus animi
                        nostrum qui amet iste et nam!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minus. Quis nulla assumenda quae in
                        laboriosam mollitia commodi nesciunt, illum sapiente rerum enim ducimus qui placeat laborum
                        dignissimos. Vitae, doloremque!
                    </span>
                </marquee>
            </div>
        </div>
    </div>
    <!-- marquee -->
</div>
<!-- Styles -->
<style>
    .dropdown-menu {
        background-color: red;
        border: none;
    }
    iframe#\:2\.container {
    display: none;
}


    .dropdown-item:hover {
        background-color: #c30000;
    }

    .head-1 {
        margin-bottom: 0;
        font-size: 15px;
    }

    .dropdown-menu-end {
        min-width: 150px;
    }
       #google_translate_element img {
        display: none !important;
    }

    /* Remove 'Powered by Google Translate' */
    .goog-logo-link,
    .goog-te-gadget span {
        display: none !important;
    }
    
    table {
        display: none !important;
    }

    /* Show only the selected language (like EN) */
    #google_translate_element .goog-te-gadget-simple {
        background-color: #000 !important;
        border: none !important;
        font-size: 14px;
        color: white;
        padding: 4px 10px;
        cursor: pointer;
    }

    #google_translate_element .goog-te-gadget-simple::after {
        content: "EN";
        color: white;
        font-weight: 500;
    }

    #languageDropdown,
    #languageDropdownMobile {
        padding: 4px 10px;
        font-size: 14px;
    }

    /* Search Overlay */
    .search-overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.95);
        top: 0;
        left: 0;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    
    .highlight {
        background-color: yellow;
        color: black;
    }
    
    #navbarSearch {
        transition: all 0.3s ease;
    }


    .search-box {
        width: 80%;
        max-width: 600px;
    }
    
    .search-box input {
        width: 100%;
        padding: 15px;
        font-size: 20px;
        border: none;
        outline: none;
        border-radius: 5px;
    }
    
    .close-btn {
        position: absolute;
        top: 20px;
        right: 40px;
        font-size: 40px;
        color: white;
        cursor: pointer;
    }

    /* Hide mobile dropdown in desktop */
    @media (min-width: 992px) {
        #languageDropdownMobile {
            display: none;
        }
    }

    /* Center text on mobile */
    @media (max-width: 991.98px) {
        .head-1 {
            font-size: 14px;
            flex: 1;
            text-align: center;
            margin: 0 5px;
        }
        .dropdown-menu.show {
    display: block;
    left: 0;
}
    }
    
</style>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,ar,es,de',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    
        const searchToggle = document.getElementById("searchToggle");
        const navbarSearch = document.getElementById("navbarSearch");
    
        // Sirf navbar links select karenge
        const navLinks = document.querySelectorAll("#navbarContent .nav-link, #navbarContent .dropdown-item");
    
        // Toggle search input
        searchToggle.addEventListener("click", function () {
            if (navbarSearch.style.display === "none") {
                navbarSearch.style.display = "block";
                navbarSearch.focus();
            } else {
                navbarSearch.style.display = "none";
                navbarSearch.value = "";
                removeHighlights();
            }
        });
    
        // Live Search (Navbar Only)
        navbarSearch.addEventListener("keyup", function () {
    
            removeHighlights();
    
            let searchText = this.value.trim().toLowerCase();
            if (searchText.length === 0) return;
    
            navLinks.forEach(link => {
                let originalText = link.textContent;
    
                if (originalText.toLowerCase().includes(searchText)) {
    
                    let regex = new RegExp(searchText, "gi");
    
                    link.innerHTML = originalText.replace(regex, match =>
                        `<span class="highlight">${match}</span>`
                    );
                }
            });
    
        });
    
        function removeHighlights() {
            navLinks.forEach(link => {
                link.innerHTML = link.textContent;
            });
        }
    
    });
    </script>






    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>