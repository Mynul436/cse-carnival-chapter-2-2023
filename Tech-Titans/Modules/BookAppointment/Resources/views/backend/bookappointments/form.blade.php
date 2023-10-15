<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $doctorUsers = DB::table('users')->where('user_type',1)->pluck('name');
            
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
    
    @if(count($doctorUsers) > 0)
        <select name="doctor_name" class="form-control">
            @foreach($doctorUsers as $doctor)
                <option value="{{ $doctor }}">{{ $doctor }}</option>
            @endforeach
        </select>
    @else
        <input type="text" class="form-control" name="{{ $field_name }}" placeholder="{{ $field_placeholder }}" {{ $required }}>
    @endif
        </div>
    </div>
    
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [
                '1'=>'New Patient',
                '0'=>'Previously Visited',
                '2'=>'Emergency'
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'published_at';
           
            $field_lable = label_case($field_name);

            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->datetime($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>




</div>

<x-library.select2 />
