@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="mb-4">Téléconsultation en ligne</h2>
    <div id="jitsi-container" style="height: 600px; width: 100%; max-width: 900px; margin: 0 auto;"></div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">Quitter la téléconsultation</a>
</div>
@endsection

@push('scripts')
<script src="https://meet.jit.si/external_api.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const domain = "meet.jit.si";
        const options = {
            roomName: "mediconnecthub-{{ $room }}",
            width: "100%",
            height: 600,
            parentNode: document.getElementById('jitsi-container'),
            userInfo: {
                displayName: "{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}"
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    });
</script>
@endpush
