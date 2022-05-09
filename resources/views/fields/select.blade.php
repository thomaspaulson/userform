                <div class="form-group">
                    <label for="{{ $field->title }}">{{ $field->title }}</label>
                    <select  class="form-select" name="{{ $field->title }}" required>
                        <option value="">-select-</option>
                        @foreach ($field->options as $option)
                        <option value="{{ $option->value }}">{{ $option->name }}</option>
                        @endforeach
                    </select>

                </div>
