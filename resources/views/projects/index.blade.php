<x-layout>
    <x-slot name="header"> {{ __('Projects')}} </x-slot>

    <x-panel class="flex flex-col pt-16 pb-16">
        <Link href="{{route('projects.create')}}" class="underline">Add new project</Link>

        <x-splade-table :for="$projects" class="min-w-full"/>
    </x-panel>
</x-layout>