<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1"/>
    <title>@yield('title')</title>

    @include('frontend.partials.style');
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
    <style>
        .iti__tel-input {
            position: relative;
            display: inline-block;
            width: 100%;
        }
    </style>
</head>

<body style="background-color: rgba(75, 66, 66, 0.64);">

<!-- header area starts -->
@include('frontend.partials.header')
<!-- header area ends -->

<!-- main area starts -->
<main>
    <section class="multi-step-form-section mb-150 mt-150">
        <div class="container">
            <!-- MultiStep Form -->
            <div class="row">
                <div class="col">
                    <form class="msform" method="POST"
                          action="{{ route('phychologist.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">Personal Information</li>
                            <li>Professional Information</li>
                            <li>Profile Description</li>
                        </ul>
                        <!-- 1st fieldset -->
                        <fieldset>
                            <div class="appointment-form client-information-form">
                                <h3 class="common-form-title">Personal Information</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" id="first-name" name="name"
                                               class=" @error('name') is-invalid @enderror"
                                               placeholder="Enter your first name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="last-name" name="lname"
                                               class=" @error('lname') is-invalid @enderror"
                                               placeholder="Enter your last name" value="{{ old('lname') }}">
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender"
                                                class=" @error('gender') is-invalid @enderror">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <div class="date-input-wrapper">
                                            <input type="date" id="appointment-date" name="dob"
                                                   class="date-input @error('dob') is-invalid @enderror"
                                                   value="{{ old('dob') }}">
                                            <img src="{{ asset('frontend/assets/images/Calendar.svg') }}"
                                                 alt="Calendar Icon" class="custom-calendar-icon">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h3 class="common-form-title">Contact Information</h3>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <img src="{{ asset('') }}" alt="">
                                    <input type="tel" id="phone" class=" @error('phone') is-invalid @enderror"
                                           name="phone" placeholder="Enter your phone number"
                                           value="{{ old('phone') }}">
                                    <div class="text-danger" style="display: none" id="phone_error"></div>
                                    @error('phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="language">Languages Spoken</label>
                                    <select id="language" name="language"
                                            class=" @error('language') is-invalid @enderror">
                                        <option value="">Select Language</option>
                                        <select name="language">
                                            <option
                                                value="english" {{ old('language') === 'english' ? 'selected' : '' }}>
                                                English
                                            </option>
                                            <option
                                                value="spanish" {{ old('language') === 'spanish' ? 'selected' : '' }}>
                                                Spanish
                                            </option>
                                            <option value="french" {{ old('language') === 'french' ? 'selected' : '' }}>
                                                French
                                            </option>
                                            <option value="german" {{ old('language') === 'german' ? 'selected' : '' }}>
                                                German
                                            </option>
                                            <option
                                                value="italian" {{ old('language') === 'italian' ? 'selected' : '' }}>
                                                Italian
                                            </option>
                                            <option
                                                value="portuguese" {{ old('language') === 'portuguese' ? 'selected' : '' }}>
                                                Portuguese
                                            </option>
                                            <option
                                                value="chinese" {{ old('language') === 'chinese' ? 'selected' : '' }}>
                                                Chinese
                                            </option>
                                            <option
                                                value="japanese" {{ old('language') === 'japanese' ? 'selected' : '' }}>
                                                Japanese
                                            </option>
                                            <option value="arabic" {{ old('language') === 'arabic' ? 'selected' : '' }}>
                                                Arabic
                                            </option>
                                            <option
                                                value="russian" {{ old('language') === 'russian' ? 'selected' : '' }}>
                                                Russian
                                            </option>
                                            <option value="hindi" {{ old('language') === 'hindi' ? 'selected' : '' }}>
                                                Hindi
                                            </option>
                                            <option value="korean" {{ old('language') === 'korean' ? 'selected' : '' }}>
                                                Korean
                                            </option>
                                        </select>

                                        <!-- Add more languages as needed -->
                                    </select>
                                    @error('language')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <h3 class="common-form-title">Account Details</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                               class=" @error('email') is-invalid @enderror"
                                               placeholder="Enter Email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="password-field">
                                            <input type="password" id="password" name="password"
                                                   class="password-input @error('password') is-invalid @enderror"
                                                   placeholder="Enter your password">
                                            <img src="{{ asset('frontend/assets/images/eye-off.svg') }}"
                                                 alt="Show/Hide Password" class="toggle-password" data-input="password">
                                        </div>
                                        @error('password')
                                        <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="terms_registration" class="custom-checkbox tm-remember-me">
                                        <input type="checkbox" id="terms_registration"
                                               name="terms_registration" {{ old('terms_registration') ? 'checked' : '' }} />
                                        <span class="checkmark"></span> I confirm that I am a registered psychologist
                                        with AHPRA and understand that my registration will be verified
                                    </label>
                                    @error('terms_registration')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="terms_agreement" class="custom-checkbox tm-remember-me">
                                        <input type="checkbox" id="terms_agreement"
                                               name="terms_agreement" {{ old('terms_agreement') ? 'checked' : '' }} />
                                        <span class="checkmark"></span> I Agree to Terms and Conditions and Privacy
                                        Policy
                                    </label>
                                    @error('terms_agreement')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button w-100" value="Next"/>
                        </fieldset>
                        <!-- 2nd fieldset -->
                        <fieldset>
                            <div class="appointment-form client-information-form">
                                <!-- Professional Information -->
                                <h3 class="common-form-title">Professional Information</h3>
                                <div class="form-group">
                                    <label for="qualifications">Qualifications</label>
                                    <input type="text" id="qualification" name="qualification"
                                           placeholder="Enter your qualification"
                                           class="@error('qualification') is-invalid @enderror"
                                           value="{{ old('qualification') }}">
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ahpra-reg-number">AHPRA Registration Number</label>
                                    <input type="text" id="ahpra-reg-number" name="ahpra_registraion_number"
                                           placeholder="Enter your AHPRA registration number"
                                           class="@error('ahpra_registraion_number') is-invalid @enderror"
                                           value="{{ old('ahpra_registraion_number') }}">
                                    @error('ahpra_registraion_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <!-- Therapy Modes Offered -->
                                <h3 class="common-form-title">Therapy Modes Offered</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="practice-name">Practice Name</label>
                                        <input type="text" name="practice_name"
                                               placeholder="Enter practice name"
                                               class="@error('practice_name') is-invalid @enderror"
                                               value="{{ old('practice_name') }}">
                                        @error('practice_name')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="practice-address">Practice Address</label>
                                        <input type="text" name="practice_address"
                                               placeholder="Enter practice address"
                                               class="@error('practice_address') is-invalid @enderror"
                                               value="{{ old('practice_address') }}">
                                        @error('practice_address')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Section and amount  -->
                                <h3 class="common-form-title">Psychologist Session and Price</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="practice-name">Session duration</label>
                                        <input type="number" id="session_duration" name="session_duration"
                                               placeholder="Enter session duration in Minutes"
                                               class="@error('session_duration') is-invalid @enderror"
                                               value="{{ old('session_duration') }}">
                                        @error('session_duration')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="practice-address">Session Price</label>
                                        <input type="number" id="Session Price" name="session_price"
                                               placeholder="Enter Session Price"
                                               class="@error('session_price') is-invalid @enderror"
                                               value="{{ old('session_price') }}">
                                        @error('session_price')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="therapy-mode">Therapy Mode Offered</label>
                                        <input type="text" id="practice-address" name="therapy_mode"
                                               placeholder="Enter Theraoy Made Offerd"
                                               class="@error('therapy_mode') is-invalid @enderror"
                                               value="{{ old('therapy_mode') }}">
                                        @error('therapy_mode')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="client-age-group">Client Age Groups Served</label>
                                        <select id="client_age_group" name="client_age_group"
                                                class="form-control @error('client_age_group') is-invalid @enderror">
                                            <option value="Select"
                                                {{ old('client_age_group') == 'Select' ? 'selected' : '' }}>Select
                                            </option>
                                            <option value="Children"
                                                {{ old('client_age_group') == 'Children' ? 'selected' : '' }}>
                                                Children
                                            </option>
                                            <option value="Adults"
                                                {{ old('client_age_group') == 'Adults' ? 'selected' : '' }}>Adults
                                            </option>
                                            <option value="Elderly"
                                                {{ old('client_age_group') == 'Elderly' ? 'selected' : '' }}>
                                                Elderly
                                            </option>
                                        </select>
                                        @error('client_age_group')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="practice-address">Experience </label>
                                        <input type="number" id="experience" name="experience"
                                               placeholder="Enter experience"
                                               class="@error('experience') is-invalid @enderror"
                                               value="{{ old('experience') }}">
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="area_of_expertise">Areas Of Expertise</label>
                                    <select id="area_of_expertise" name="area_of_expertise[]" multiple="multiple"
                                            class="form-control select2 @error('area_of_expertise') is-invalid @enderror">
                                        <option value="Clinical Psychology"
                                            {{ (old('area_of_expertise') == 'Clinical Psychology') ? 'selected' : '' }}>
                                            Clinical Psychology
                                        </option>
                                        <option value="Counseling Psychology"
                                            {{ (old('area_of_expertise') == 'Counseling Psychology') ? 'selected' : '' }}>
                                            Counseling Psychology
                                        </option>
                                        <option value="Neuropsychology"
                                            {{ (old('area_of_expertise') == 'Neuropsychology') ? 'selected' : '' }}>
                                            Neuropsychology
                                        </option>
                                        <option value="Educational Psychology"
                                            {{ (old('area_of_expertise') == 'Educational Psychology') ? 'selected' : '' }}>
                                            Educational Psychology
                                        </option>
                                        <option value="Forensic Psychology"
                                            {{ (old('area_of_expertise') == 'Forensic Psychology') ? 'selected' : '' }}>
                                            Forensic Psychology
                                        </option>
                                        <option value="Health Psychology"
                                            {{ (old('area_of_expertise') == 'Health Psychology') ? 'selected' : '' }}>
                                            Health Psychology
                                        </option>
                                        <option value="Industrial-Organizational Psychology"
                                            {{ (old('area_of_expertise') == 'Industrial-Organizational Psychology') ? 'selected' : '' }}>
                                            Industrial-Organizational Psychology
                                        </option>
                                        <option value="Sports Psychology"
                                            {{ (old('area_of_expertise') == 'Sports Psychology') ? 'selected' : '' }}>
                                            Sports Psychology
                                        </option>
                                        <option value="Child Psychology"
                                            {{ (old('area_of_expertise') == 'Child Psychology') ? 'selected' : '' }}>
                                            Child Psychology
                                        </option>
                                        <option value="Developmental Psychology"
                                            {{ (old('area_of_expertise') == 'Developmental Psychology') ? 'selected' : '' }}>
                                            Developmental Psychology
                                        </option>
                                        <option value="Social Psychology"
                                            {{ (old('area_of_expertise') == 'Social Psychology') ? 'selected' : '' }}>
                                            Social Psychology
                                        </option>
                                        <option value="Cognitive Psychology"
                                            {{ (old('area_of_expertise') == 'Cognitive Psychology') ? 'selected' : '' }}>
                                            Cognitive Psychology
                                        </option>
                                        <option value="Psychiatric Rehabilitation"
                                            {{ (old('area_of_expertise') == 'Psychiatric Rehabilitation') ? 'selected' : '' }}>
                                            Psychiatric Rehabilitation
                                        </option>
                                    </select>
                                    @error('area_of_expertise')
                                    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                    @enderror
                                </div>


                                <!-- File Upload -->
                                <div class="form-group">
                                    <label for="profile-pic">Upload your AHPRA Certificate for Verification *
                                    </label>
                                    <div class="file-upload-space" id="upload-area">
                                            <span id="upload-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                     viewBox="0 0 25 24" fill="none">
                                                    <path
                                                        d="M19.5 15V17C19.5 18.1046 18.6046 19 17.5 19H7.5C6.39543 19 5.5 18.1046 5.5 17V15M12.5 15L12.5 5M12.5 5L14.5 7M12.5 5L10.5 7"
                                                        stroke="#344051" stroke-width="1.67" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        <p id="upload-text">Upload file</p>
                                        <input type="file" name="upload_certificate" class="file-input"
                                               id="profile" style="display: none;">
                                    </div>
                                    @error('upload_certificate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="multi-btn-wrapper">
                                <input type="button" name="previous" class="previous action-button-previous"
                                       value="Back">
                                <input type="button" name="next" class="next action-button"
                                       value="Continue">
                            </div>
                        </fieldset>
                        <!-- 3rd fieldset -->
                        <fieldset>
                            <div class="appointment-form client-information-form">
                                <!-- Professional Information -->
                                <h3 class="common-form-title">Profile Description</h3>
                                <div class="form-group">
                                        <textarea name="profile_description" id="profile_description"
                                                  class="tm-text-area @error('profile_description') is-invalid @enderror"
                                                  placeholder="Write your Description">{{ old('profile_description') }}</textarea>
                                    @error('profile_description')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <!-- File Upload -->
                                <div class="form-group">
                                    <label for="profile-pic">Upload Profile Pic</label>
                                    <div class="file-upload-space" id="upload-profile">
                                            <span id="profile-upload-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                     viewBox="0 0 25 24" fill="none">
                                                    <path
                                                        d="M19.5 15V17C19.5 18.1046 18.6046 19 17.5 19H7.5C6.39543 19 5.5 18.1046 5.5 17V15M12.5 15L12.5 5M12.5 5L14.5 7M12.5 5L10.5 7"
                                                        stroke="#344051" stroke-width="1.67" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        <p id="upload-profile-text">Upload Pic</p>
                                        <input type="file" name="avatar" class="file-input"
                                               id="profile_preview" accept="image/*" style="display: none;">
                                    </div>
                                    @error('avatar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="multi-btn-wrapper">
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Back">
                                    <input type="submit" name="submit" class="submit action-button"
                                           value="Submit">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- main area ends -->

<!-- footer area starts -->
@include('frontend.partials.footer')
<!-- footer area ends -->

<!-- ==== All Js Links ==== -->

@include('frontend.partials.script')
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>

<!-- Script to Initialize Select2 -->
<script>
    $(document).ready(function () {
        // Initialize Select2 for the dropdown with the ID 'menuOption2'
        $('#area_of_expertise').select2();
    });
</script>
<script>
    const nextButtons = document.querySelectorAll(".next");
    const prevButtons = document.querySelectorAll(".previous");
    const fieldsets = document.querySelectorAll("fieldset");
    const progressbarItems = document.querySelectorAll("#progressbar li");

    let currentStep = 0;

    nextButtons.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            fieldsets[currentStep].style.display = "none";
            currentStep++;
            fieldsets[currentStep].style.display = "block";
            progressbarItems[currentStep].classList.add("active");
        });
    });

    prevButtons.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            fieldsets[currentStep].style.display = "none";
            progressbarItems[currentStep].classList.remove("active");
            currentStep--;
            fieldsets[currentStep].style.display = "block";
        });
    });
</script>
<script>
    // Initialize the intl-tel-input
    var input = document.querySelector("#phone");
    let phoneInput = window.intlTelInput(input, {
        loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/utils.js",
        onlyCountries: ["us"], // Restrict to one country, e.g., "us" for the United States
        preferredCountries: ["us"], // Optionally, specify a preferred country
        initialCountry: "US",
        separateDialCode: true,
        allowDropdown: false,
    });
    // document.querySelector("#addClient").addEventListener("submit", function(e) {
    //     e.preventDefault();
    //     document.querySelector("#phone").value = phoneInput.getNumber();
    //     this.submit();
    // });
</script>

</body>

</html>
