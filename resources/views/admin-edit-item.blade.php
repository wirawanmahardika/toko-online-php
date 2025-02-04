<x-admin-layout>
  <div class="p-8 w-full flex flex-col gap-y-5 items-center">
    <span class="font-bold text-4xl ">Edit Item</span>
    <form method="post" enctype="multipart/form-data" action="/admin/item/edit" class="w-1/2 flex flex-col items-center gap-y-5">
      @csrf
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          ID Item
        </label>
        <input
          name="id"
          type="text"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("id")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('id')}}</span> @endif
      </div>
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          Nama
        </label>
        <input
          name="name"
          type="text"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("name")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('name')}}</span> @endif
      </div>
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          Photo
        </label>
        <input
          name="image"
          type="file"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("image")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('image')}}</span> @endif
      </div>
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          Price
        </label>
        <input
          name="harga"
          type="number"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("harga")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('harga')}}</span> @endif
      </div>
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          Stock
        </label>
        <input
          name="stok"
          type="number"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("stok")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('stok')}}</span> @endif
      </div>
      <button class="px-8 py-1 rounded bg-sky-600">Submit</button>
    </form>
  </div>

</x-admin-layout>