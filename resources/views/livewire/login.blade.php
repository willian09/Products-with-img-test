<div class="container mt-5">
    <div class="card offset-3 col-6">
        <div class="card-header text-center fs-2">
            <b>Login</b>
        </div>
        <div class="card-body">
            <form wire:submit="loginUser">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><b>Email address</b></label>
                    <input wire:model='email' type="email" class="form-control" id="exampleInputEmail1">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                    <input wire:model='password' type="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center mt-3">
                    <a wire:navigate href='{{ route('home') }}' type="submit" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="mb-1 text-center mt-3">
                Dont hava an account? <a wire:navigate href="{{ route('registerUsers') }}">Register</a>
            </div>
        </div>
    </div>
</div>
