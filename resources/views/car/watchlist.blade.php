<x-app-layout title="List">
    <main>
        <!-- New Cars -->
        <section>
            <div class="container">
                <div class="flex justify-between item-center">
                    <h2>My Favourite Cars</h2>
                    @if($cars->total() > 0)
                        <div class="pagination-summary">
                            <p>
                                Showing {{$cars->firstItem()}}
                                to {{$cars->lastItem()}}
                                of {{$cars->total()}} result.
                            </p>
                        </div>
                    @endif
                </div>

                <div class="car-items-listing">
                    @forelse ($cars as $car)
                        <x-car-item :$car></x-car-item>
                    @empty
                        <p>No favourite cars</p>
                    @endforelse
                </div>

               {{ $cars->onEachSide(1)->links() }}
            </div>
        </section>
        <!--/ New Cars -->
    </main>
</x-app-layout>
