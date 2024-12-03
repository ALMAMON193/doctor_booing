@extends('frontend.app')

@section('title', 'Account Type')

@push('styles')
<!-- Add your styles here if needed -->
@endpush

@section('content')
    <main>
        <!-- Account Type Selection Section -->
        <section class="account-type-section mb-150 mt">
            <div class="container">
                <h2 class="tm-common-heading account-type-heading">Account Type</h2>
                <div class="tm-row">
                    <div class="tm-col">
                        <div class="tm-input-group account-type-div">
                            <label class="acoount-type-name">
                                Client Account:
                                <span>Select this option if you're a client seeking to be matched with a psychologist.</span>
                            </label>
                            <div class="account-type-options">
                                <label class="tm-option-label checkbox style-c tm-style-c-checkbox" style="position: relative">
                                    <a href="#" onclick="checkAndRedirect('client')" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1"></a>
                                    <input type="radio" name="accountType" id="clientAccount" value="client" />
                                    <div class="checkbox__checkmark rounded-circle"></div>
                                    Client Account
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="tm-col">
                        <div class="tm-input-group account-type-div">
                            <label class="acoount-type-name">
                                Psychologist Account:
                                <span>Select this option if you're a psychologist looking to connect with clients.</span>
                            </label>
                            <div class="account-type-options">
                                <label class="tm-option-label checkbox style-c tm-style-c-checkbox" style="position: relative">
                                    <a href="#" onclick="checkAndRedirect('psychologist')" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1"></a>
                                    <input type="radio" name="accountType" id="psychologistAccount" value="psychologist" />
                                    <div class="checkbox__checkmark rounded-circle"></div>
                                    Psychologist Account
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mamun-link">Already Have An Account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    function checkAndRedirect(accountType) {
        // Check the corresponding radio button
        if (accountType === 'client') {
            document.getElementById('clientAccount').checked = true;
            // Redirect to the client wallet page after a short delay
            setTimeout(function() {
                window.location.href = '{{ route('create.client.account') }}';
            }, 200); // Delay for UI to reflect the checked state
        } else if (accountType === 'psychologist') {
            document.getElementById('psychologistAccount').checked = true;
            // Redirect to the psychologist wallet page after a short delay
            setTimeout(function() {
                window.location.href = '{{ route('create.psychologist.account') }}';
            }, 200); // Delay for UI to reflect the checked state
        }
    }
</script>
@endpush
