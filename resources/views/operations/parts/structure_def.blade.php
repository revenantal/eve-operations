<h2>Structure Defensive Operation Details</h2>
<div class="form-group">
    {{Form::label('attr_form_up', 'Form Up Location')}}
    {{Form::text('attr_form_up', '', ['class' => 'form-control', 'placeholder' => 'Q-U96U - Evictus Command'])}}
</div>
<div class="form-group">
    {{Form::label('attr_voice_comms', 'Voice Communications')}}
    {{Form::text('attr_voice_comms', '', ['class' => 'form-control', 'placeholder' => 'Evictus Mumble'])}}
</div>
<div class="form-group">
    {{Form::label('attr_ship_types', 'Ship Types')}}
    {{Form::text('attr_ship_types', '', ['class' => 'form-control', 'placeholder' => 'Titan > Dreads > Imicus'])}}
</div>
<div class="form-group">
    {{Form::label('attr_estimated_duration', 'Estimated Duration')}}
    {{Form::text('attr_estimated_duration', '', ['class' => 'form-control', 'placeholder' => '2 hours'])}}
</div>
<div class="form-group">
        {{Form::label('attr_structure_location', 'Structure location')}}
        {{Form::text('attr_structure_location', '', ['class' => 'form-control', 'placeholder' => 'WFC-MY - Structure Name'])}}
</div>
<div class="form-group">
    {{Form::label('attr_structure_corp', 'Structure Corporation Owners')}}
    {{Form::text('attr_structure_corp', '', ['class' => 'form-control', 'placeholder' => 'ExDominion'])}}
</div>
<div class="form-group">
    {{Form::label('attr_structure_alliance', 'Structure Alliance Owners')}}
    {{Form::text('attr_structure_alliance', '', ['class' => 'form-control', 'placeholder' => 'Evictus'])}}
</div>
<div class="form-group">
    {{Form::label('attr_structure_timer', 'Structure Vulnerability Starts At')}}
    {{Form::text('attr_structure_timer', '', ['class' => 'form-control', 'placeholder' => 'yyyy/mm/dd hh:mm:ss'])}}
</div>
<div class="form-group">
    {{Form::label('attr_timer_type', 'Timer Type')}}
    {{Form::select('attr_timer_type', [
                        'shield'    => 'Shield', 
                        'armor'     => 'Armor',
                        'final'     => 'Final'],
                        null, ['class' => 'form-control', 'placeholder' => 'Select Type'])}}
</div>
<div class="form-group">
    {{Form::label('attr_notes', 'Notes')}}
    {{Form::textarea('attr_notes', '', ['class' => 'form-control', 'placeholder' => ''])}}
</div>
