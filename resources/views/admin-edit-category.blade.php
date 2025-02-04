<x-admin-layout>
  <div class="p-8 w-full flex flex-col gap-y-5 items-center mt-10">
    <span class="font-bold text-4xl ">Edit Category</span>
    <form method="post" action="/admin/category/edit" enctype="multipart/form-data" class="w-1/2 flex flex-col items-center gap-y-5"    >
      @csrf
      <div class="flex flex-col w-full ">
        <label class="text-xl">
          ID Category
        </label>
        <input
          name="id"
          type="text"
          value="{{old('id')}}"
          class="w-full outline-none border-2 border-black rounded py-1"
          />
          @if ($errors->has("id")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('id')}}</span> @endif
        </div>
        <div class="flex flex-col w-full ">
        <label class="text-xl">
          Nama Category
        </label>
        <input
        name="name"
        value="{{old('name')}}"
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
        value="{{old('image')}}"
          type="file"
          class="w-full outline-none border-2 border-black rounded py-1"
        />
        @if ($errors->has("image")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('image')}}</span> @endif
      </div>
      <button class="px-8 py-1 rounded bg-sky-600">Submit</button>
    </form>
  </div>
</x-admin-layout>