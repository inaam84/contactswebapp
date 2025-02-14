@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <a href="{{ route('contacts.index') }}" class="govuk-back-link">Back to Contacts List</a>

        <h1 class="govuk-heading-xl">Edit Contact</h1>

        @include('partials.session_flash')

        @include('contacts.form', ['formRoute' => route('contacts.update', $contact->id), 'edit' => true])

    </div>
@endsection
