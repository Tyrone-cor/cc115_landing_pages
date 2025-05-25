<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKSU Student Projects Showcase | Information Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary-color: #0056b3; /* SKSU blue */
            --secondary-color: #f8f9fc;
            --accent-color: #ef476f;
            --text-color: #2b2d42;
            --light-gray: #f8f9fc;
            --dark-gray: #2b2d42;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --info-color: #118ab2;
            --transition-speed: 0.3s;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all var(--transition-speed);
            padding: 0.5rem 0; /* Reduced from 1rem to 0.5rem */
        }
        
        .navbar.scrolled {
            padding: 0.3rem 0; /* Reduced from 0.5rem to 0.3rem */
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            transition: transform var(--transition-speed);
            font-size: 1.1rem; /* Slightly smaller font size */
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
        .nav-link {
            font-weight: 500;
            position: relative;
            padding: 0.4rem 0.8rem; /* Reduced from 0.5rem 1rem */
            margin: 0 0.25rem;
            transition: color var(--transition-speed);
            font-size: 0.95rem; /* Slightly smaller font size */
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all var(--transition-speed);
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 80%;
        }
        
        .hero-section {
            position: relative;
            padding: 8rem 0 5rem;
            background: var(--primary-color);
            color: white;
            overflow: hidden;
            background-image: url('<?= base_url('/public/assets/images/hero-bg.png') ?>');
            background-size: cover;
            background-position: center;
        }

        /* Keep the overlay for better text readability */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(100px); /* Add blur effect */
            -webkit-backdrop-filter: blur(100px); /* For Safari support */
            opacity: 0.7;
        }
        
        .hero-title, .hero-subtitle, .university-badge, .hero-logos {
            position: relative;
            z-index: 5; /* Ensures these elements appear above the blurred overlay */
        }

        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            animation: fadeInUp 1s ease-out 0.2s;
            animation-fill-mode: both;
        }

        .university-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(143, 193, 248, 0.2);
            color: yellow;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            font-size: 0.9rem;
            font-weight: 500;
            animation: fadeInUp 1s ease-out 0.3s;
            animation-fill-mode: both;
        }

        .hero-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 0.4s;
            animation-fill-mode: both;
        }
        
        .section-title {
            font-weight: 700;
            color: var(--dark-gray);
            margin-bottom: 2.5rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
            transition: width var(--transition-speed);
        }
        
        .section-title:hover::after {
            width: 100%;
        }
        
        .project-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform var(--transition-speed), box-shadow var(--transition-speed);
            height: 100%;
            position: relative;
            background-color: white;
        }
        
        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform var(--transition-speed);
        }
        
        .project-card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-title {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            transition: color var(--transition-speed);
        }
        
        .project-card:hover .card-title {
            color: #3a0ca3;
        }
        
        .card-text {
            color: var(--text-color);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        
        .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }
        
        .btn {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all var(--transition-speed);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.5s;
            z-index: -1;
        }
        
        .btn:hover::before {
            width: 100%;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #3a0ca3;
            border-color: #3a0ca3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-outline-secondary {
            color: var(--dark-gray);
            border-color: var(--dark-gray);
        }
        
        .btn-outline-secondary:hover {
            background-color: var(--dark-gray);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(43, 45, 66, 0.2);
        }
        
        .btn-outline-warning {
            color: var(--warning-color);
            border-color: var(--warning-color);
        }
        
        .btn-outline-warning:hover {
            background-color: var(--warning-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 209, 102, 0.3);
        }
        
        .btn-outline-danger {
            color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-outline-danger:hover {
            background-color: var(--accent-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 71, 111, 0.3);
        }
        
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.85rem;
        }
        
        .admin-controls {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }
        
        .admin-controls .btn {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-speed);
        }
        
        .admin-controls .btn:hover {
            transform: translateY(-5px) rotate(90deg);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }
        
        .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }
        
        .modal-header .btn-close {
            color: white;
            filter: brightness(0) invert(1);
            opacity: 0.8;
            transition: opacity var(--transition-speed);
        }
        
        .modal-header .btn-close:hover {
            opacity: 1;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .modal-footer {
            border-top: none;
            padding: 1.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all var(--transition-speed);
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            border-color: var(--primary-color);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
        }
        
        .list-group-item {
            padding: 1rem 1.25rem;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: background-color var(--transition-speed);
        }
        
        .list-group-item:last-child {
            border-bottom: none;
        }
        
        .list-group-item:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        #about {
            position: relative;
            overflow: hidden;
        }
        
        #about::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: var(--primary-color);
            opacity: 0.05;
            border-radius: 50%;
            transform: translate(100px, -100px);
            z-index: -1;
        }
        
        #about::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200px;
            height: 200px;
            background: var(--accent-color);
            opacity: 0.05;
            border-radius: 50%;
            transform: translate(-50px, 50px);
            z-index: -1;
        }
        
        footer {
            background-color: white;
            padding: 4rem 0 2rem;
            margin-top: 5rem;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.05);
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color), var(--warning-color), var(--info-color));
        }
        
        .footer-link {
            color: var(--text-color);
            text-decoration: none;
            transition: color var(--transition-speed);
            position: relative;
            display: inline-block;
            margin-left: 1rem;
        }
        
        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: var(--primary-color);
            transition: width var(--transition-speed);
        }
        
        .footer-link:hover {
            color: var(--primary-color);
        }
        
        .footer-link:hover::after {
            width: 100%;
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        
        .fade-in-left {
            animation: fadeInLeft 1s ease-out;
        }
        
        .fade-in-right {
            animation: fadeInRight 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInLeft {
            from { 
                opacity: 0;
                transform: translateX(-30px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from { 
                opacity: 0;
                transform: translateX(30px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-section {
                padding: 6rem 0 4rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-section {
                padding: 5rem 0 3rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
        }

        /* Add this new media query for extra small devices */
        @media (max-width: 376px) {
            .hero-title {
                font-size: 1.80rem; /* Even smaller font size for very small screens */
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .hero-section {
                padding: 4.5rem 0 2.5rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .navbar-brand {
                font-size: 1.0rem; /* Smaller brand text */
            }
            
            .navbar-logo {
                height: 30px; /* Smaller logo */
            }
            
            .hero-logo {
                height: 60px; /* Smaller hero logos */
            }
        }
        
        /* Scroll reveal animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Team member badges */
        .team-badge {
            display: inline-block;
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            border-radius: 50px;
            padding: 0.35rem 0.85rem;
            margin: 0.25rem;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all var(--transition-speed);
        }
        
        .team-badge:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Loading spinner */
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s;
        }
        
        .spinner-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(67, 97, 238, 0.2);
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        .spinner-text {
            margin-top: 1rem;
            color: var(--primary-color);
            font-weight: 500;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Toast notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        
        .toast {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease-out;
        }
        
        .toast.show {
            opacity: 1;
            transform: translateX(0);
        }
        
        .toast-header {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .toast-body {
            padding: 0.75rem 1rem;
        }
        
        .toast-success .toast-header {
            background-color: var(--success-color);
            color: white;
        }
        
        .toast-error .toast-header {
            background-color: var(--accent-color);
            color: white;
        }
        
        /* Add SKSU branding colors */
        :root {
            --primary-color: #0056b3; /* SKSU blue */
            --secondary-color: #f8f9fc;
            --accent-color: #ef476f;
            --text-color: #2b2d42;
            --light-gray: #f8f9fc;
            --dark-gray: #2b2d42;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --info-color: #118ab2;
            --transition-speed: 0.3s;
        }
        
        /* Add university badge style */
        .university-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(143, 193, 248, 0.1);
            color: yellow;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .university-badge i {
            margin-right: 0.5rem;
        }
        
        .course-info {
            background-color: rgba(0, 86, 179, 0.05);
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .course-info h6 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        
        .course-info p {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        /* Logo styles */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-logo {
            height: 35px; /* Reduced from 40px */
            width: auto;
            transition: transform var(--transition-speed);
        }
        
        .navbar-brand:hover .navbar-logo {
            transform: translateY(-2px);
        }
        
        .hero-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 2rem;
        }
        
        .hero-logo {
            height: 80px;
            width: auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed);
        }
        
        .hero-logo:hover {
            transform: translateY(-5px);
        }
        
        .footer-logos {
            display: flex;
            gap: 20px;
            margin-bottom: 1.5rem;
        }
        
        .footer-logo {
            height: 50px;
            width: auto;
        }
        
        .read-more-link, .read-less-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin-left: 5px;
            transition: color var(--transition-speed);
        }
        
        .read-more-link:hover, .read-less-link:hover {
            color: #3a0ca3;
            text-decoration: underline;
        }
        
        .description-full {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .class-section-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(58, 12, 163, 0.1);
            color: #3a0ca3;
            border-radius: 50px;
            padding: 0.3rem 0.8rem;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .class-section-badge i {
            margin-right: 0.3rem;
        }
        
        #search {
            margin-top: 2rem; /* Increased top padding to move search bar down */
            padding-bottom: 1.5rem;
        }

        .search-container {
            margin-bottom: 1.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-container .input-group {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            overflow: hidden;
        }

        .search-container .input-group-text {
            background-color: white;
            border-right: none;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .search-container .form-control {
            border-left: none;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            padding-left: 0;
        }

        .search-container .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .filter-buttons {
            margin-bottom: 1rem;
        }

        .btn-filter {
            background-color: var(--secondary-color);
            color: var(--text-color);
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            padding: 0.4rem 1.2rem;
        }

        .btn-filter:hover {
            background-color: #e9ecef;
        }

        .btn-filter.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Pagination styling */
        .pagination {
            margin-top: 2rem;
        }
        
        .pagination .page-item .page-link {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background-color: white;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .pagination .page-item .page-link:hover {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }
        
        .pagination .page-item .page-link:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.25);
        }
        
        /* Add responsive adjustments */
        @media (max-width: 576px) {
            .pagination .page-item .page-link {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Spinner -->
    <div class="spinner-overlay" id="loadingSpinner">
        <div class="spinner-container">
            <div class="spinner"></div>
            <div class="spinner-text">Loading...</div>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- SKSU Logo - Replace with actual logo path -->
                <img src="<?= base_url('/public/assets/images/sksu-logo.png') ?>" alt="SKSU Logo" class="navbar-logo">
                SKSU Student Projects
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#course-info">Course Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="hero-title">SKSU Student Projects Showcase</h1>
            <p class="hero-subtitle">Discover innovative Information Management projects created by BSIS students at Sultan Kudarat State University, Isulan Campus.</p>
            <div class="university-badge">
                <i class="bi bi-building"></i> Sultan Kudarat State University
            </div>
            
            <!-- University and College Logos -->
            <div class="hero-logos">
                <!-- SKSU Logo - Replace with actual logo path -->
                <img src="<?= base_url('/public/assets/images/sksu-logo.png') ?>" alt="SKSU Logo" class="hero-logo">
                
                <!-- College of Computer Studies Logo - Replace with actual logo path -->
                <img src="<?= base_url('/public/assets/images/ccs-logo.png') ?>" alt="College of Computer Studies Logo" class="hero-logo">
            </div>
        </div>
    </section>

    <!-- Add search bar and filter buttons above projects section -->
    <section id="search" class="py-3">
        <div class="container">
            <div class="search-container">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="projectSearch" class="form-control" placeholder="Search projects by title, team members, or class section...">
                </div>
            </div>
            
            <div class="filter-buttons text-center mt-3">
                <div class="btn-group" role="group" aria-label="Filter by class section">
                    <button type="button" class="btn btn-filter active" data-filter="all">All</button>
                    <button type="button" class="btn btn-filter" data-filter="BSIS 2A">BSIS 2A</button>
                    <button type="button" class="btn btn-filter" data-filter="BSIS 2B">BSIS 2B</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Featured Projects</h2>
            
            <div class="row g-4" id="projectsContainer">
                <?php if (empty($projects)): ?>
                    <div class="col-12 text-center">
                        <p>No projects available yet. Be the first to add one!</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($projects as $project): ?>
                        <div class="col-md-6 col-lg-4 reveal">
                            <div class="project-card">
                                <img src="<?= base_url($project['image_path']) ?>" class="card-img-top" alt="<?= $project['title'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $project['title'] ?></h5>
                                    <?php if (!empty($project['class_section'])): ?>
                                        <div class="class-section-badge mb-2">
                                            <i class="bi bi-people-fill me-1"></i> <?= $project['class_section'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <p class="card-text">
                                        <span class="description-short"><?= substr($project['description'], 0, 120) . (strlen($project['description']) > 120 ? '...' : '') ?></span>
                                        <span class="description-full" style="display: none;"><?= $project['description'] ?></span>
                                        <?php if (strlen($project['description']) > 120): ?>
                                            <a href="#" class="read-more-link">Read more</a>
                                            <a href="#" class="read-less-link" style="display: none;">Show less</a>
                                        <?php endif; ?>
                                    </p>
                                    <div class="d-flex flex-wrap mb-3">
                                        <?php 
                                        $teamMembers = explode("\n", $project['team_members']);
                                        foreach ($teamMembers as $member): 
                                            if (trim($member) !== ''):
                                        ?>
                                            <span class="team-badge"><?= trim($member) ?></span>
                                        <?php 
                                            endif;
                                        endforeach; 
                                        ?>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <a href="<?= $project['url'] ?>" class="btn btn-primary btn-sm" target="_blank">
                                        <i class="bi bi-link-45deg me-1"></i> View Project
                                    </a>
                                    <div class="admin-buttons d-none">
                                        <button class="btn btn-outline-warning btn-sm me-1" onclick="openEditModal(<?= $project['id'] ?>)">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete(<?= $project['id'] ?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Pagination Controls -->
            <div class="pagination-container mt-5">
                <?= $pager->links('projects', 'project_pager') ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 reveal fade-in-left">
                    <h2 class="section-title">About This Showcase</h2>
                    <p>This platform highlights exceptional work from BSIS students in the Information Management course at Sultan Kudarat State University. These projects demonstrate students' understanding of database design, information systems, and data management principles.</p>
                    <p>Each project featured here represents hours of dedication, problem-solving, and collaboration. We invite you to explore these projects, learn from them, and perhaps even reach out to the creators for collaboration opportunities.</p>
                </div>
                <div class="col-lg-6 reveal fade-in-right">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="mb-3">Want to submit your project?</h5>
                            <p>If you're a BSIS student at SKSU with a project you'd like to showcase, please contact Dr. Alexis Apresto to have your work featured on this platform.</p>
                            <button class="btn btn-primary" onclick="openAdminModal()">
                                <i class="bi bi-shield-lock me-2"></i> Admin Access
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Information Section (New) -->
    <section id="course-info" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Course Information</h2>
            <div class="row">
                <div class="col-md-6 reveal fade-in-left">
                    <div class="course-info">
                        <h6><i class="bi bi-book me-2"></i>Course Details</h6>
                        <p><strong>Course Code:</strong> CC115</p>
                        <p><strong>Course Title:</strong> Information Management</p>
                        <p><strong>Program:</strong> Bachelor of Science in Information Systems</p>
                        <p><strong>Class Sections:</strong> BSIS 2A and BSIS 2B</p>
                        <p><strong>Instructor:</strong> Dr. Alexis Apresto, PhD</p>
                    </div>
                </div>
                <div class="col-md-6 reveal fade-in-right">
                    <div class="course-info">
                        <h6><i class="bi bi-geo-alt me-2"></i>University Information</h6>
                        <p><strong>School:</strong> Sultan Kudarat State University (SKSU)</p>
                        <p><strong>Campus:</strong> Isulan Campus</p>
                        <p><strong>Organization:</strong> College of Computer Studies</p>
                        <p><strong>Location:</strong> Isulan, Sultan Kudarat</p>
                        <p><strong>Website:</strong> <a href="https://sksu.edu.ph" target="_blank">sksu.edu.ph</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Add logos to footer -->
                    <div class="footer-logos">
                        <img src="<?= base_url('/public/assets/images/sksu-logo.png') ?>" alt="SKSU Logo" class="footer-logo">
                        <img src="<?= base_url('/public/assets/images/ccs-logo.png') ?>" alt="College of Computer Studies Logo" class="footer-logo">
                    </div>
                    <h5>SKSU Student Projects Showcase</h5>
                    <p>A platform to celebrate student innovation and creativity at Sultan Kudarat State University.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>
                        <a href="#" class="footer-link">Privacy Policy</a>
                        <a href="#" class="footer-link">Terms of Use</a>
                        <a href="#" class="footer-link">Contact</a>
                    </p>
                    <p class="mt-3">© <?= date('Y') ?> SKSU BSIS Program. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Admin Controls -->
    <div class="admin-controls d-none" id="adminControls">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">
            <i class="bi bi-plus-lg"></i>
        </button>
    </div>

    <!-- Admin Login Modal -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Admin Access</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adminForm">
                        <div class="mb-3">
                            <label for="adminCode" class="form-label">Admin Code</label>
                            <input type="password" class="form-control" id="adminCode" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="verifyAdmin()">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProjectForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="projectTitle" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="projectDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="projectDescription" name="projectDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="classSection" class="form-label">Class Section</label>
                            <select class="form-select" id="classSection" name="classSection" required>
                                <option value="" selected disabled>Select class section</option>
                                <option value="BSIS 2A">BSIS 2A</option>
                                <option value="BSIS 2B">BSIS 2B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="projectThumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" class="form-control" id="projectThumbnail" name="projectThumbnail" accept="image/*" required>
                            <div class="form-text">Recommended size: 800x600 pixels</div>
                        </div>
                        <div class="mb-3">
                            <label for="projectURL" class="form-label">Project URL</label>
                            <input type="url" class="form-control" id="projectURL" name="projectURL" required>
                            <div class="form-text">Example: https://example.com</div>
                        </div>
                        <div class="mb-3">
                            <label for="teamMembers" class="form-label">Team Members (one per line)</label>
                            <textarea class="form-control" id="teamMembers" name="teamMembers" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addProject()">
                        <i class="bi bi-plus-circle me-1"></i> Add Project
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Project Modal -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProjectForm" enctype="multipart/form-data">
                        <input type="hidden" id="editProjectId" name="projectId">
                        <div class="mb-3">
                            <label for="editProjectTitle" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="editProjectTitle" name="projectTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProjectDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProjectDescription" name="projectDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editClassSection" class="form-label">Class Section</label>
                            <select class="form-select" id="editClassSection" name="classSection" required>
                                <option value="" disabled>Select class section</option>
                                <option value="BSIS 2A">BSIS 2A</option>
                                <option value="BSIS 2B">BSIS 2B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editProjectThumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" class="form-control" id="editProjectThumbnail" name="projectThumbnail" accept="image/*">
                            <div class="form-text">Leave empty to keep current image</div>
                            <div class="mt-2" id="currentThumbnail"></div>
                        </div>
                        <div class="mb-3">
                            <label for="editProjectURL" class="form-label">Project URL</label>
                            <input type="url" class="form-control" id="editProjectURL" name="projectURL" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTeamMembers" class="form-label">Team Members (one per line)</label>
                            <textarea class="form-control" id="editTeamMembers" name="teamMembers" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateProject()">
                        <i class="bi bi-check-circle me-1"></i> Update Project
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this project? This action cannot be undone.</p>
                    <input type="hidden" id="deleteProjectId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="deleteProject()">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hide loading spinner when page is loaded
        window.addEventListener('load', function() {
            setTimeout(function() {
                const spinner = document.getElementById('loadingSpinner');
                spinner.style.opacity = '0';
                setTimeout(function() {
                    spinner.style.display = 'none';
                }, 500);
            }, 500);
            
            // Initialize scroll reveal
            initScrollReveal();
            
            // Initialize navbar scroll effect
            initNavbarScroll();
        });
        
        // Scroll reveal initialization
        function initScrollReveal() {
            const revealElements = document.querySelectorAll('.reveal');
            
            function checkReveal() {
                const windowHeight = window.innerHeight;
                const revealPoint = 150;
                
                revealElements.forEach(element => {
                    const revealTop = element.getBoundingClientRect().top;
                    
                    if (revealTop < windowHeight - revealPoint) {
                        element.classList.add('active');
                    }
                });
            }
            
            window.addEventListener('scroll', checkReveal);
            checkReveal(); // Check on load
        }
        
        // Navbar scroll effect
        function initNavbarScroll() {
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        }
        
        // Admin functionality
        function openAdminModal() {
            const adminModal = new bootstrap.Modal(document.getElementById('adminModal'));
            adminModal.show();
        }
        
        function verifyAdmin() {
            const adminCode = document.getElementById('adminCode').value;
            
            // Send the code to the server for verification
            fetch('<?= base_url('admin/verify') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: 'code=' + encodeURIComponent(adminCode)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show admin controls
                    document.getElementById('adminControls').classList.remove('d-none');
                    
                    // Show edit/delete buttons
                    const adminButtons = document.querySelectorAll('.admin-buttons');
                    adminButtons.forEach(button => {
                        button.classList.remove('d-none');
                    });
                    
                    // Close modal
                    const adminModal = bootstrap.Modal.getInstance(document.getElementById('adminModal'));
                    adminModal.hide();
                    
                    // Show success toast
                    showToast('Success', 'Admin access granted', 'success');
                } else {
                    // Show error toast
                    showToast('Error', 'Invalid admin code', 'error');
                }
            })
            .catch(error => {
                console.error('Admin verification error:', error);
                showToast('Error', 'An error occurred during verification', 'error');
            });
        }
        
        // Project CRUD operations
        function addProject() {
            const form = document.getElementById('addProjectForm');
            const formData = new FormData(form);
            
            // Show loading spinner
            document.getElementById('loadingSpinner').classList.add('show');
            
            // Send data to server
            fetch('<?= base_url('admin/addProject') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('addProjectModal'));
                modal.hide();
                
                if (data.success) {
                    // Show success toast
                    showToast('Success', 'Project added successfully', 'success');
                    // Reload page to show new project
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    // Show error toast
                    showToast('Error', data.message || 'Failed to add project', 'error');
                }
            })
            .catch(error => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                showToast('Error', 'An error occurred while adding the project', 'error');
                console.error('Error:', error);
            });
        }
        
        function openEditModal(projectId) {
            // Show loading spinner
            document.getElementById('loadingSpinner').classList.add('show');
            
            // Fetch project data from server
            fetch(`<?= base_url('admin/projects') ?>/${projectId}`)
                .then(response => response.json())
                .then(data => {
                    // Hide loading spinner
                    document.getElementById('loadingSpinner').classList.remove('show');
                    
                    if (data.success) {
                        const project = data.project;
                        
                        // Populate form fields
                        document.getElementById('editProjectId').value = project.id;
                        document.getElementById('editProjectTitle').value = project.title;
                        document.getElementById('editProjectDescription').value = project.description;
                        document.getElementById('editProjectURL').value = project.url;
                        document.getElementById('editTeamMembers').value = project.teamMembers.join('\n');
                        
                        // Set class section if it exists
                        const classSection = document.getElementById('editClassSection');
                        if (classSection && project.class_section) {
                            classSection.value = project.class_section;
                        }
                        
                        // Show current thumbnail
                        const thumbnailPreview = document.getElementById('editThumbnailPreview');
                        if (thumbnailPreview) {
                            thumbnailPreview.src = project.imagePath;
                            thumbnailPreview.style.display = 'block';
                        }
                        
                        // Open modal
                        const modal = new bootstrap.Modal(document.getElementById('editProjectModal'));
                        modal.show();
                    } else {
                        showToast('Error', data.message || 'Failed to load project data', 'error');
                    }
                })
                .catch(error => {
                    // Hide loading spinner
                    document.getElementById('loadingSpinner').classList.remove('show');
                    showToast('Error', 'An error occurred while loading project data', 'error');
                    console.error('Error:', error);
                });
        }
        
        function updateProject() {
            const form = document.getElementById('editProjectForm');
            const formData = new FormData(form);
            
            // Show loading spinner
            document.getElementById('loadingSpinner').classList.add('show');
            
            // Send data to server
            fetch('<?= base_url('admin/updateProject') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('editProjectModal'));
                modal.hide();
                
                if (data.success) {
                    // Show success toast
                    showToast('Success', 'Project updated successfully', 'success');
                    // Reload page to show updated project
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    // Show error toast
                    showToast('Error', data.message || 'Failed to update project', 'error');
                    console.error('Update errors:', data.errors);
                }
            })
            .catch(error => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                showToast('Error', 'An error occurred while updating the project', 'error');
                console.error('Error:', error);
            });
        }
        
        function confirmDelete(projectId) {
            document.getElementById('deleteProjectId').value = projectId;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            deleteModal.show();
        }
        
        function deleteProject() {
            const projectId = document.getElementById('deleteProjectId').value;
            
            // Show loading spinner
            document.getElementById('loadingSpinner').classList.add('show');
            
            // Create form data
            const formData = new FormData();
            formData.append('projectId', projectId);
            
            // Send delete request to server
            fetch('<?= base_url('admin/deleteProject') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
                modal.hide();
                
                if (data.success) {
                    // Show success toast
                    showToast('Success', 'Project deleted successfully', 'success');
                    // Reload page to update project list
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    // Show error toast
                    showToast('Error', data.message || 'Failed to delete project', 'error');
                }
            })
            .catch(error => {
                // Hide loading spinner
                document.getElementById('loadingSpinner').classList.remove('show');
                showToast('Error', 'An error occurred while deleting the project', 'error');
                console.error('Error:', error);
            });
        }
        
        // Utility functions
        function showToast(title, message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            
            const toastId = 'toast-' + Date.now();
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.id = toastId;
            
            toast.innerHTML = `
                <div class="toast-header">
                    <strong class="me-auto">${title}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            `;
            
            toastContainer.appendChild(toast);
            
            // Show the toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 5000);
        }
        
        function simulateLoading() {
            // Show loading spinner
            const spinner = document.getElementById('loadingSpinner');
            spinner.style.display = 'flex';
            spinner.style.opacity = '1';
            
            // Simulate page reload
            setTimeout(() => {
                spinner.style.opacity = '0';
                setTimeout(() => {
                    spinner.style.display = 'none';
                    // In a real application, you would reload the page or update the content
                }, 500);
            }, 1000);
        }
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href').startsWith('#')) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Update active link
                        document.querySelectorAll('a.nav-link').forEach(navLink => {
                            navLink.classList.remove('active');
                        });
                        this.classList.add('active');
                    }
                }
            });
        });
        
        // Update active nav link on scroll
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            
            document.querySelectorAll('section').forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionBottom = sectionTop + section.offsetHeight;
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    const currentId = section.getAttribute('id');
                    document.querySelectorAll('a.nav-link').forEach(navLink => {
                        navLink.classList.remove('active');
                        if (navLink.getAttribute('href') === '#' + currentId) {
                            navLink.classList.add('active');
                        }
                    });
                }
            });
        });
        
        // Add this function to handle missing logo images
        document.addEventListener('DOMContentLoaded', function() {
            const logoImages = document.querySelectorAll('.navbar-logo, .hero-logo, .footer-logo');
            
            logoImages.forEach(img => {
                img.onerror = function() {
                    // If image fails to load, replace with a placeholder or icon
                    if (img.alt.includes('SKSU')) {
                        this.src = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCI+PHJlY3Qgd2lkdGg9IjEwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9IiMwMDU2YjMiLz48dGV4dCB4PSI1MCIgeT0iNTAiIGZvbnQtc2l6ZT0iMjAiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGFsaWdubWVudC1iYXNlbGluZT0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSI+U0tTVTwvdGV4dD48L3N2Zz4=';
                    } else {
                        this.src = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCI+PHJlY3Qgd2lkdGg9IjEwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9IiMzYTBjYTMiLz48dGV4dCB4PSI1MCIgeT0iNTAiIGZvbnQtc2l6ZT0iMTYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGFsaWdubWVudC1iYXNlbGluZT0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSI+Q0NTPC90ZXh0Pjwvc3ZnPg==';
                    }
                };
            });
        });
        
        // Read More functionality
        function initReadMore() {
            document.querySelectorAll('.read-more-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const cardBody = this.closest('.card-body');
                    const shortDesc = cardBody.querySelector('.description-short');
                    const fullDesc = cardBody.querySelector('.description-full');
                    const readLessLink = cardBody.querySelector('.read-less-link');
                    
                    // Hide short description and show full description
                    shortDesc.style.display = 'none';
                    fullDesc.style.display = 'inline';
                    
                    // Hide Read More link and show Show Less link
                    this.style.display = 'none';
                    readLessLink.style.display = 'inline-block';
                });
            });
            
            document.querySelectorAll('.read-less-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const cardBody = this.closest('.card-body');
                    const shortDesc = cardBody.querySelector('.description-short');
                    const fullDesc = cardBody.querySelector('.description-full');
                    const readMoreLink = cardBody.querySelector('.read-more-link');
                    
                    // Show short description and hide full description
                    shortDesc.style.display = 'inline';
                    fullDesc.style.display = 'none';
                    
                    // Show Read More link and hide Show Less link
                    readMoreLink.style.display = 'inline-block';
                    this.style.display = 'none';
                });
            });
        }
        
        function initFilterButtons() {
            const filterButtons = document.querySelectorAll('.btn-filter');
            if (!filterButtons.length) return;
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    const projectCards = document.querySelectorAll('.project-card');
                    let resultsFound = false;
                    
                    projectCards.forEach(card => {
                        const projectContainer = card.closest('.col-md-6');
                        const classSection = card.querySelector('.class-section-badge') 
                            ? card.querySelector('.class-section-badge').textContent.trim() 
                            : '';
                        
                        // Apply filter
                        if (filterValue === 'all' || classSection.includes(filterValue)) {
                            projectContainer.style.display = '';
                            resultsFound = true;
                        } else {
                            projectContainer.style.display = 'none';
                        }
                    });
                    
                    // Show "no results" message if needed
                    const noResultsMessage = document.getElementById('noFilterResults');
                    if (!resultsFound) {
                        if (!noResultsMessage) {
                            const message = document.createElement('div');
                            message.id = 'noFilterResults';
                            message.className = 'col-12 text-center py-4';
                            message.innerHTML = `<p>No projects found for ${filterValue} class section.</p>`;
                            document.getElementById('projectsContainer').appendChild(message);
                        }
                    } else if (noResultsMessage) {
                        noResultsMessage.remove();
                    }
                    
                    // Also apply the current search term if there is one
                    const searchInput = document.getElementById('projectSearch');
                    if (searchInput && searchInput.value.trim() !== '') {
                        // Trigger the search event to filter with both criteria
                        searchInput.dispatchEvent(new Event('input'));
                    }
                });
            });
        }

        function initSearchFeature() {
            const searchInput = document.getElementById('projectSearch');
            const filterButtons = document.querySelectorAll('.btn-filter');
            if (!searchInput) return;
            
            // Debounce function to prevent too many requests
            let searchTimeout;
            
            // Function to perform the search
            function performSearch() {
                // Show loading spinner
                document.getElementById('loadingSpinner').classList.add('show');
                
                const searchTerm = searchInput.value.trim();
                const activeFilter = document.querySelector('.btn-filter.active');
                const filterValue = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
                
                // Build the URL with search parameters
                const searchUrl = `<?= base_url('home/search') ?>?term=${encodeURIComponent(searchTerm)}&filter=${encodeURIComponent(filterValue)}`;
                
                // Fetch results from server
                fetch(searchUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Update projects container with new results
                        const projectsContainer = document.getElementById('projectsContainer');
                        
                        // Check if we have results
                        if (data.projects && data.projects.length > 0) {
                            // Build HTML for projects
                            let projectsHTML = '';
                            data.projects.forEach(project => {
                                projectsHTML += `
                                    <div class="col-md-6 col-lg-4 reveal active">
                                        <div class="project-card">
                                            <img src="${project.image_path}" class="card-img-top" alt="${project.title}">
                                            <div class="card-body">
                                                <h5 class="card-title">${project.title}</h5>
                                                ${project.class_section ? `<div class="class-section-badge mb-2">
                                                    <i class="bi bi-people-fill me-1"></i> ${project.class_section}
                                                </div>` : ''}
                                                <p class="card-text">
                                                    <span class="description-short">${project.description.substring(0, 100)}${project.description.length > 100 ? '...' : ''}</span>
                                                    <span class="description-full" style="display: none;">${project.description}</span>
                                                    ${project.description.length > 100 ? '<a href="#" class="read-more-link">Read More</a>' : ''}
                                                    <a href="#" class="read-less-link" style="display: none;">Show Less</a>
                                                </p>
                                                <a href="${project.url}" class="btn btn-primary btn-sm" target="_blank">
                                                    <i class="bi bi-link-45deg me-1"></i> View Project
                                                </a>
                                                <div class="admin-buttons d-none">
                                                    <button class="btn btn-outline-warning btn-sm me-1" onclick="openEditModal(${project.id})">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete(${project.id})">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            
                            projectsContainer.innerHTML = projectsHTML;
                            
                            // Hide pagination during search
                            const paginationContainer = document.querySelector('.pagination-container');
                            if (paginationContainer) {
                                paginationContainer.style.display = 'none';
                            }
                            
                            // Re-initialize read more functionality
                            initReadMore();
                        } else {
                            // No results found
                            projectsContainer.innerHTML = `
                                <div class="col-12 text-center py-4">
                                    <p>No projects match your search criteria.</p>
                                </div>
                            `;
                            
                            // Hide pagination
                            const paginationContainer = document.querySelector('.pagination-container');
                            if (paginationContainer) {
                                paginationContainer.style.display = 'none';
                            }
                        }
                        
                        // Hide loading spinner
                        document.getElementById('loadingSpinner').classList.remove('show');
                    })
                    .catch(error => {
                        console.error('Search error:', error);
                        // Hide loading spinner
                        document.getElementById('loadingSpinner').classList.remove('show');
                        showToast('Error', 'An error occurred while searching projects', 'error');
                    });
            }
            
            // Add event listener for search input
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 500); // 500ms debounce
            });
            
            // Update filter buttons to use AJAX search
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Perform search with current filter
                    performSearch();
                });
            });
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Read More functionality
            initReadMore();
            
            // Initialize filter buttons
            initFilterButtons();
            
            // Initialize search feature
            initSearchFeature();
            
            // Add all your existing JavaScript functions here
        });
    </script>
</body>
</html>










