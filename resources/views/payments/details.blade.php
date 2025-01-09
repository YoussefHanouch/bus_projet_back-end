
<style>
    
    .container {
    margin: 50px auto;
    max-width: 600px;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.receipt-title {
    color: #62A1D9;
}

.receipt-details ul {
    list-style-type: none;
    padding: 0;
}

.receipt-details li {
    margin-bottom: 10px;
}

.thank-you {
    margin-top: 20px;
}

.thank-you p {
    color: #888;
    font-style: italic;
}
    
</style>
    
    <div class="container">
    @if(isset($message))
        <p>{{ $message }}</p>
    @elseif(isset($paymentId))
        <div class="receipt">
            <h1 class="receipt-title">Reçu de carte bus</h1>
            <div class="receipt-details">
                <ul>
                    <li><strong>Nom et prenom :</strong> {{ $paymentId }}</li>
                    <li><strong>Prix:</strong> {{ $price }} Dh</li>
                    <li><strong>Numéro de carte:</strong> {{ $cardNumber }}</li>
                    <li><strong>Numéro de ligne:</strong> {{ $lineNumber }}</li>
                    <li><strong>Date de rendez-vous:</strong> {{ $rendezVousDate }}</li>
                </ul>
            </div>
            <div class="thank-you">
                <p>Merci pour votre paiement !</p>
                <p>Veuillez noter la date de rendez-vous pour récupérer votre carte bus.</p>
            </div>
        </div>
    @endif
</div>
