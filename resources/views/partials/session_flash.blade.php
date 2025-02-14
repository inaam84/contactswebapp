@if ($errors->any())
<div class="govuk-error-summary" role="alert" aria-labelledby="error-summary-title">
    <h2 class="govuk-error-summary__title" id="error-summary-title">
        There is a problem
    </h2>
    <div class="govuk-error-summary__body">
        <ul class="govuk-list govuk-error-summary__list">
            @foreach ($errors->all() as $error)
            <li><a href="#">{{ $error }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@if(session('alert-success'))
<div class="govuk-notification-banner govuk-notification-banner--success" role="alert">
    <div class="govuk-notification-banner__content">
        <p class="govuk-body">{{ session('alert-success') }}</p>
    </div>
</div>
@endif