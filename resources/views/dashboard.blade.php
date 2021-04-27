<x-template-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-red order-card">
                <div class="card=block">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 m-b-20">Total Customer</h2>
                            <p> {{$customer = DB::table('customers')->count()}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-template-layout>
