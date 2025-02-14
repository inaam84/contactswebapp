@props([
'logoAlt',
'logoHeight' => 30,
'logoWidth' => 148,
'logoImage',
'logoRoute',
])

<header class="govuk-header" data-module="govuk-header">
    <div class="govuk-header__container govuk-width-container">
        <div class="govuk-header__logo">
            <a
                href="{{ route($logoRoute) }}"
                class="govuk-header__link govuk-header__link--homepage">
                <img
                    src="{{ $logoImage }}"
                    alt="{{ $logoAlt }}"
                    class="govuk-header__logotype"
                    height="{{ $logoHeight }}"
                    width="{{ $logoWidth }}" />
            </a>
        </div>
        <div class="govuk-header__content">
            <a href="/" class="govuk-header__link govuk-header__service-name">
                Contacts Web Application
            </a>
        </div>
    </div>
</header>