<div class="form-group">
    <label for="company_id"><strong>Select company</strong></label>
    {!! Form::select('company_id', $data['companies'], null, ['placeholder' => 'Select company', 'class' => 'form-control', 'required']) !!}
    @error('company_id')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="first_name"><strong>First name</strong></label>
    {!! Form::text('first_name', null, ['placeholder' => 'First name', 'class' => 'form-control', 'required']) !!}
    @error('first_name')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="middle_name"><strong>Middle name</strong></label>
    {!! Form::text('middle_name', null, ['placeholder' => 'Middle name', 'class' => 'form-control']) !!}
    @error('middle_name')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="last_name"><strong>Last name</strong></label>
    {!! Form::text('last_name', null, ['placeholder' => 'Last name', 'class' => 'form-control', 'required']) !!}
    @error('last_name')
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
    <label for="phone"><strong>Phone</strong></label>
    {!! Form::number('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
    @error('phone')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
