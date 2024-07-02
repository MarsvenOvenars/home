@extends('layouts.app')
@section('title')
    All homes
@endsection
@section('content')
    <div class="container py-4 " >
        <div class=" row g-4 g-md-6">
            <div class=" col-sm-8 col-md-6 col-xl-3 ">
                @include('app.filter')
            <div class="col">
                <div class="row-3 g-3">
                    @forelse($objs as $obj)
                        <div class="col-12 ">
                            @include('app.home')

                    @empty
                        <div class="col-12">
                            <div class="fs-1 text-center rounded border p-5 ">
                                Home not found 
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="pt-4">
                    {{ $objs->links() }}
                 </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
