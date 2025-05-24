<div class="mb-3">
    <label>Prénom</label>
    <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $user->firstname ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Nom</label>
    <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $user->lastname ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Rôle</label>
    <select name="role_id" class="form-control" required>
        <option value="">-- Choisir un rôle --</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ (old('role_id', $user->role_id ?? '') == $role->id) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>

@if (!isset($user))
<div class="mb-3">
    <label>Mot de passe</label>
    <input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
    <label>Confirmer mot de passe</label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>
@endif
