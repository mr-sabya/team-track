<form class="form-horizontal mt-3 mx-3" action="" wire:submit.prevent="login">

    <div class="form-group mb-3">
        <div class="col-12">
            <input class="form-control" type="email" name="email" wire:model="email" placeholder="Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group mb-3">
        <div class="col-12">
            <input class="form-control" type="password" name="password" wire:model="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="col-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" wire:model="remember">
                <label for="checkbox-signup" class="text-color">
                    Remember me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group text-center mt-3">
        <div class="col-12">
            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light w-100" type="submit">
                Log In</button>
        </div>
    </div>

    <div class="form-group row mt-4 mb-0">
        <div class="col-sm-12 text-center">
            <a href="auth-recoverpw.html" class="text-color">
                <i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
        </div>
        
    </div>
</form>