@extends('layouts.app')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Consultations</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('consultations.create') }}" class="btn btn-outline-success">New Consultation</a>
        </div>
    </div>

    <div class="row">
        @foreach($consultations as $consultation)
            <div class="col-md-4 mb-4">
                <div class="card bg-light shadow">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{$consultation->professor->first_name . ' ' . $consultation->professor->last_name}}</h5>
                            <h6 class="card-subtitle mb-2">{{$consultation->room->name}}</h6>
                        </div>
                        <div class="d-flex">
                            <div class="mr-4">
                                <div>
                                    <span>From</span>
                                </div>
                                <span
                                    class="text-primary">{{\Carbon\Carbon::parse($consultation->time_from)->format('d/m/Y h:i')}}</span>
                            </div>
                            <div>
                                <div>
                                    <span>To</span>
                                </div>
                                <span
                                    class="text-danger">{{\Carbon\Carbon::parse($consultation->time_to)->format('d/m/Y h:i')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{route('consultations.edit', $consultation->id)}}" class="btn btn-secondary">Edit</a>
                        <button type="button" class="btn btn-danger ml-0 delete" value="{{$consultation->id}}"
                                route_name="consultations">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('custom_scripts')
    <script type="text/javascript">
        document.querySelector('.row').addEventListener('click', function (e) {
            if (e.target.classList.contains('delete')) {
                const makeDelete = () => {
                    try {
                        return axios.delete('/' + e.target.getAttribute('route_name') + '/' + e.target.value);
                    } catch (error) {
                        console.log(error);
                    }
                };

                (async () => {
                    makeDelete()
                        .then(response => {
                            if (response.status === 200) {
                                e.target.parentNode.parentNode.remove();
                            }
                        })
                        .catch(err => console.log(err))
                })();
            }
        });
    </script>
@endsection

