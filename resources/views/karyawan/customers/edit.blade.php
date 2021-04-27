<x-template-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FORM EDIT 
        </h2>
        
  
<div>
    <div class="shadow px-6 py-4 bg-white rounded sm:py-1">
        <form method="POST" action="{{$customer->id}}">
            @method('put')
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama"  name="nama"  value="{{$customer->nama}}">  
                @error('nama') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
                
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                 <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat"  name="alamat"  value="{{$customer->alamat}}">  
                 @error('alamat') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="number" class="form-control  @error('kontak') is-invalid @enderror" id="kontak" placeholder="Masukkan Kontak"  name="kontak" value="{{$customer->kontak}}">  
                @error('kontak') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
            <label for="kelamin">Jenis Kelamin</label>
                   <select class="form-control  @error('kelamin') is-invalid @enderror" id="kelamin"  name="kelamin" value="{{$customer->kelamin}}>
                  <option value="">--pilih--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                   
                  @error('kelamin') <div class="invalid-feedback text-danger">{{$message}}</div>@enderror
                  </select>
            </div>
            <div class="modal-footer">
                <a href="/admin/customers" >  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
        </form>

    </div>
            
    </div>
</div>
</x-template-layout>
