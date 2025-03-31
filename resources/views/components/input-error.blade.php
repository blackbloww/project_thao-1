@props(['messages'])

@if ($messages)
        <div style="color:red">
            @foreach ((array) $messages as $message)
                {{ $message }}
            @endforeach
        </div>
    
@endif
