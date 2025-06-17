<div>
    <h2 class="mb-4 text-lg font-semibold">Vendor</h2>

    <form wire:submit.prevent="save" class="grid grid-cols-2 gap-2">
        <input type="text" wire:model.defer="name" placeholder="Nama vendor" class="p-2 border" />
        <input type="text" wire:model.defer="contact_person" placeholder="Kontak person" class="p-2 border" />
        <input type="text" wire:model.defer="phone" placeholder="Telepon" class="p-2 border" />
        <input type="email" wire:model.defer="email" placeholder="Email" class="p-2 border" />
        <textarea wire:model.defer="address" placeholder="Alamat" class="col-span-2 p-2 border"></textarea>
        <textarea wire:model.defer="notes" placeholder="Catatan" class="col-span-2 p-2 border"></textarea>
        <button type="submit" class="col-span-2 px-4 py-1 text-white bg-blue-500 rounded">{{ $editId ? 'Update' : 'Tambah' }}</button>
    </form>

    <ul class="mt-4 space-y-1">
        @foreach($vendors as $vendor)
            <li class="flex justify-between p-2 border">
                {{ $vendor->name }} - {{ $vendor->email }}
                <span>
                    <button wire:click="edit({{ $vendor->id }})" class="text-sm text-blue-600">Edit</button>
                    <button wire:click="delete({{ $vendor->id }})" class="text-sm text-red-600">Hapus</button>
                </span>
            </li>
        @endforeach
    </ul>
</div>
