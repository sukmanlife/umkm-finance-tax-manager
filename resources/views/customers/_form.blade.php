@csrf
<div class="mb-3"><label class="form-label">Nama</label><input class="form-control" name="name" value="{{ old('name', $customer->name ?? '') }}" required></div>
<div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ old('email', $customer->email ?? '') }}"></div>
<div class="mb-3"><label class="form-label">Telepon</label><input class="form-control" name="phone" value="{{ old('phone', $customer->phone ?? '') }}"></div>
<div class="mb-3"><label class="form-label">Alamat</label><textarea class="form-control" name="address">{{ old('address', $customer->address ?? '') }}</textarea></div>
<button class="btn btn-dark">Simpan</button><a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">Batal</a>
