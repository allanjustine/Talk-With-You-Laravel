<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <link rel="shortcut icon" href="https://www.pngmart.com/files/4/Crazy-PNG-Transparent-Picture.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>TWY | @yield('title')</title>
    @include('layout.navbar')
</head>

<body class="bg-gray">
    @yield('content')
</body>

<div class="hearts" aria-hidden="true">
    <div class="heart">

        <i class="fas fa-heart"></i>
    </div>
    <div class="heart">

        <i class="fas fa-heart"></i>
    </div>
    <div class="heart">

        <i class="far fa-heart"></i>
    </div>
    <div class="heart">
        <i class="far fa-heart"></i>
    </div>
    <div class="heart">

        <i class="fas fa-heart"></i>
    </div>
    <div class="heart">

        <i class="fas fa-heart"></i>
    </div>
    <div class="heart">
        <i class="far fa-heart"></i>
    </div>
    <div class="heart">

        <i class="fas fa-heart"></i>
    </div>
    <div class="heart">

        <i class="far fa-face-smile-hearts"></i>
    </div>
    <div class="heart">
        <i class="far fa-face-smile-hearts"></i>
    </div>
</div>



{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</html>

<style>
    /* body {
        background: #1c1e21;
    } */

    .heart {
        color: #a70d0d;
        font-size: 1em;
        font-family: Arial;
        text-shadow: 0 0 1px #000;
    }

    @-webkit-keyframes hearts-fall {
        0% {
            top: -10%
        }

        100% {
            top: 100%
        }
    }

    @-webkit-keyframes hearts-shake {
        0% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px)
        }

        50% {
            -webkit-transform: translateX(80px);
            transform: translateX(80px)
        }

        100% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px)
        }
    }

    @keyframes hearts-fall {
        0% {
            top: -10%
        }

        100% {
            top: 100%
        }
    }

    @keyframes hearts-shake {
        0% {
            transform: translateX(0px)
        }

        50% {
            transform: translateX(80px)
        }

        100% {
            transform: translateX(0px)
        }
    }

    .heart {
        position: fixed;
        top: -10%;
        z-index: 9999;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: default;
        -webkit-animation-name: hearts-fall, hearts-shake;
        -webkit-animation-duration: 10s, 3s;
        -webkit-animation-timing-function: linear, ease-in-out;
        -webkit-animation-iteration-count: infinite, infinite;
        -webkit-animation-play-state: running, running;
        animation-name: hearts-fall, hearts-shake;
        animation-duration: 10s, 3s;
        animation-timing-function: linear, ease-in-out;
        animation-iteration-count: infinite, infinite;
        animation-play-state: running, running
    }

    .heart:nth-of-type(0) {
        left: 1%;
        -webkit-animation-delay: 0s, 0s;
        animation-delay: 0s, 0s
    }

    .heart:nth-of-type(1) {
        left: 10%;
        -webkit-animation-delay: 1s, 1s;
        animation-delay: 1s, 1s
    }

    .heart:nth-of-type(2) {
        left: 20%;
        -webkit-animation-delay: 6s, .5s;
        animation-delay: 6s, .5s
    }

    .heart:nth-of-type(3) {
        left: 30%;
        -webkit-animation-delay: 4s, 2s;
        animation-delay: 4s, 2s
    }

    .heart:nth-of-type(4) {
        left: 40%;
        -webkit-animation-delay: 2s, 2s;
        animation-delay: 2s, 2s
    }

    .heart:nth-of-type(5) {
        left: 50%;
        -webkit-animation-delay: 8s, 3s;
        animation-delay: 8s, 3s
    }

    .heart:nth-of-type(6) {
        left: 60%;
        -webkit-animation-delay: 6s, 2s;
        animation-delay: 6s, 2s
    }

    .heart:nth-of-type(7) {
        left: 70%;
        -webkit-animation-delay: 2.5s, 1s;
        animation-delay: 2.5s, 1s
    }

    .heart:nth-of-type(8) {
        left: 80%;
        -webkit-animation-delay: 1s, 0s;
        animation-delay: 1s, 0s
    }

    .heart:nth-of-type(9) {
        left: 90%;
        -webkit-animation-delay: 3s, 1.5s;
        animation-delay: 3s, 1.5s
    }

    /* Demo Purpose Only*/
    .demo {
        font-family: 'Raleway', sans-serif;
        color: #fff;
        display: block;
        margin: 0 auto;
        padding: 15px 0;
        text-align: center;
    }

    .demo a {
        font-family: 'Raleway', sans-serif;
        color: #000;
    }

    .bg-gray {
        background-color: #f0f2f5;
    }

    .fs-0 {
        font-size: 4rem;
    }

    .fs-7 {
        font-size: 0.8rem;
    }

    /* nav button */
    .nav__btn button:hover {
        background: #f0f2f5 !important;
    }

    .nav__btn button:hover i {
        color: #0d6efd !important;
    }

    .nav__btn-active i {
        color: #0d6efd !important;
    }

    .nav__btn-active {
        position: relative;
    }

    .nav__btn-active:before {
        content: "";
        position: absolute;
        bottom: -4.5px;
        left: 0;
        transform: translate(0, 4.5px);
        width: 100%;
        height: 3px;
        border-bottom: 3px solid #0d6efd !important;
    }

    /* dropdown */
    .dropdown-item:active {
        background-color: #d5d5d5 !important;
    }

    /* chat box */
    .modal-content:hover .fa-phone-alt {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-video {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-file-image {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-plus-circle {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-portrait {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-adjust {
        color: #0d6efd !important;
    }

    .modal-content:hover .fa-thumbs-up {
        color: #0d6efd !important;
    }

    /* scrollbar */
    .scrollbar:hover {
        overflow: auto !important;
    }

    /* sponsor */
    .sponsor-icon {
        opacity: 0;
    }

    .dropdown-item:hover .sponsor-icon {
        opacity: 1;
    }

    /* popover */
    .pop-avatar {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 15px;
    }

    .chat-box {
        border: 0 !important;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    /* stories */
    .story:hover {
        opacity: 0.8;
    }

    .pointer {
        cursor: pointer;
    }
</style>
