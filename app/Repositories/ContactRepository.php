<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get all contacts, optionally paginated.
     */
    public function getAll($perPage = 15)
    {
        return $this->contact
            ->paginate($perPage);
    }

    /**
     * Find a contact by ID or return null.
     */
    public function find($id)
    {
        return $this->contact
            ->find($id);
    }

    /**
     * Create a new contact.
     */
    public function create(array $data)
    {
        return $this->contact
            ->create($data);
    }

    /**
     * Update an existing contact by ID.
     */
    public function update($id, array $data)
    {
        $contact = $this->contact
            ->findOrFail($id);
        $contact->update($data);

        return $contact;
    }

    /**
     * Delete a contact by ID.
     */
    public function delete($id)
    {
        $deleted = $this->contact
            ->destroy($id);

        return $deleted > 0;
    }
}
