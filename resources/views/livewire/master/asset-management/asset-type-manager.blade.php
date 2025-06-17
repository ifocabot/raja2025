<div>
    <h2 class="mb-4 text-lg font-semibold">Tipe Aset</h2>

    <form wire:submit.prevent="save" class="space-y-2">
        <input type="text" wire:model.defer="name" placeholder="Nama tipe aset" class="w-full p-2 border" />
        <select wire:model.defer="category_id" class="w-full p-2 border">
            <option value="">Pilih Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <input type="text" wire:model.defer="functional_group" placeholder="Grup Fungsional" class="w-full p-2 border" />
        <button type="submit" class="px-4 py-1 text-white bg-blue-500 rounded">{{ $editId ? 'Update' : 'Tambah' }}</button>
    </form>

    <ul class="mt-4 space-y-1">
        @foreach($types as $item)
            <li class="flex justify-between p-2 border">
                {{ $item->name }} ({{ $item->category->name ?? '-' }})
                <span>
                    <button wire:click="edit({{ $item->id }})" class="text-sm text-blue-600">Edit</button>
                    <button wire:click="delete({{ $item->id }})" class="text-sm text-red-600">Hapus</button>
                </span>
            </li>
        @endforeach
    </ul>
</div>
