<!-- Navigation Bar -->
<nav class="main-nav navbar navbar-expand-lg" style="background-color: #ffffff; padding: 10px 0; border-bottom: 1px solid #e9ecef; box-shadow: 0 2px 10px rgba(0,0,0,0.06);">
    <div class="container">

        <!-- Mobile View Only Row -->
        <div class="d-lg-none d-flex justify-content-between align-items-center w-100">
            
            <!-- Left: Language Dropdown -->
                <div id="google_translate_element"></div>


            <!-- Center: Title -->
            <div class="head-1 fw-bold small text-center" style="color: #0056b3;">
                New York, US • 31°C
            </div>

            <!-- Right: Hamburger Icon -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" style="color: #0056b3;">
                <i class="fas fa-bars fa-lg" style="color: #0056b3;"></i>
            </button>
        </div>

        <!-- Desktop / Menu Section -->
        <div class="collapse navbar-collapse mt-2 mt-lg-0" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Latest News</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Business</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Finance</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Health</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Politics</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Fashion</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Real Estate</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Travel</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Entertainment</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Sports</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Tech</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: #0056b3 !important; font-weight: 600;">Podcast</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="color: #0056b3 !important; font-weight: 600;">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown" style="background-color: #ffffff; border: 1px solid #dee2e6;">
                        <li><a class="dropdown-item" style="color: #0056b3; font-weight: 500;" href="#">Science</a></li>
                        <li><a class="dropdown-item" style="color: #0056b3; font-weight: 500;" href="#iheartradio-section">iHeartRadio</a></li>
                        <li><a class="dropdown-item" style="color: #0056b3; font-weight: 500;" href="#">Opinion</a></li>
                        <li><a class="dropdown-item" style="color: #0056b3; font-weight: 500;" href="#">World</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Icons for Desktop -->
                <div class="d-lg-flex align-items-center gap-3">
                    <div id="google_translate_element"></div>
                
                    <div class="d-flex align-items-center position-relative">
                        <i class="fas fa-search me-2"
                           id="searchToggle"
                           style="color: #0056b3; cursor:pointer;"></i>
                
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

    <!-- Live NASDAQ Stock Ticker -->
    <div class="container-fluid marque-one px-0">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    {
                        "description": "NASDAQ Composite",
                        "proName": "NASDAQ:IXIC"
                    },
                    {
                        "description": "Nasdaq 100",
                        "proName": "NASDAQ:NDX"
                    },
                    {
                        "description": "Apple",
                        "proName": "NASDAQ:AAPL"
                    },
                    {
                        "description": "Microsoft",
                        "proName": "NASDAQ:MSFT"
                    },
                    {
                        "description": "NVIDIA",
                        "proName": "NASDAQ:NVDA"
                    },
                    {
                        "description": "Amazon",
                        "proName": "NASDAQ:AMZN"
                    },
                    {
                        "description": "Alphabet (Google)",
                        "proName": "NASDAQ:GOOGL"
                    },
                    {
                        "description": "Meta",
                        "proName": "NASDAQ:META"
                    },
                    {
                        "description": "Tesla",
                        "proName": "NASDAQ:TSLA"
                    },
                    {
                        "description": "Broadcom",
                        "proName": "NASDAQ:AVGO"
                    },
                    {
                        "description": "AMD",
                        "proName": "NASDAQ:AMD"
                    },
                    {
                        "description": "Intel",
                        "proName": "NASDAQ:INTC"
                    },
                    {
                        "description": "Netflix",
                        "proName": "NASDAQ:NFLX"
                    },
                    {
                        "description": "Costco",
                        "proName": "NASDAQ:COST"
                    },
                    {
                        "description": "Adobe",
                        "proName": "NASDAQ:ADBE"
                    }
                ],
                "showSymbolLogo": true,
                "isTransparent": false,
                "displayMode": "adaptive",
                "colorTheme": "dark",
                "locale": "en"
            }
            </script>
        </div>
    </div>
    <!-- Live NASDAQ Stock Ticker -->
</div>
<!-- Styles -->
<style>
    .marque-one {
        overflow: hidden;
        min-height: 46px;
        background: #131722 !important;
        border-top: 1px solid #2a2e39;
        border-bottom: 1px solid #2a2e39;
    }
    .tradingview-widget-copyright {
        display: none !important;
    }
    .main-nav {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e9ecef;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
    }
    .main-nav .navbar-nav .nav-link {
        color: #0056b3 !important;
        font-weight: 600;
        transition: color 0.2s ease;
    }
    .main-nav .navbar-nav .nav-link:hover,
    .main-nav .navbar-nav .nav-link:focus {
        color: #003366 !important;
        text-decoration: underline;
    }
    .dropdown-menu {
        background-color: #ffffff !important;
        border: 1px solid #dee2e6 !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    iframe#\:2\.container {
    display: none;
}


    .dropdown-item {
        color: #0056b3 !important;
        font-weight: 500;
        padding: 8px 16px;
    }

    .dropdown-item:hover {
        background-color: #e8f0fe !important;
        color: #003366 !important;
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