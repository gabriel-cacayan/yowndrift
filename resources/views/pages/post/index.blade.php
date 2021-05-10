<x-guest-user-layout>

    @if (\Session::has('danger'))
        <div id="element" class="container alert alert-danger alert-dismissible fade show" role="alert">
        <h6>{{ \Session::get('danger') }}</h6>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

        @if (\Session::has('success'))
        <div id="element" class="container alert alert-light alert-dismissible fade show" role="alert">
        <h6><i class="mr-1 fas fa-check-circle text-success"></i>{{ \Session::get('success') }}</h6>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @livewire('blog.index')
</x-guest-user-layout>