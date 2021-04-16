{{-- {{ $errors }} --}}
<form action="form" method="POST">
    @csrf
    <input type="text" name="username" placeholder="enter name" >
    <br>
    @if ($errors->first('username'))
        <div style = "color: red">{{ $errors->first('username') }}</div>
    @endif

    <input type="text" name="passward" placeholder="enter passward" >
    <br>
    <span style="color: red">
    @error('passward')
        {{ $message }}
    @enderror
    </span>

    <button type="submit"> login</button>
</form>
{{-- @if ($errors->any())
    @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
    @endforeach
    
@endif --}}