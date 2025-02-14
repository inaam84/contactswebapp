<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;
use RuntimeException;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(): JsonResponse
    {
        try {
            $contacts = $this->contactService
                ->getAll(15);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to get contacts.',
            ], 500);
        }

        return response()->json($contacts);
    }

    public function store(StoreContactRequest $request): JsonResponse
    {
        try {
            $contact = $this->contactService
                ->create($request->all());
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        } catch (RuntimeException $e) {
            return response()->json([
                'message' => 'An error occurred while creating the contact.',
            ], 500);
        }

        return response()->json($contact, 201);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $contact = $this->contactService
                ->find($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Record not found.',
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the contact.',
            ], 500);
        }

        return response()->json($contact);
    }

    public function update(StoreContactRequest $request, int $id): JsonResponse
    {
        try {
            $contact = $this->contactService
                ->find($id);

            $contact = $this->contactService
                ->update($contact->id, $request->validated());
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Record not found.',
            ], 404);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the contact.',
            ], 500);
        }

        return response()->json($contact);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $deleted = $this->contactService
                ->delete($id);
            if (! $deleted) {
                return response()->json(['
                    message' => 'Failed to delete the contact.',
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the contact.',
            ], 500);
        }

        return response()->json([
            'message' => 'Contact deleted successfully',
        ], 200);
    }
}
