<div class="form-group">
    <label for="name"><strong>Name</strong></label>
    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required']) !!}
    @error('name')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="email"><strong>Email</strong></label>
    {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
    @error('email')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="password"><strong>Password</strong></label>
    <input type="password" name="password" placeholder="Password" class="form-control">
    @error('password')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="status"><strong>Select status</strong></label>
    {!! Form::select('status', [1 => 'Active', 0 => 'In-Active'], null, ['class' => 'form-control']) !!}
    @error('status')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
