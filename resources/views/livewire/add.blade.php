<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
  
  
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
  
      
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class="font-bold text-center mb-4">CREATE POSTS</h1>
            </div>
              <div>
                 
                  <div class="mb-2">
                      <input wire:model="customerId" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Post">
                  </div>
                  <div class="mb-2">
                      <label for="nama" class="block">Nama</label>
                      <input wire:model="nama" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="masukkan nama">
                      @error('nama') <h1 class="text-red-500">{{$message}}</h1>@enderror
                  </div>
                  <div class="mb-2">
                      <label for="description" class="block">alamat</label>
                      <textarea wire:model="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="alamat" required></textarea>
                     <!-- @error('alamat') <h1 class="text-red-500">{{$message}}</h1>@enderror -->
                  </div>
                  <div class="mb-2">
                    <label for="kelamin" class="block">Jenis Kelamin</label>
                    <input wire:model="kelamin" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="masukkan kelamin">
                    @error('kelamin') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <label for="no_telp" class="block">Kontak</label>
                    <input wire:model="no_telp" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="masukkan kontak">
                    @error('no_telp') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <label for="email_customer" class="block">Email Customer</label>
                    <input wire:model="email_customer" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Email">
                    @error('email_customer') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
              </div>       
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Submit
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
        </div>
       </form>
      </div>
       
    </div>
  </div>