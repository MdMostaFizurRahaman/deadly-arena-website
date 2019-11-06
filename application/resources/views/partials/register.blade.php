

    <!-- Registration Form -->
    <div id="nav-registration" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Register</h4>
                </div>
                <div class="modal-body">
                   
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="youplay-input">
                            <input id="player_name" type="text" name="player_name"  placeholder="Player Name">
                        </div>
                        @error('player_name')
                        <div class="text-danger align-middle">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="youplay-input">
                            <input id="player_displayname" type="text"name="player_displayname" placeholder="Player Display Name">

                        </div>
                        @error('player_displayname')
                        <div class="text-danger align-middle">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="youplay-input">
                            <input id="player_email" type="player_email" name="player_email"  placeholder="Player Email">
                        </div>
                        @error('player_email')
                        <div class="text-danger align-middle">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="youplay-input">
                            <input id="password" type="password"  name="password" placeholder="Password">
                        </div> 
                        @error('password')
                        <div class="text-danger align-middle">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="youplay-input">
                            <input id="password-confirm" type="password"  name="password_confirmation"  placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-default db">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Registration Form -->
