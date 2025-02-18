@extends('layouts.dashboard')
@section('content')
    <!-- Page content -->
    <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
        <h1 class="h2 mb-4">Settings</h1>

        <!-- Basic info -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-user text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Basic info</h2>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a class="d-flex flex-column justify-content-end position-relative overflow-hidden rounded-circle bg-size-cover bg-position-center flex-shrink-0"
                            href="#" data-bs-toggle="dropdown" aria-expanded="false"
                            style="width: 80px; height: 80px; background-image: url(assets/img/avatar/02.jpg);"
                            aria-label="Upload picture">
                            <span class="d-block text-light text-center lh-1 pb-1" style="background-color: rgba(0,0,0,.5)">
                                <i class="ai-camera"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu my-1">
                            <a class="dropdown-item fw-normal" href="#">
                                <i class="ai-camera fs-base opacity-70 me-2"></i>
                                Upload new photo
                            </a>
                            <a class="dropdown-item text-danger fw-normal" href="#">
                                <i class="ai-trash fs-base me-2"></i>
                                Delete photo
                            </a>
                        </div>
                    </div>
                    <div class="ps-3">
                        <h3 class="h6 mb-1">Profile picture</h3>
                        <p class="fs-sm text-body-secondary mb-0">PNG or JPG no bigger than 1000px wide and tall.
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('dashboard.profile.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                        <div class="col-sm-6">
                            <label class="form-label" for="fn">Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                placeholder="name" value="{{ old('name', $user->name) }}" id="nm" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-sm-6">
                            <label class="form-label" for="email">Email address <span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                value="{{ old('email', $user->email) }}" id="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="phone">Phone <span
                                    class="text-body-secondary">(optional)</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone"
                                data-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;+1 &quot;, &quot; &quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 3, 2]}"
                                placeholder="+1 ___ ___ __" value="{{ old('phone', $user->phone) }}" id="phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="country">Country <span class="text-danger">*</span></label>
                            <select class="form-select @error('country') is-invalid @enderror" name="country" id="country"
                                required>
                                <option value="" disabled>Select country</option>
                                <option value="Indonesia"
                                    {{ old('country', $user->country) == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            </select>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="language">City <span class="text-danger">*</span></label>
                            <select class="form-select @error('city') is-invalid @enderror" name="city" id="language"
                                required>
                                <option value="" disabled>Select City</option>
                                <option value="Bogor" {{ old('city', $user->city) == 'Bogor' ? 'selected' : '' }}>Bogor
                                </option>
                            </select>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="state">State <span class="text-danger">*</span></label>
                            <select class="form-select @error('state') is-invalid @enderror" name="state" id="State"
                                required>
                                <option value="" disabled>Select State</option>
                                <option value="Jawa Barat"
                                    {{ old('state', $user->state) == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                            </select>
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="pc">Postal Code <span class="text-danger">*</span></label>
                            <input class="form-control @error('postal_code') is-invalid @enderror" type="text"
                                name="postal_code" placeholder="16964"
                                value="{{ old('postal_code', $user->postal_code) }}" id="pc" required>
                            @error('postal_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address"
                                placeholder="Add a bio" id="address" required>{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end pt-3">
                            <a href="/dashboard" class="btn btn-secondary">Cancel</a>
                            <button class="btn btn-primary ms-3" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>


        <!-- Password -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-lock-closed text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Password change</h2>
                </div>
                <div class="row align-items-center g-3 g-sm-4 pb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="current-pass">Current password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" value="hidden@password" id="current-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a class="d-inline-block fs-sm fw-semibold text-decoration-none mt-sm-4"
                            href="account-password-recovery.html">Forgot password?</a>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="new-pass">New password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="new-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="confirm-pass">Confirm new password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="confirm-pass">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info d-flex my-3 my-sm-4">
                    <i class="ai-circle-info fs-xl me-2"></i>
                    <p class="mb-0">Password must be minimum 8 characters long - the more, the better.</p>
                </div>
                <div class="d-flex justify-content-end pt-3">
                    <button class="btn btn-secondary" type="button">Cancel</button>
                    <button class="btn btn-primary ms-3" type="button">Save changes</button>
                </div>
            </div>
        </section>


        {{-- <!-- Notifications -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-bell text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Notifications</h2>
                    <button class="btn btn-sm btn-outline-secondary ms-auto" type="button" data-bs-toggle="checkbox"
                        data-bs-target="#checkboxList">Toggle all</button>
                </div>
                <div id="checkboxList">
                    <div class="form-check form-switch d-flex pb-md-2 mb-4">
                        <input class="form-check-input flex-shrink-0" type="checkbox" checked="" id="product-sold">
                        <label class="form-check-label ps-3 ps-sm-4" for="product-sold">
                            <span class="h6 d-block mb-2">Product sold notifications</span>
                            <span class="fs-sm text-body-secondary">Send an email when someone purchased one of my
                                products</span>
                        </label>
                    </div>
                    <div class="form-check form-switch d-flex pb-md-2 mb-4">
                        <input class="form-check-input flex-shrink-0" type="checkbox" checked=""
                            id="product-update">
                        <label class="form-check-label ps-3 ps-sm-4" for="product-update">
                            <span class="h6 d-block mb-2">Product update notifications</span>
                            <span class="fs-sm text-body-secondary">Send an email when a product I've purchased is
                                updated</span>
                        </label>
                    </div>
                    <div class="form-check form-switch d-flex pb-md-2 mb-4">
                        <input class="form-check-input flex-shrink-0" type="checkbox" id="product-comment">
                        <label class="form-check-label ps-3 ps-sm-4" for="product-comment">
                            <span class="h6 d-block mb-2">Product comment notifications</span>
                            <span class="fs-sm text-body-secondary">Send an email when someone comments on one of
                                my products</span>
                        </label>
                    </div>
                    <div class="form-check form-switch d-flex pb-md-2 mb-4">
                        <input class="form-check-input flex-shrink-0" type="checkbox" checked=""
                            id="product-review">
                        <label class="form-check-label ps-3 ps-sm-4" for="product-review">
                            <span class="h6 d-block mb-2">Product review notifications</span>
                            <span class="fs-sm text-body-secondary">Send an email when someone leaves a review with
                                his/her rating</span>
                        </label>
                    </div>
                </div>
                <div class="form-check form-switch d-flex">
                    <input class="form-check-input flex-shrink-0" type="checkbox" disabled="" id="daily-summary">
                    <label class="form-check-label opacity-100 ps-3 ps-sm-4" for="daily-summary">
                        <span class="h6 text-body-secondary d-block mb-2">Daily summary emails<span
                                class="badge bg-danger bg-opacity-10 text-danger ms-3">Only for
                                premium</span></span>
                        <span class="fs-sm text-body-secondary">Send an email when someone leaves a review with
                            his/her rating</span>
                    </label>
                </div>
            </div>
        </section>


        <!-- Delete account -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
            <div class="card-body">
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-trash text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Delete account</h2>
                </div>
                <div class="alert alert-warning d-flex mb-4">
                    <i class="ai-triangle-alert fs-xl me-2"></i>
                    <p class="mb-0">When you delete your account, your public profile will be deactivated
                        immediately. If you change your mind before the 14 days are up, sign in with your email and
                        password, and we'll send a link to reactivate account. <a href="#" class="alert-link">Learn
                            more</a></p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="confirm">
                    <label class="form-check-label text-dark fw-medium" for="confirm">Yes, I want to delete my
                        account</label>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-end pt-4 mt-sm-2 mt-md-3">
                    <button class="btn btn-danger" type="button">
                        <i class="ai-trash ms-n1 me-2"></i>
                        Delete account
                    </button>
                </div>
            </div>
        </section> --}}
    </div>
@endsection
