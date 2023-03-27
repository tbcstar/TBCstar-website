<x-master>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>

        <div class="flex items-center justify-between bg-white rounded-sm shadow px-8 py-16">
            <div class="w-1/3 flex flex-col items-center">
                <span class="text-3xl font-bold text-black">{{ $user->score() }}</span>
                <span class="text-base text-gray-500">Score</span>
            </div>
            <div class="w-1/3 flex flex-col items-center">
                <span class="text-3xl font-bold text-black">{{ $user->posts()->count() }}</span>
                <span class="text-base text-gray-500">Posts</span>
            </div>
            <div class="w-1/3 flex flex-col items-center">
                <span class="text-3xl font-bold text-black">{{ $user->comments()->count() }}</span>
                <span class="text-base text-gray-500">Comments</span>
            </div>
        </div>

    </x-slot>

    <x-container>
        <livewire:user.show :user="$user" />
    </x-container>
</x-master>
