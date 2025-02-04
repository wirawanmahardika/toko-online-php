<x-admin-layout>
  <form method="post" enctype="multipart/form-data" action="/admin/item/tambah" class="w-1/2 mx-auto flex flex-col p-5 gap-y-5 ">
      @csrf
      <span class="font-bold text-4xl text-center">Tambah Item</span>
      <div class="flex flex-col">
        <span class="text-2xl ">Nama</span>
        <input
          type="text"
          name="name"
          class="rounded outline-none border-2 border-black h-8"
          value="{{old('name')}}"
        />
        @if ($errors->has("name")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('name')}}</span> @endif
      </div>
      <div class="flex flex-col">
        <span class="text-2xl ">Category</span>
        <input
          list="categories"
          name="id_kategori"
          type="number"
          value="{{old('id_kategori')}}"
          autocomplete="off"
          class="rounded outline-none border-2 border-black h-8"
        />
        <datalist id="categories">
          @foreach ($kategoris as $k)
            <option value="{{$k->id}}">{{$k->name}}</option>
          @endforeach
        </datalist>
        @if ($errors->has("id_kategori")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('id_kategori')}}</span> @endif
      </div>
      <div class="flex flex-col">
        <span class="text-2xl ">Price</span>
        <input
          name="harga"
          value="{{old('harga')}}"
          type="number"
          class="rounded outline-none border-2 border-black h-8"
        />
        @if ($errors->has("harga")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('harga')}}</span> @endif
      </div>
      <div class="flex flex-col">
        <span class="text-2xl ">Stock</span>
        <input
          name="stok"
          value="{{old('stok')}}"
          type="number"
          class="rounded outline-none border-2 border-black h-8"
        />
        @if ($errors->has("stok")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('stok')}}</span> @endif
      </div>
      <div class="flex flex-col">
        <span class="text-2xl ">Photo</span>
        <input
          name="image"
          value="{{old('image')}}"
          type="file"
          class="rounded outline-none border-2 border-black h-8"
        />
        @if ($errors->has("image")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('image')}}</span> @endif
      </div>
      <button class="font-bold px-4 py-1 rounded bg-sky-600 text-stone-200 mx-auto w-fit">
        Tambah
      </button>
    </form>
</x-admin-layout>