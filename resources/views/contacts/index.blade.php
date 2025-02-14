@extends('layouts.app')

@section('content')
    <div class="govuk-width-container">
        <h1 class="govuk-heading-l">Contacts List</h1>

        <!-- Success Message -->
        @if(session('alert-success'))
            <div class="govuk-notification-banner govuk-notification-banner--success" role="alert">
                <div class="govuk-notification-banner__content">
                    <p class="govuk-body">{{ session('alert-success') }}</p>
                </div>
            </div>
        @endif

        <a href="{{ route('contacts.create') }}" class="govuk-button">Add New Contact</a>

        <table class="govuk-table">
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th class="govuk-table__header">Forenames</th>
                    <th class="govuk-table__header">Surname</th>
                    <th class="govuk-table__header">Email</th>
                    <th class="govuk-table__header">Phone</th>
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
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="govuk-button govuk-button--warning govuk-button--small" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
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
