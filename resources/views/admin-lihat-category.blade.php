<x-admin-layout>
    <div class="w-full p-5 grid grid-cols-3 gap-5 overflow-y-auto ">
        <span class="col-span-3 font-bold text-5xl text-center">
          Categories
        </span>
  

        @foreach ($kategoris as $kategori)
          <div class="p-5 flex flex-col gap-y-5 items-center border-2 border-black rounded-lg shadow-lg h-full justify-end">
              <img class="max-w-[66%]" src="{{asset('storage/' . $kategori->image)}}" alt="{{$kategori->name}}" />
              <div class="flex flex-col ">
                <span class="font-bold text-4xl text-center">{{$kategori->name}}</span>
                <span class="text-lg text-center text-gray-600">ID : {{$kategori->id}}</span>
                <form class="mx-auto" method="post" action="/admin/category/delete/{{$kategori->id}}">
                  @csrf
                  <button type="submit" class="px-4 py-1 bg-gray-900 text-white rounded w-fit">Delete</button>
                </form>
              </div>
          </div>
        @endforeach
  
        {{-- <div class="p-5 flex flex-col gap-y-5 items-center border-2 border-black rounded-lg shadow-lg h-full justify-end">
            <img class="max-w-[66%]" src="/img/baju.png" alt="{nama}" />
            <div class="flex flex-col ">
              <span class="font-bold text-4xl text-center">Baju Special</span>
              <span class="text-lg text-center text-gray-600">ID : 2</span>
              <button type="button" class="px-4 py-1 bg-gray-900 text-white rounded w-fit mx-auto">
                Delete
              </button>
            </div>
        </div> --}}
    </div>
</x-admin-layout>