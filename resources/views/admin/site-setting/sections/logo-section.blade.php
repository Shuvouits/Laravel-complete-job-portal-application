<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
    <div class="card" style="padding: 20px">
        <form action="{{ route('admin.logo-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">



                <div class="col-md-6">
                    <div class="form-group">
                        <x-image-preview :height="40" :width="200" :source="getImagePath(config('settings.site_logo'))" />


                        <label for="">Logo</label>
                        <input type="file" class="form-control {{ hasError($errors, 'logo') }}" name="logo" style="padding: 13px 15px;
                height: 52px;">
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <x-image-preview :height="40" :width="200" :source="getImagePath(config('settings.site_favicon'))" />
                        <label for="">Favicon</label>
                        <input type="file" class="form-control {{ hasError($errors, 'favicon') }}" name="favicon" style="padding: 13px 15px;
                height: 52px;">
                        <x-input-error :messages="$errors->get('favicon')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
  </div>
