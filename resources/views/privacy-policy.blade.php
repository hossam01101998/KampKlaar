@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Privacy Policy</h2>
    <p>Last updated: December 2024</p>

    <p>We value your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information.</p>

    <h3>1. Information We Collect</h3>
    <p>We collect various types of personal information when you use our services, including:</p>
    <ul>
        <li><strong>Personal Information:</strong> When you register an account or use our services, we may collect personal information such as your name, email address, and phone number.</li>
        <li><strong>Usage Data:</strong> We may collect information about how you interact with our website or services, such as your IP address, browser type, and device information.</li>
        <li><strong>Cookies:</strong> We use cookies to enhance your experience on our site. You can disable cookies through your browser settings.</li>
    </ul>

    <h3>2. How We Use Your Information</h3>
    <p>We use the information we collect to:</p>
    <ul>
        <li>Provide and improve our services</li>
        <li>Communicate with you about your account or updates to our services</li>
        <li>Personalize your experience</li>
        <li>Analyze usage trends to improve our website and services</li>
    </ul>

    <h3>3. How We Protect Your Information</h3>
    <p>We implement a variety of security measures to ensure the safety of your personal information. These measures include encryption, firewalls, and secure server protocols. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>

    <h3>4. Sharing Your Information</h3>
    <p>We do not sell, trade, or rent your personal information to third parties. We may share your information in the following cases:</p>
    <ul>
        <li><strong>Service Providers:</strong> We may share information with third-party service providers who help us operate our website and services.</li>
        <li><strong>Legal Requirements:</strong> We may disclose your information to comply with applicable laws or legal processes.</li>
    </ul>

    <h3>5. Your Rights</h3>
    <p>You have the right to access, update, and delete your personal information. If you wish to exercise any of these rights, please contact us at the email address provided below.</p>

    <h3>6. Changes to This Policy</h3>
    <p>We may update this Privacy Policy from time to time. When we make significant changes, we will notify you by email or through a notice on our website. The "last updated" date at the top of this page will reflect the most recent revision.</p>

    <h3>7. Contact Us</h3>
    <p>If you have any questions about this Privacy Policy or our data practices, please contact us at:</p>
    <p><strong>Email:</strong> support@kampklaar.com</p>
</div>



<div class="d-flex justify-content-center align-items-center gap-3">
    @guest
        @if (Route::has('login'))
            <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
            </a>
        @endif

        @if (Route::has('register'))
            <a class="btn btn-outline-success btn-lg" href="{{ route('register') }}">
                <i class="bi bi-person-plus"></i> {{ __('Register') }}
            </a>
        @endif
    @else
        <a class="btn btn-outline-danger btn-lg" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endguest
</div>




@endsection
