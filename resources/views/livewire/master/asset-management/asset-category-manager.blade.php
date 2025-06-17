<div>
    <h2 class="mb-4 text-lg font-semibold">Kategori Aset</h2>

    <form wire:submit.prevent="save" class="space-y-2">
        <input type="text" wire:model.defer="name" placeholder="Nama kategori" class="w-full p-2 border" />
        <button type="submit" class="px-4 py-1 text-white bg-blue-500 rounded">{{ $editId ? 'Update' : 'Tambah' }}</button>
    </form>

    <ul class="mt-4 space-y-1">
        @foreach($categories as $item)
            <li class="flex justify-between p-2 border">
                {{ $item->name }}
                <span>
                    <button wire:click="edit({{ $item->id }})" class="text-sm text-blue-600">Edit</button>
                    <button wire:click="delete({{ $item->id }})" class="text-sm text-red-600">Hapus</button>
                </span>
            </li>
        @endforeach
    </ul>
</div>
