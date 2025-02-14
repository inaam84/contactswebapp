<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;
use RuntimeException;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = $this->contactService
                ->getAll(15);
        } catch (Exception $e) {
            return back()->withErrors(['alert-danger' => 'Failed to get contacts.']);
        }

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $contact = $this->contactService
                ->create($request->all());

            return redirect()->route('contacts.index')
                ->with('success', 'Contact created successfully.');
        } catch (InvalidArgumentException $e) {
            return back()->withErrors(['alert-warning' => $e->getMessage()]);
        } catch (RuntimeException $e) {
            return back()->withErrors(['alert-danger' => 'An error occurred while creating the contact.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $contact = $this->contactService
                ->find($id);
        } catch (ModelNotFoundException $e) {
            return abort(404, $e->getMessage());
        } catch (Exception $e) {
            return back()->withErrors(['alert-danger' => 'Failed to get contact.']);
        }

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $contact = $this->contactService
                ->find($id);
        } catch (ModelNotFoundException $e) {
            return abort(404, $e->getMessage());
        } catch (Exception $e) {
            return back()->withErrors(['alert-danger' => 'Failed to get contact.']);
        }

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContactRequest $request, $id)
    {

        try {
            $contact = $this->contactService
                ->find($id);

            $contact = $this->contactService
                ->update($contact->id, $request->validated());
        } catch (ModelNotFoundException $e) {
            return abort(404, $e->getMessage());
        } catch (InvalidArgumentException $e) {
            return back()->withErrors(['alert-warning' => $e->getMessage()]);
        } catch (Exception $e) {
            return back()->withErrors(['alert-danger' => 'Failed to update contact.']);
        }

        return redirect()
            ->route('contacts.show', $contact)
            ->with(['alert-success' => 'Contact updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->contactService
                ->delete($id);
            if (! $deleted) {
                throw new Exception('Failed to delete contact.');
            }
        } catch (Exception $e) {
            return back()->withErrors(['alert-danger' => 'Failed to delete contact.']);
        }

        return redirect()
            ->route('contacts.index')
            ->with(['alert-success' => 'Contact deleted successfully.']);
    }
}
