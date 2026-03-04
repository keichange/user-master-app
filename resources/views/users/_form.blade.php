<div class="mb-3">
    <label class="form-label">名前 <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $user->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">メールアドレス <span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $user->email ?? '') }}">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">部署</label>
    <input type="text" name="department" class="form-control @error('department') is-invalid @enderror"
           value="{{ old('department', $user->department ?? '') }}">
    @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">権限 <span class="text-danger">*</span></label>
    <select name="role" class="form-select @error('role') is-invalid @enderror">
        <option value="user"   {{ old('role', $user->role ?? '') === 'user'  ? 'selected' : '' }}>user</option>
        <option value="admin"  {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>admin</option>
    </select>
    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
           {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">有効</label>
</div>
