@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <a href="{{ route('contacts.index') }}" class="govuk-back-link">Back to Contacts List</a>

        <h1 class="govuk-heading-xl">Add Contact</h1>

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

        @include('contacts.form', ['formRoute' => route('contacts.store'), 'edit' => false])
        
    </div>
@endsection
