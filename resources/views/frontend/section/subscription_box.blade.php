<section class="section-box subscription_box">
    <div class="container">
        <div class="box-newsletter">
            <div class="newsletter_textarea">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-form-newsletter">
                            <form class="form-newsletter">
                                @csrf
                                <input class="input-newsletter" type="text" value=""
                                    placeholder="Enter your email here" name="email">
                                <button type="submit" class="btn btn-default font-heading newsletter-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function(){
            
            const notyf = new Notyf();

            $('.form-newsletter').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let button = $('.newsletter-btn');
                $.ajax({
                    method: 'POST',
                    url: '{{ route("newsletter.store") }}',
                    data: formData,
                    beforeSend: function() {
                        button.text('processing...');
                        button.prop('disabled', true);
                    },
                    success: function(response) {
                        button.text("Subscribe")
                        button.prop('disabled', false);
                        $(".form-newsletter").trigger('reset');
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let erorrs = xhr.responseJSON.errors;
                        console.log(xhr)
                        $.each(erorrs, function(index, value) {
                            notyf.error(value[0]);
                        });
                        button.text("Subscribe");
                        button.prop('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
