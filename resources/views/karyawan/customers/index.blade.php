<x-template-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$title}}
        </h2>
<div>
  @if (session('status'))
  <div class="alert alert-success">
      {{session('status')}}
  </div>
  
@endif
  <div class="shadow px-6 py-4 bg-white rounded sm:py-1">
    <div class="grid grid-cols-12">
      <div class="col-span-6 p-4">
       
        <!-- Button trigger modal -->
<button type="button" class="px-4 py-1 rounded text-blue-600 font-semibold border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title font-extrabold" id="exampleModalLabel">FORM TAMBAH DATA</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="customers" class="was-validated">
      <div class="modal-body">
        
          @csrf
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama"  name="nama" >  
                  @error('nama') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
                  
              </div>
  
              <div class="form-group">
                  <label for="alamat">Alamat</label>
                   <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat"  name="alamat">  
                   @error('alamat') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
              </div>
              <div class="form-group">
                  <label for="kontak">Kontak</label>
                  <input type="number" class="form-control  @error('kontak') is-invalid @enderror" id="kontak" placeholder="Masukkan Kontak"  name="kontak">  
                  @error('kontak') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
              </div>
              <div class="form-group">
                  <label for="kelamin">Jenis Kelamin</label>
                  <select class="form-control  @error('kelamin') is-invalid @enderror" id="kelamin"  name="kelamin">
                  @error('kelamin') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
                  <option value="">--pilih--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                   
                  
                  </select>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</form>
</div>
      </div>
      <div class="col-span-6 p-4 flex justify-end">
          <form method='GET' action='customers'>
            <input name = 'cari' type="text" class="px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-none rounded-1-md sm:text-sm border-gray-30" placeholder="Search" >
            <button class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
            </form>
      </div>
    </div>

    
   <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" >
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <!-- <th scope="col"></th> -->
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kontak</th>
            <th scope="col">Kelamin</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
         
          @foreach ($customer as $key => $cstm)
         
            <tr>
              <!-- <td><input type="checkbox" name=""id=""></td> -->
              <td>{{$customer->firstItem() + $key}}</td>
              <td>{{$cstm->nama}}</td>
              <td>{{$cstm->alamat}}</td>
              <td>{{$cstm->kontak}}</td>
              <td>{{$cstm->kelamin}}</td>
              <td>
                <a href="/edit/{{$cstm->id}}" >  <button class="px-4 py-1 rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">  Edit  </button>  </a>
                
                <form name="delete" action="/delete/{{$cstm->id}}" method="POST" class="d-inline-flex" onsubmit="return confirm('Yakin Hapus Data ?')">
                @method('delete')
                @csrf
                <button type="submit"class="px-4 py-1 rounded text-red-600 font-semibold border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none">Hapus</button>              
                 </form>
              </td>
              
              
            </tr>
            
         
          @endforeach


        </tbody>
      </table>
      {{ $customer->links()}}
</div> 
</div>
</div>  
</x-template-layout>
