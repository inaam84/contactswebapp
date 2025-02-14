@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <a href="{{ route('contacts.index') }}" class="govuk-back-link">Back to Contacts List</a>

        <h1 class="govuk-heading-xl">Contact Details</h1>

        @include('partials.session_flash')

        <dl class="govuk-summary-list">
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Forenames</dt>
                <dd class="govuk-summary-list__value">{{ $contact->forenames }}</dd>
            </div>

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Surname</dt>
                <dd class="govuk-summary-list__value">{{ $contact->surname }}</dd>
            </div>

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Email</dt>
                <dd class="govuk-summary-list__value">{{ $contact->email }}</dd>
            </div>

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Telephone</dt>
                <dd class="govuk-summary-list__value">{{ $contact->telephone }}</dd>
            </div>

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Mobile</dt>
                <dd class="govuk-summary-list__value">{{ $contact->mobile }}</dd>
            </div>

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">Address</dt>
                <dd class="govuk-summary-list__value">
                    {{ $contact->address_line_1 }}<br>
                    {{ $contact->address_line_2 }}<br>
                    {{ $contact->address_line_3 }}<br>
                    {{ $contact->address_line_4 }}<br>
                    {{ $contact->postcode }}<br>
                </dd>
            </div>
        </dl>

        <a href="{{ route('contacts.edit', $contact->id) }}" class="govuk-button govuk-button--secondary">
            Edit Contact
        </a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="govuk-button govuk-button--warning govuk-button--small" onclick="return confirm('Are you sure?');">Delete Contact</button>
        </form>
    </div>
@endsection
