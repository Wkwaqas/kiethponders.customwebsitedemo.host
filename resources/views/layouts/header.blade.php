<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thinkers News Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Sora&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/frontend/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>

<body>
    <div class="sticky-top">
        <div class="top-bar ">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                    <!-- newsflash text - mobile -->
                    <div class="col text-start logo mb-1 d-block d-md-none">
                        Thinkers<span>News</span>
                    </div>

                    <!-- logo image for mobile only -->
                    <div class="col-auto d-block d-md-none mobile-logo">
                        <img src="/frontend/assets/images/logosite.png" alt="Logo" style="height: 40px;"
                            class="me-2">
                    </div>

                    <!-- time (only) below newsflash - mobile only -->
                    <div class="col-12 d-block d-md-none mb-2">
                        <span class="time-text">June30 • 02:54 PM</span>
                    </div>

                    <!-- newsflash text - desktop -->
                    <div class="col-12 text-center logo mb-1 d-none d-md-block">
                        Thinkers<span>News</span>
                    </div>

                    <!-- time and location - desktop only -->
                    <div class="col-12 d-none d-md-flex justify-content-between align-items-center time-location-row">
                        <span class="time-text">June30 • 02:54 PM</span>
                        <span class="location-text">New York, US • 31°C</span>
                    </div>

                </div>
            </div>
        </div>



        <style>
            .top-bar .logo {
                font-weight: bold;
                font-size: 22px;
            }

            .time-location-row {
                font-size: 14px;
            }

            /* Mobile only */
            @media (max-width: 767.98px) {
                .mobile-logo {
                    margin-left: 6px;
                }

                .top-bar .logo {
                    margin-right: 6px;
                    text-align: left !important;
                    font-size: 24px;
                }

                .time-text {
                    font-size: 22px;
                    display: block;
                    font-weight: 700;
                    color: #aaa;
                    line-height: 10px;
                }

            }

            /* Desktop only */
            @media (min-width: 768px) {

                .mobile-logo,
                .top-bar .logo.d-block.d-md-none,
                .col-12.d-block.d-md-none.mb-2 {
                    display: none !important;
                }
            }
        </style>
