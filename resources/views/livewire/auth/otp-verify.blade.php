<form method="POST" action="{{ route('otp.verify.submit') }}">
    @csrf
    <label for="otp">Enter OTP</label>
    <input id="otp" type="text" name="otp" required>
    <button type="submit">Verify</button>
</form>