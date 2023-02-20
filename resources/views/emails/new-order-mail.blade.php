<div class="container mt-4 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container border-form rounded-2">
                <div class="mailtrap-logo">
                    <img class="img-fluid"
                        src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png"
                        alt="Deliveboo">
                </div>
                <h1>Ciao!</h1>
                <p>
                <p>
                    Hai ricevuto un nuovo messaggio:<br>
                    Nome: {{ $lead->name }}<br>
                    Email: {{ $lead->email }}<br>
                    Messaggio:<br>
                    {{ $lead->message }}
                </p>
                </p>
            </div>
        </div>
    </div>

</div>
