@if($action === 'created')
    Bonjour {{ $name }},<br>
    Vous avez réservé l'appartement : {{ $apartmentTitle }}.<br>
    Du {{ $arrival_date }} au {{ $departure_date }}.
@elseif($action === 'updated')
    Bonjour {{ $name }},<br>
    Par la présente, nous vous confirmons votre réservation pour l'appartement : {{ $apartmentTitle }} pour les dates suivantes :<br>
    arrivée: <b>{{ $arrival_date }}</b><br>
    départ: <b>{{ $departure_date }}</b>
@elseif($action === 'deleted')
    Bonjour {{ $name }},<br>
    Vous avez annulé votre réservation pour l'appartement : {{ $apartmentTitle }}.<br>
    Qui était prévue du {{ $arrival_date }} au {{ $departure_date }}.
@endif
