@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <h1 class="govuk-heading-l">Contacts List (Total: {{ $contacts->total() }})</h1>

        @include('partials.session_flash')

        <a href="{{ route('contacts.create') }}" class="govuk-button">Add New Contact</a>

        <input type="text" id="search" class="govuk-input" placeholder="Search Contacts...">

        <table class="govuk-table" id="contacts-table">
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th class="govuk-table__header">Forenames</th>
                    <th class="govuk-table__header">Surname</th>
                    <th class="govuk-table__header">Email</th>
                    <th class="govuk-table__header">Telephone</th>
                    <th class="govuk-table__header">Actions</th>
                </tr>
            </thead>
            <tbody class="govuk-table__body">
                @foreach($contacts as $contact)
                    <tr class="govuk-table__row">
                        <td class="govuk-table__cell">{{ $contact->forenames }}</td>
                        <td class="govuk-table__cell">{{ $contact->surname }}</td>
                        <td class="govuk-table__cell">{{ $contact->email }}</td>
                        <td class="govuk-table__cell">{{ $contact->telephone }}</td>
                        <td class="govuk-table__cell">
                            <a href="{{ route('contacts.show', $contact->id) }}" class="govuk-button govuk-button--secondary govuk-button--small">Detail</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="govuk-button govuk-button--secondary govuk-button--small">Edit</a>
                            
                            <button class="govuk-button govuk-button--warning delete-contact" data-id="{{ $contact->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="govuk-pagination">
            {{ $contacts->links('vendor.pagination.govuk') }}
        </div>
    </div>
@endsection

@push('page-scripts')
<script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>
@endpush