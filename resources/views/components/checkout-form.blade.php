<div class="row">
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control {{ !$errors->has('name')?'':'is-invalid' }}" 
                value="{{ old('name', optional($data ?? null)->name) }}"
                placeholder="First name"
            />
            <label class="">First Name</label>
            @error('name')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="lname" 
                id="lname" 
                class="form-control {{ !$errors->has('lname')?'':'is-invalid' }}" 
                value="{{ old('lname', optional($data ?? null)->lname) }}"
                placeholder="Last name"
            />
            <label class="">Last name</label>
            @error('lname')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="email" 
                id="email" 
                class="form-control {{ !$errors->has('email')?'':'is-invalid' }}" 
                value="{{ old('email', optional($data ?? null)->email) }}"
                placeholder="Email"
            />
            <label class="">Email</label>
            @error('email')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                class="form-control {{ !$errors->has('phone')?'':'is-invalid' }}" 
                value="{{ old('phone', optional($data ?? null)->phone) }}"
                placeholder="Phone Number"
            />
            <label class="">Phone Number</label>
            @error('phone')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="address1" 
                id="address1" 
                class="form-control {{ !$errors->has('address1')?'':'is-invalid' }}" 
                value="{{ old('address1', optional($data ?? null)->address1) }}"
                placeholder="Address 1"
            />
            <label class="">Address 1</label>
            @error('address1')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="address2" 
                id="address2" 
                class="form-control {{ !$errors->has('address2')?'':'is-invalid' }}" 
                value="{{ old('address2', optional($data ?? null)->address2) }}"
                placeholder="Address 2"
            />
            <label class="">Address 2</label>
            @error('address2')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="city" 
                id="city" 
                class="form-control {{ !$errors->has('city')?'':'is-invalid' }}" 
                value="{{ old('city', optional($data ?? null)->city) }}"
                placeholder="City"
            />
            <label class="">City</label>
            @error('city')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="state" 
                id="state" 
                class="form-control {{ !$errors->has('state')?'':'is-invalid' }}" 
                value="{{ old('state', optional($data ?? null)->state) }}"
                placeholder="State"
            />
            <label class="">State</label>
            @error('state')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="country" 
                id="country" 
                class="form-control {{ !$errors->has('country')?'':'is-invalid' }}" 
                value="{{ old('country', optional($data ?? null)->country) }}"
                placeholder="Country"
            />
            <label class="">Country</label>
            @error('country')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-floating mb-3">
            <input 
                type="text" 
                name="pincode" 
                id="pincode" 
                class="form-control {{ !$errors->has('pincode')?'':'is-invalid' }}" 
                value="{{ old('pincode', optional($data ?? null)->pincode) }}"
                placeholder="Pincode"
            />
            <label class="">Pincode</label>
            @error('pincode')
                <div class="error-message invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>