@extends('frontend.app')

@section('title', 'Register')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
    <style>
        .iti__tel-input {
            position: relative;
            display: inline-block;
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <main>

        <section class="client-information-section mt-150 mb-150">
            <div class="container">
                <div class="appointment-form-container client-information-form-container">
                    <h2 class="tm-common-heading">Client Information</h2>
                    <form class="appointment-form client-information-form" method="post" action="{{ route('client.store') }}"
                        enctype="multipart/form-data" id="addClient">
                        @csrf
                        <!-- Personal Information -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" class=" @error('fname') is-invalid @enderror"
                                    name="fname" placeholder="Enter your first name" value="{{ old('fname') }}">
                                @error('fname')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" class=" @error('lname') is-invalid @enderror"
                                    name="lname" placeholder="Enter your last name" value="{{ old('lname') }}">
                                @error('lname')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="@error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>

                                </select>
                                @error('gender')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <div class="date-input-wrapper">
                                    <input type="date" id="appointment-date" name="dob"
                                        class="date-input @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                                    <img src="{{ asset('frontend/assets/images/Calendar.svg') }}" alt="Calendar Icon"
                                        class="custom-calendar-icon">
                                    @error('dob')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <img src="{{ asset('') }}" alt="">
                            <input type="tel" id="phone" class=" @error('phone') is-invalid @enderror"
                                name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                            <div class="text-danger" style="display: none" id="phone_error"></div>
                            @error('phone')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="street">State</label>
                                <input type="text" id="street" class=" @error('street') is-invalid @enderror"
                                    name="street" placeholder="Enter Street" value="{{ old('street') }}">
                                @error('street')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" class=" @error('city') is-invalid @enderror"
                                    name="city" placeholder="Enter City" value="{{ old('city') }}">

                                @error('city')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="postcode">Post Code</label>
                                <input type="number" id="postcode" class=" @error('postalcode') is-invalid @enderror"
                                    name="postalcode" placeholder="Enter Post Code" value="{{ old('postalcode') }}">
                                @error('postalcode')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Therapy Preferences -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="therapy-type">Preferred Therapy Type</label>
                                <select id="therapy-type" name="preferred_type"
                                    class="@error('preferred_type') is-invalid @enderror" value="{{old('preferred_type')}}">
                                    <option value="">Select Therapy Type</option>
                                    <option value="cognitive_behavioral_therapy">Cognitive Behavioral Therapy (CBT)
                                    </option>
                                    <option value="dialectical_behavioral_therapy">Dialectical Behavior Therapy (DBT)
                                    </option>
                                    <option value="psychodynamic_therapy">Psychodynamic Therapy</option>
                                    <option value="humanistic_therapy">Humanistic Therapy</option>
                                    <option value="existential_therapy">Existential Therapy</option>
                                    <option value="gestalt_therapy">Gestalt Therapy</option>
                                    <option value="art_therapy">Art Therapy</option>
                                    <option value="music_therapy">Music Therapy</option>
                                    <option value="play_therapy">Play Therapy</option>
                                    <option value="drama_therapy">Drama Therapy</option>
                                    <option value="dance_movement_therapy">Dance/Movement Therapy</option>
                                    <option value="applied_behavior_analysis">Applied Behavior Analysis (ABA)</option>
                                    <option value="exposure_therapy">Exposure Therapy</option>
                                    <option value="family_therapy">Family Therapy</option>
                                    <option value="couples_therapy">Couples Therapy</option>
                                    <option value="group_therapy">Group Therapy</option>
                                    <option value="emdr">Eye Movement Desensitization and Reprocessing (EMDR)</option>
                                    <option value="trauma_focused_cbt">Trauma-Focused Cognitive Behavioral Therapy (TF-CBT)
                                    </option>
                                    <option value="mindfulness_based_stress_reduction">Mindfulness-Based Stress Reduction
                                        (MBSR)</option>
                                    <option value="hypnotherapy">Hypnotherapy</option>
                                    <option value="reiki">Reiki</option>
                                    <option value="biofeedback_therapy">Biofeedback Therapy</option>
                                    <option value="occupational_therapy">Occupational Therapy (OT)</option>
                                    <option value="performance_therapy">Performance Therapy</option>
                                    <option value="motivational_interviewing">Motivational Interviewing (MI)</option>
                                    <option value="twelve_step_facilitation">12-Step Facilitation Therapy</option>
                                    <option value="ayurvedic_therapy">Ayurvedic Therapy</option>
                                    <option value="indigenous_healing_practices">Indigenous Healing Practices</option>
                                    <option value="shamanic_healing">Shamanic Healing</option>
                                    <option value="acupuncture">Acupuncture</option>
                                    <option value="sex_therapy">Sex Therapy</option>
                                    <option value="sleep_therapy">Sleep Therapy</option>
                                    <option value="grief_counseling">Grief Counseling</option>
                                    <option value="electroconvulsive_therapy">Electroconvulsive Therapy (ECT)</option>
                                    <option value="transcranial_magnetic_stimulation">Transcranial Magnetic Stimulation
                                        (TMS)</option>
                                    <option value="somatic_experiencing">Somatic Experiencing Therapy</option>
                                    <option value="child_therapy">Child Therapy</option>
                                    <option value="ecotherapy">Ecotherapy (Nature Therapy)</option>
                                </select>
                                @error('preferred_type')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="focus-area">Area of Focus</label>
                                <select id="area-focus" name="area_focus"
                                    class="@error('area_focus') is-invalid @enderror" value="{{ old('area_focus') }}">
                                    <option value="">Select Area Focus</option>
                                    <option value="mental_health">Mental Health</option>
                                    <option value="addiction_recovery">Addiction Recovery</option>
                                    <option value="child_and_adolescent">Child and Adolescent Therapy</option>
                                    <option value="relationship_issues">Relationship Issues</option>
                                    <option value="grief_and_loss">Grief and Loss</option>
                                    <option value="trauma_and_ptsd">Trauma and PTSD</option>
                                    <option value="stress_management">Stress Management</option>
                                    <option value="anxiety_and_depression">Anxiety and Depression</option>
                                    <option value="career_counseling">Career Counseling</option>
                                    <option value="anger_management">Anger Management</option>
                                    <option value="self_esteem_and_confidence">Self-Esteem and Confidence</option>
                                    <option value="life_transitions">Life Transitions</option>
                                    <option value="eating_disorders">Eating Disorders</option>
                                    <option value="chronic_illness">Chronic Illness</option>
                                    <option value="sexual_health">Sexual Health</option>
                                    <option value="family_dynamics">Family Dynamics</option>
                                    <option value="behavioral_issues">Behavioral Issues</option>
                                    <option value="phobias_and_fears">Phobias and Fears</option>
                                    <option value="work_life_balance">Work-Life Balance</option>
                                    <option value="spirituality_and_wellness">Spirituality and Wellness</option>
                                    <option value="social_skills_development">Social Skills Development</option>
                                    <option value="substance_abuse">Substance Abuse</option>
                                    <option value="adoption_and_foster_care">Adoption and Foster Care</option>
                                    <option value="military_and_veterans">Military and Veterans</option>
                                    <option value="parenting_support">Parenting Support</option>
                                    <option value="divorce_and_separation">Divorce and Separation</option>
                                    <option value="lgbtq_support">LGBTQ+ Support</option>
                                    <option value="aging_and_elder_care">Aging and Elder Care</option>
                                    <option value="meditation_and_mindfulness">Meditation and Mindfulness</option>
                                    <option value="academic_stress">Academic Stress</option>
                                    <option value="financial_issues">Financial Issues</option>
                                </select>

                                @error('area_focus')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Account Details -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class=" @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class=" @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter Password" value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Agreement and Upload -->
                        <div class="form-group">
                            <label for="terms" class="custom-checkbox tm-remember-me">
                                <input type="checkbox" id="terms" name="terms"
                                    {{ old('terms') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                I agree to the Terms and Conditions and Privacy Policy
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="profile-pic">Upload Profile Pic</label>
                            <div class="file-upload-space" id="upload-area">
                                <span id="upload-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                        viewBox="0 0 25 24" fill="none">
                                        <path
                                            d="M19.5 15V17C19.5 18.1046 18.6046 19 17.5 19H7.5C6.39543 19 5.5 18.1046 5.5 17V15M12.5 15L12.5 5M12.5 5L14.5 7M12.5 5L10.5 7"
                                            stroke="#344051" stroke-width="1.67" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <p id="upload-text">Upload file</p>
                                <input type="file" name="image" class="file-input" id="profile"
                                    accept="image/*">
                            </div>
                        </div>

                        <button type="submit" class="submit-button">Submit</button>
                    </form>

                </div>
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>
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
        document.querySelector("#addClient").addEventListener("submit", function(e) {
            e.preventDefault();
            document.querySelector("#phone").value = phoneInput.getNumber();
            this.submit();
        });
    </script>
@endpush
