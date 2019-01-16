@if(!empty($operators))
    @foreach($operators as $operator)
        <option value="{{ $operator->id }}">{{ $operator->name }}</option>
    @endforeach
@endif