<div id="profile" class="container tab-pane"><br>

    <form method="post" action="{{ route('profile-info') }}">
        @csrf

        <div class="row form-contact">

            <div class="row">



                <div class="col-md-6">

                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10">Gender*</label>
                        <select class="form-control form-icons select-active"
                            name="gender">
                            <option selected disabled>Select One</option>
                            <option value="male"
                                {{ $candidate?->gender == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female"
                                {{ $candidate?->gender == 'female' ? 'selected' : '' }}>
                                Female</option>



                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10">Maritial
                            Status*</label>
                        <select class="form-control form-icons select-active"
                            name="maritial_status">
                            <option selected disabled>Select One</option>
                            <option value="married"
                                {{ $candidate?->maritial_status == 'married' ? 'selected' : '' }}>
                                Married</option>
                            <option value="single"
                                {{ $candidate?->maritial_status == 'single' ? 'selected' : '' }}>
                                Single</option>


                        </select>
                        <x-input-error :messages="$errors->get('maritial_status')" class="mt-2" />
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10">Profession*</label>
                        <select class="form-control form-icons select-active"
                            name="profession_id">
                            <option selected disabled>Select One</option>
                            @foreach ($profession as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $candidate?->profession_id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach


                        </select>
                        <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10">Your
                            Availablity*</label>
                        <select class="form-control form-icons select-active"
                            name="status">
                            <option selected disabled>Select One</option>
                            <option value="available"
                                {{ $candidate?->status == 'available' ? 'selected' : '' }}>
                                Available</option>
                            <option value="not_available"
                                {{ $candidate?->status == 'not_available' ? 'selected' : '' }}>
                                Not-Available</option>


                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="select-style">
                        <label class="font-sm color-text-mutted mb-10">Skill You
                            Have*</label>
                        <select class="form-control form-icons select-active"
                            name="skill[]" multiple="multiple">
                            @foreach ($skill as $item)
                                <option value="{{ $item->id }}"
                                    {{ in_array($item->id, $candidate_skill) ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('skill')" class="mt-2" />
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="form-group select-style">
                        <label class="font-sm color-text-mutted mb-10">Language You
                            Know*</label>
                        <select class="form-control form-icons select-active"
                            name="language[]" multiple='multiple'>

                            @foreach ($language as $item)
                                <option value="{{ $item->id }}"
                                    {{ in_array($item->id, $candidate_language) ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach



                        </select>
                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                    </div>

                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Biography*</label>
                        <textarea class="form-control" name="bio" id="content">{!! $candidate->bio !!}</textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                    </div>

                </div>








            </div>


            <div class="box-button mt-15">
                <button type="submit" class="btn btn-apply-big font-md font-bold">Save
                    All
                    Changes</button>
            </div>




        </div>

    </form>


</div>
