<?php

namespace App\Services;

use App\Repositories\ContactRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use RuntimeException;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Get all contacts with pagination.
     */
    public function getAll($perPage = 15, $orderBy = 'forenames')
    {
        return $this->contactRepository
            ->getAll($perPage, $orderBy);
    }

    /**
     * Find a contact by ID.
     */
    public function find($id)
    {
        $contact = $this->contactRepository
            ->find($id);

        if (! $contact) {
            throw new ModelNotFoundException("Contact with ID {$id} not found.");
        }

        return $contact;
    }

    /**
     * Create a new contact.
     */
    public function create(array $data)
    {
        if (empty($data['forenames']) || empty($data['surname']) || empty($data['email'])) {
            throw new InvalidArgumentException('Forenames, surname, and email are required.');
        }

        try {
            return $this->contactRepository
                ->create($data);
        } catch (Exception $e) {
            Log::error('Contact creation failed: '.$e->getMessage());
            throw new RuntimeException('Failed to create contact.');
        }
    }

    /**
     * Update an existing contact.
     */
    public function update($id, array $data)
    {
        if (empty($data['forenames']) || empty($data['surname']) || empty($data['email'])) {
            throw new InvalidArgumentException('Forenames, surname, and email are required.');
        }

        try {
            return $this->contactRepository
                ->update($id, $data);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException("Contact with ID {$id} not found.");
        } catch (Exception $e) {
            Log::error('Contact update failed: '.$e->getMessage());
            throw new RuntimeException('Failed to update contact.');
        }
    }

    /**
     * Delete a contact.
     */
    public function delete($id)
    {
        try {
            return $this->contactRepository
                ->delete($id);
        } catch (Exception $e) {
            Log::error('Contact deletion failed: '.$e->getMessage());
            throw new RuntimeException('Failed to delete contact.');
        }
    }
}
