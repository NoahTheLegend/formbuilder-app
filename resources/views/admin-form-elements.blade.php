<div class="container mx-auto p-8">
    <!-- MAIN FORM -->
    <form action="{{ route('submit.form') }}" method="POST">
        @csrf
        @if($fields->isEmpty())
            <p>empty form</p>
        @else
            @foreach($fields as $field)
                <div class="form-group">
                    <label for="{{ $field->id }}">{{ $field->element_data['label'] }}</label>
                    
                    @if ($field->element_data['tag'] === 'select')
                        <select id="{{ $field->id }}" name="{{ $field->element_data['name'] }}" 
                            @if ($field->element_data['is_required']) required @endif>
                            @foreach(explode(';', $field->element_data['options']) as $option)
                                <option value="{{ trim($option) }}">{{ trim($option) }}</option>
                            @endforeach
                        </select>
                    @elseif($field->element_data['tag'] === 'textarea')
                        <textarea id="{{ $field->id }}" name="{{ $field->element_data['name'] }}" 
                            @if ($field->element_data['is_required']) required @endif 
                            placeholder="{{ $field->element_data['placeholder'] }}"></textarea>
                    @else
                        <input id="{{ $field->id }}" name="{{ $field->element_data['name'] }}" 
                            type="{{ $field->element_data['type'] }}" 
                            @if (!empty($field->element_data['validation_regex']))
                                pattern="{{ str_replace("/", "", $field->element_data['validation_regex']) }}"
                            @endif
                            @if ($field->element_data['is_required'])
                                required
                            @endif 
                            placeholder="{{ $field->element_data['placeholder'] }}">
                    @endif
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary" id="main_form_submit">Submit</button>
    </form>
</div>