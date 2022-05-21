<form wire:submit.prevent='store()' method="POST" class="contact-form">
    <x-alert /> 
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <x-jet-input type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Your name"
                    name="name" :value="old('name')" wire:model.defer='name' required />
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">

                <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                    :value="old('email')" placeholder="Your Email" wire:model.defer='email' required />
                <x-jet-input-error for="email"></x-jet-input-error>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <x-jet-input type="text" class="{{ $errors->has('subject') ? 'is-invalid' : '' }}"
                    placeholder="Your subject" name="subject" :value="old('subject')" wire:model.defer='subject' required />
                <x-jet-input-error for="subject"></x-jet-input-error>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" rows="5" :value="old('message')"
                    placeholder="Message" name="message" wire:model.defer='message' required></textarea>
                <x-jet-input-error for="message"></x-jet-input-error>
            </div>
        </div>

        <div class="col-md-12 text-center">

            <button type="submit" class="button button-a button-big button-rouded">
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Send Message') }}
            </button>
        </div>
    </div>
</form>
