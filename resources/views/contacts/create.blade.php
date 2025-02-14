@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <a href="{{ route('contacts.index') }}" class="govuk-back-link">Back to Contacts List</a>

        <h1 class="govuk-heading-xl">Add Contact</h1>

        @include('partials.session_flash')

        @include('contacts.form', ['formRoute' => route('contacts.store'), 'edit' => false])
        
    </div>
@endsection
