@if(isset($company->logo))
    <div class="form-group">
        <label for="main_logo"><strong>Existing logo</strong></label>
        <br>
        <img src="{{ asset('uploads/images/company/'.$company->logo) }}"
             width="100">
    </div>
@endif



<div class="form-group">
    <label for="main_logo"><strong>Logo</strong></label>
    {!! Form::file('main_logo', ['placeholder' => 'Logo', 'class' => 'form-control']) !!}
    <p style="color: red"><strong>Max. size : 2MB, Min. dimension:100x100</strong></p>
    @error('main_logo')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

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
    <label for="website"><strong>Website</strong></label>
    {!! Form::text('website', null, ['placeholder' => 'Website', 'class' => 'form-control']) !!}
    @error('website')
    <span class="error-messages" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
