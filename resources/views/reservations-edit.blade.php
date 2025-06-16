<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la réservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-gray-100">
@include('header')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Modifier la réservation</h1>
            <a href="{{ route('accountDetail') }}" class="text-gray-600 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </a>
        </div>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dates de réservation</label>
                    <input type="text" id="dates" name="dates"
                           value="{{ $reservation->arrival_date }} to {{ $reservation->departure_date }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre de voyageurs</label>
                    <select id="guests" name="traveler_number"
                            class="w-full bg-transparent border-0 p-0 focus:ring-0 text-gray-700">
                        @for ($i = 1; $i <= $apartment->max_number_of_people; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('accountDetail') }}"
                   class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Annuler
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#dates", {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
            defaultDate: ["{{ $reservation->arrival_date }}", "{{ $reservation->departure_date }}"],
            disable: [
                    @foreach($otherReservations as $otherReservation)
                {
                    from: "{{ $otherReservation->arrival_date }}",
                    to: "{{ $otherReservation->departure_date }}"
                },
                @endforeach
            ]
        });
    });
</script>
</body>
</html>
