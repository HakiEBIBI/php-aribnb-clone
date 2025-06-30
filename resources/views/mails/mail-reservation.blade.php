<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réservation</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; margin: 0; padding: 0; background-color: #f7f7f7;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    @if($action === 'created')
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="color: #FF5A5F; font-size: 26px; margin-bottom: 10px;">Votre réservation est confirmée !</h1>
            <p style="color: #FF5A5F; font-size: 18px;">Préparez-vous pour un séjour inoubliable</p>
        </div>

        <div style="margin-bottom: 30px;">
            <p style="font-size: 16px; color: #484848; line-height: 1.6;">
                Bonjour {{ $name }},<br><br>
                Excellente nouvelle ! Votre réservation pour <strong>{{ $apartmentTitle }}</strong> est confirmée.
            </p>
        </div>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h2 style="color: #484848; font-size: 18px; margin-bottom: 15px;">Localisation</h2>
            <p style="margin: 5px 0; color: #484848;">
                <strong>Adresse</strong><br>
                {{ $apartment->address }}<br>
                {{ $apartment->postal_code }} {{ $apartment->city }}
            </p>
        </div>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h2 style="color: #484848; font-size: 18px; margin-bottom: 15px;">Votre hôte</h2>
            <p style="margin: 5px 0; color: #484848;">
                <strong>{{ $apartment->user->name }}</strong><br>
                📧 {{ $apartment->user->email }}<br>
                📞 {{ $apartment->user->phone ?? 'Non renseigné' }}
            </p>
        </div>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h2 style="color: #484848; font-size: 18px; margin-bottom: 15px;">Détails de votre séjour</h2>
            <div style="margin-bottom: 10px;">
                <p style="margin: 5px 0; color: #484848;">
                    <strong>Dates</strong><br>
                    🗓️ Arrivée: {{ \Carbon\Carbon::parse($arrival_date)->format('d/m/Y') }}<br>
                    🗓️ Départ: {{ \Carbon\Carbon::parse($departure_date)->format('d/m/Y') }}
                </p>
            </div>
            <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                <p style="margin: 5px 0; color: #484848;">
                    <strong>Détails du prix</strong><br>
                    Prix par nuit: {{ round($apartment->price_per_night) }} €<br>
                    Nombre de nuits: {{ \Carbon\Carbon::parse($arrival_date)->diffInDays($departure_date) }}<br>
                    <span style="font-size: 18px; color: #FF5A5F; margin-top: 10px; display: block;">
                            <strong>Prix total: {{ round($total_price) }} €</strong>
                        </span>
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('reservations.show', $reservation) }}"
               style="display: inline-block; background-color: #FF5A5F; color: white; text-decoration: none; padding: 12px 25px; border-radius: 4px; font-weight: bold;">
                Voir les détails de ma réservation
            </a>
        </div>

    @elseif($action === 'updated')
    @elseif($action === 'deleted')
    @endif

    <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #e4e4e4; text-align: center; color: #767676;">
        <p style="font-size: 14px;">
            Si vous avez des questions, n'hésitez pas à nous contacter.<br>
            L'équipe {{ config('app.name') }}
        </p>
    </div>
</div>
</body>
</html>
