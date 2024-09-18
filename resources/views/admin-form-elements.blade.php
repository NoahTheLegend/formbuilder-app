
<div class="container mx-auto p-8">
    <!-- MAIN FORM -->
    <form action="{{ route('submit.form') }}" method="POST">
        @csrf
        @if($fields->isEmpty())
        <p>empty form</p>
        @else
            @foreach($fields as $field)
            <div class="mb-4">
                <label for={{ $field->id }}>{{ $field->element_data['label'] }}</label>
                <input id={{ $field->id }} name={{ $field->element_data['name'] }} type={{ $field->element_data['type'] }} 
                pattern={{ $field->element_data['validation_regex'] }}>
                </input>
            </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary" id="main_form_submit">Submit</button>
    </form>     
       
</div>