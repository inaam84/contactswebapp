<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Load GOV.UK styles from public/ -->
    <link rel="stylesheet" href="{{ asset('govuk/all.css') }}">
    
</head>

<body class="govuk-frontend-supported">
    <x-govuk::header
        logoRoute="{{ config('govuk.header.route') }}"
        logoImage="{{ asset(config('govuk.header.logo.asset')) }}"
        logoAlt="{{ config('govuk.header.logo.alt') }}"
        title="My GOV.UK App" />

    <div class="govuk-width-container">
        <main class="govuk-main-wrapper" id="main-content">
            @yield('content')
        </main>
    </div>

    <x-govuk::footer />

    <!-- Load GOV.UK JavaScript as a module -->
    <script type="module" src="{{ asset('govuk/govuk-frontend.min.js') }}"></script>
    <script type="module">
        import { initAll } from "{{ asset('govuk/govuk-frontend.min.js') }}";
        document.addEventListener("DOMContentLoaded", () => {
            initAll();
        });
    </script>

    @stack('page-scripts')
</body>

</html>