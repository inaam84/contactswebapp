<form method="POST" action="{{ $formRoute }}" class="govuk-form-group">
    @csrf
    @if($edit)
        @method('PUT')
    @endif

    <!-- Forenames -->
    <div class="govuk-form-group @error('forenames') govuk-form-group--error @enderror">
        <label class="govuk-label" for="forenames">Forenames</label>
        @error('forenames')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="forenames" id="forenames" class="govuk-input" value="{{ old('forenames', $contact->forenames ?? '') }}" required maxlength="35">
    </div>

    <!-- Surname -->
    <div class="govuk-form-group @error('surname') govuk-form-group--error @enderror">
        <label class="govuk-label" for="surname">Surname</label>
        @error('surname')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="surname" id="surname" class="govuk-input" value="{{ old('surname', $contact->surname ?? '') }}" required maxlength="35">
    </div>

    <!-- Email -->
    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
        <label class="govuk-label" for="email">Email</label>
        @error('email')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="email" name="email" id="email" class="govuk-input" value="{{ old('email', $contact->email ?? '') }}" required maxlength="255">
    </div>

    <!-- Telephone -->
    <div class="govuk-form-group @error('telephone') govuk-form-group--error @enderror">
        <label class="govuk-label" for="telephone">Telephone</label>
        @error('telephone')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="telephone" id="telephone" class="govuk-input" value="{{ old('telephone', $contact->telephone ?? '') }}" maxlength="12">
    </div>

    <!-- mobile -->
    <div class="govuk-form-group @error('mobile') govuk-form-group--error @enderror">
        <label class="govuk-label" for="mobile">Mobile</label>
        @error('mobile')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="mobile" id="mobile" class="govuk-input" value="{{ old('mobile', $contact->mobile ?? '') }}" maxlength="12">
    </div>

    <!-- Address -->
    <div class="govuk-form-group @error('address_line_1') govuk-form-group--error @enderror">
        <label class="govuk-label" for="address_line_1">Address Line 1</label>
        @error('address_line_1')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="address_line_1" id="address_line_1" class="govuk-input" value="{{ old('address_line_1', $contact->address_line_1 ?? '') }}" maxlength="35">
    </div>

    <div class="govuk-form-group @error('address_line_2') govuk-form-group--error @enderror">
        <label class="govuk-label" for="address_line_2">Address Line 2 (optional)</label>
        @error('address_line_2')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="address_line_2" id="address_line_2" class="govuk-input" value="{{ old('address_line_2', $contact->address_line_2 ?? '') }}" maxlength="35">
    </div>

    <div class="govuk-form-group @error('address_line_3') govuk-form-group--error @enderror">
        <label class="govuk-label" for="address_line_3">Address Line 3 (optional)</label>
        @error('address_line_3')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="address_line_3" id="address_line_3" class="govuk-input" value="{{ old('address_line_3', $contact->address_line_3 ?? '') }}" maxlength="35">
    </div>

    <div class="govuk-form-group @error('address_line_4') govuk-form-group--error @enderror">
        <label class="govuk-label" for="address_line_4">Town or city</label>
        @error('address_line_4')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="address_line_4" id="address_line_4" class="govuk-input govuk-!-width-two-thirds" value="{{ old('address_line_4', $contact->address_line_4 ?? '') }}" maxlength="35">
    </div>

    <div class="govuk-form-group @error('postcode') govuk-form-group--error @enderror">
        <label class="govuk-label" for="postcode">Postcode</label>
        @error('postcode')
        <p class="govuk-error-message">{{ $message }}</p>
        @enderror
        <input type="text" name="postcode" id="postcode" class="govuk-input govuk-input--width-10" value="{{ old('postcode', $contact->postcode ?? '') }}" maxlength="8">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="govuk-button govuk-!-margin-top-6">{{ $edit ? 'Update' : 'Save' }} Contact</button>
</form>