{{-- @section('content') --}}
<div class="relative">

    <!-- content -->
    <div class="content">
        <!-- services -->
        <div class="bg-serv-bg-explore overflow-hidden">
            <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">

                <div class="row text-center">
                    <div class="col-lg-12 col-12">
                        <img src="{{ asset('assets/images/') }}" height="400" class="mb-5" alt=" ">
                    </div>
                    <div class=" col-lg-12 col-12 header-wrap mt-4">
                        <p class="story">
                            WHAT A DAY!
                        </p>
                        <h2 class="primary-header ">
                            Berhasil Checkout
                        </h2>
                        <a href="{{ route('explore.landing') }}" class="btn btn-primary mt-3">
                            My Dashboard
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
{{-- @endsection --}}
