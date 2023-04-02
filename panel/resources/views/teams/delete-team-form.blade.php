<x-jet-action-section>
    <x-slot name="title">
        {{ __('删除团队') }}
    </x-slot>

    <x-slot name="description">
        {{ __('永久删除此团队。') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('删除团队后，其所有资源和数据都将被永久删除。在删除此团队之前，请下载您希望保留的有关该团队的任何数据或信息。') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('删除团队') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('删除团队') }}
            </x-slot>

            <x-slot name="content">
                {{ __('您确定要删除此团队吗？删除团队后，其所有资源和数据都将被永久删除。') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('取消') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('删除团队') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
