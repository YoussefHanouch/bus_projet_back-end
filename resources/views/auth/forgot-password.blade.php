<style>
    body {
        margin: 0;
        padding: 0;
        height:90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
    }

    .login-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .login-box {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .login-box h2 {
        text-align: center;
        margin-top: 2px;
        color: #333;
    }

    .textbox {
        position: relative;
        margin-bottom: 20px;
    }

    .textbox input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .btn {
        width: 100%;
        padding: 10px;
        margin-bottom: -24px;
        border: none;
        border-radius: 5px;
        background-color: #3b82f6;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #3b82f6;
    }

</style>


<div class="login-container">
    <div class="login-box">
        <h2 style="color:#3b82f6">Récupération de mot de passe</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="textbox">
                <input type="email" name="email" id="email" placeholder="Adresse e-mail" required autofocus>
            </div>

            <!-- Affichage des erreurs -->
            @error('email')
                <p style="color:red">     {{ $message }} </p>
               
            @enderror

            <button type="submit" style="margin-top: 5px" class="btn">
                Envoyer le lien de réinitialisation
            </button>

            <br><br>
            <p style="text-align: center; margin-bottom: -30px;">Retour à la <a style="color:#3b82f6" href="{{ route('login') }}">page de connexion</a></p>

        </form>
    </div>
</div>
