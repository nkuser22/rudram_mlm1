@if($methodDetails)
    @foreach($methodDetails as $key => $label)
        
            <div class="row mb-3">
                <label for="input39"  class="col-sm-3 col-form-label " >{{ $label }}</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="{{ $key }}" name="account[{{ $key }}]" placeholder="{{ $label }}" required />
        </div>
        </div>

    @endforeach
@else
    <p>No fields required for this payment method.</p>
@endif
