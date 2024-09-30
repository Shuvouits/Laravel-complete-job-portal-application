<div id="basic" class="container tab-pane active"><br>


    <form method="post" action="{{ route('candidate.basic-info') }}" enctype="multipart/form-data">
        @csrf

        <div class="row form-contact">

            <div class="row">
                <div class="col-md-4">

                    <div class="col-md-12">
                        <div class="form-group">
                            <x-image-preview :source='getImagePath($candidate?->image)' style="height: 100px;" />
                            <label for="avatar"
                                class="font-sm color-text-mutted mb-10">Profile
                                Picture*</label>
                            <input class="form-control" id="avatar" type="file"
                                name="profile_picture" placeholder="Enter Your Picture">
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="cv"
                                class="font-sm color-text-mutted mb-10">CV* {{$candidate->cv ? 'Attched one file' : ''}}</label>
                            <input id="cv" class="form-control" type="file"
                                name="cv" placeholder="Browse">
                            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                        </div>
                    </div>


                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10"
                                    for="full_name">Full Name*</label>
                                <input class="form-control" type="text" id="full_name"
                                    name="full_name" value="{{ $candidate?->full_name }}"
                                    placeholder="Your Full Name">
                                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title"
                                    class="font-sm color-text-mutted mb-10">Title/Tag
                                    Line*</label>
                                <input class="form-control" type="text" id="title"
                                    name="title" value="{{ $candidate?->title }}"
                                    placeholder="Enter Your Title">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>

                    </div>




                    <div class="col-md-12">

                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Experience
                                Level*</label>
                            <select class="form-control form-icons select-active"
                                name="experience_level">
                                @foreach ($experience as $experience)
                                    <option value="{{ $experience->id }}"
                                        {{ $experience->id == $candidate?->experience_id ? 'selected' : '' }}>
                                        {{ $experience->name }}</option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="website"
                                    class="font-sm color-text-mutted mb-10">Website*</label>
                                <input id="website" class="form-control" type="text"
                                    name="website" value="{{ $candidate?->website }}"
                                    placeholder="Put Your Website Address">
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="date"
                                    class="font-sm color-text-mutted mb-10">Birth
                                    Date*</label>
                                <input id="birth_date" class="form-control"
                                    value="{{ $candidate?->birth_date }}" type="date"
                                    name="date_of_birth">
                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                            </div>
                        </div>

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
