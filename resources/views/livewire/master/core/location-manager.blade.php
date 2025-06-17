<div>
    <h2 class="mb-4 text-lg font-semibold">Lokasi</h2>

    <form wire:submit.prevent="save" class="space-y-2">
        <input type="text" wire:model.defer="name" placeholder="Nama lokasi" class="w-full p-2 border" />
        <textarea wire:model.defer="description" placeholder="Deskripsi" class="w-full p-2 border"></textarea>
        <button type="submit" class="px-4 py-1 text-white bg-blue-500 rounded">{{ $editId ? 'Update' : 'Tambah' }}</button>
    </form>

    <ul class="mt-4 space-y-1">
        @foreach($locations as $loc)
            <li class="flex justify-between p-2 border">
                {{ $loc->name }}
                <span>
                    <button wire:click="edit({{ $loc->id }})" class="text-sm text-blue-600">Edit</button>
                    <button wire:click="delete({{ $loc->id }})" class="text-sm text-red-600">Hapus</button>
                </span>
            </li>
        @endforeach
    </ul>
</div>
