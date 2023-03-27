<x-jet-action-section>
    <x-slot name="title">
        <div data-v-06fe2774="" data-v-15d61d2e="" class="row">
            <div data-v-06fe2774="" data-v-15d61d2e="" class="col-12 col-md-9">
                <h3 data-v-06fe2774="" data-v-15d61d2e="">{{ __('Delete Account') }}</h3>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">

        <div data-v-06fe2774="" data-v-15d61d2e="">
            <div data-v-4918d6bc="" data-v-06fe2774="" class="alert-message error" data-v-15d61d2e="">
                <div data-v-4918d6bc="" class="d-none icon"></div>
                <div data-v-4918d6bc="" class="">
                    <h3 data-v-4918d6bc="" class="uppercase"></h3>
                    <span data-v-06fe2774="">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </span>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="content">

        <div data-v-09cc4f2a="" data-v-15d61d2e="">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                 placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
