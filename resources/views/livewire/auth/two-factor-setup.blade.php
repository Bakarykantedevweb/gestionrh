<div>
    @if(!$google2faSecret)
        <!-- Afficher un bouton pour générer le QR code -->
        <button wire:click="generateQrCode">Generate QR Code</button>
    @else
        <!-- Afficher le QR code généré -->
        <img src="{{ $qrCodeUrl }}" alt="QR Code">
        <p>Scan this QR code with your Google Authenticator app.</p>
    @endif
</div>
